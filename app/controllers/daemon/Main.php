<?php
  
    /*
	 * Main controller that contains logic for cleaning and retrieving
	 * vote data, creating a filter that limits submissions by state,
	 * and inits the data endpoints.
	 * 
	 * This class gets instantiated with a vote object:
	 * [objects] => Array
     *   (
     *       [0] => stdClass Object
     *           (
     *               [chamber] => house
     *               [chamber_label] => House
     *               [congress] => 113
     *               [id] => 114335
     *               [link] => https://www.govtrack.us/congress/votes/113-2014/h175
     *           )
     *
     *       [1] => stdClass Object
	 * 
	 * Also takes a GovTrack object as a parameter.
	 */

    class Main{
    	
		private $votes;
		private $gt;
    	
		function __construct($votes = array(), $gt) {

            //Needs the appropriate includes. 
			//require_once(app_path() . "/controllers/shared/Db.php");
			
			$this->votes = $votes->objects;
			$this->gt = $gt;
        }
		
		function init(){
			$newMax = 0;
			
			//get the maxes and mins from my set.
			$maxes = $this->getMaxes();

			//get max id from database.
			$maxVoteId = getMaxVoteId();
			$newMax = $maxVoteId;

			//save the new max
			if( empty($maxVoteId) || $maxVoteId < $maxes["max"] ){
				setMaxVoteId($maxes["max"]);
				$newmax = $maxes["max"];
			}
			
            //debug
			//Remove stale data from the array.
			$this->votes = $this->cleanModel($newMax);
			
			//get the app credentials.
			$credentials = getUserCredentials();
			
			//create filter to limit accounts
			$states = $this->createStateFilter($credentials);
			
			//init the controllers
			$this->initControllers($credentials, $states);
			
		}
		
		function getMaxes(){
			
			$v = $this->votes;
			$max = $min = $v[0]->id;
			
			for( $i=0; $i < count($v); $i += 1 ){
				
				if( $v[$i]->id > $max ) $max = $v[$i]->id;
				if( $v[$i]->id < $min ) $min = $v[$i]->id;
			}
			
			return array("max"=>$max, "min"=>$min);
			
		}
		
		function cleanModel($max){
			
			$model = array();
			$v = $this->votes;
			
			for ($i = 0; $i < count($v); $i += 1){
				
				if( $v[$i]->id > $max ){
					$model[] = $v[$i];
				}
			}
			
			return $model;
		}
		
		function createStateFilter($credentials){
			
			$states = array();
			
			foreach($credentials as $k){
				$states[] = $k->state;
			}
			
			return $states;
		}
		
		function initControllers($credentials, $states){
			
			$tf = $this->initTController($credentials, $states);
			
			
			//echo "<pre>";
			//print_r($this->votes);
			//exit;
			
			

			for($i = 0; $i < count($this->votes); $i += 1){
				
				//Get related bill informtion for archival
				$billId = 0;
				$bill = null;
				
				//It is possible that there is no associated bill
				if( is_object($this->votes[$i]->related_bill)){
					$billId = $this->votes[$i]->related_bill->id;
					$bill = $this->gt->getBill($billId);
				}
				
				$v = $this->votes[$i];

				//need to get voter vote stuff for each id
				$vote = $this->gt->getVoterVotes($v->id);
			    $this->updateObjectTables($vote, $v->id, $bill, $billId);
				
				
				/*
				 * TODO:
				 * I need to create a link back to the server that includes
				 * the voter_vote id.
				 *
				 * ie. $link = http://myhost.youshouldknow.us/v/" . $v->id;
				 * 
				 */
				 
				 $devLink = "http:/216.16.7.62/vote/" . $v->id;
				 //echo $devLink;
				 $link = $devLink;
				 
				 //For now, use the link back to govTrack that is contained in the
				 //vote object.
				 //$link = $v->link;
				 
				$tf->updateStatus($vote, $link);
				
			} //end for (this->votes)
			
		}
		
		function initTController($credentials, $states){
			
			return new TFeed($credentials, $states);
		}
		
		function updateObjectTables($vote, $voteId, $bill, $billId){
				
			//If the vote id is added, insertObjectIds should return true,
			//else return false.
			
			$return = insertObjectIds($voteId, $billId);
			
			//echo "Return is:";
			//print_r($return);
			//echo "<br>";
			//exit;
			
			//echo "<pre>";
			//print_r($vote);
			
			if( !$return ){
				
				echo "Writing out vote\n";
				$myFile = app_path(). "/views/assets/data/vote/$voteId.json";
				File::put($myFile, json_encode($vote));
				
				if($billId != "0" ){
					echo "Writing out bill\n";
					$myFile = app_path(). "/views/assets/data/bill/$billId.json";		
					File::put($myFile, json_encode($bill));	
				}
				
			}else{
				echo "HA Ha!<br>";
			}
			
			/*insertVote will be deprecated*/
			//insertVote($voteId, json_encode($vote));
			
			//if($billId != "0" ){
				
				/*insertBill will be deprecated*/
				//insertBill($billId, json_encode($bill));
			//}
			
		}
    }
	
?>
