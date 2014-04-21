<?php
  
    /*
	 * Main controller that contains logic for cleaning and retrieving
	 * vote data, creating a filter that limits submissions by state,
	 * and inits the data endpoints.
	 */

    class Main{
    	
		private $votes;
		private $gt;
    	
		function __construct($votes = array(), $gt) {
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
			//$this->votes = $this->cleanModel($newMax);
			
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
				
				$v = $this->votes[$i];
				
				//echo "<pre>";
			    //print_r($v);
			    //exit;
				
				
				$billId = $v->related_bill->id;
				
				//The following link pulls back the raw data. 
				//$link = "https://www.govtrack.us/api/v2/bill/" . $billId;
				
				//For now, I need to include the current govtrack link 
				//to pull up the related data.
				// ** Not the right way **
				//$link = $v->related_bill->link;
				
				$tLink = $this->gt->getBill($billId);
				echo "<br><pre>";
				print_r($tLink);
				exit;
				
				//This links to the info related to the vote. From there,
				//The user can go on to the actual bill/amendment text
				$link = $v->link;
				
				//Once server is up, I will need to post the vote id 
				//back with the link url.
				
				
			    
				//need to get voter vote stuff for each id
				$vote = $this->gt->getVoterVotes($v->id);
				
				//echo "<pre>";
			    //print_r($vote);
			    //exit;
				
				$tf->updateStatus($vote, $link);
			}
			
		}
		
		function initTController($credentials, $states){
			return new TFeed($credentials, $states);
		}
    }
	
?>
