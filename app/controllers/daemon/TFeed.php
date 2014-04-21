<?php

    /*
	 * Cleans up the vote data.
	 */
    class TFeed{
    	
		private $states;
		private $credentials;
		private $tHandle;
		
		function __construct($credentials, $states) {
			$this->credentaisl = $credentials;
			$this->states = $states;
			$this->tHandle = new Twitter(  getAppCredentials(), $credentials );
        }
		
		// This is just pulling together general vote info. The data is duplicated
		// in each $vote object, so just grabbing info from the first available
		// object. Since the info will need to be reused with each status update,
		// I am stufing the parameters needed for creating the update into a single
		// object. The voter info will be added later.
		function updateStatus($vote, $link){
			
			$result = $vote->objects[0];
			$billIdStr = $this->formatBillId($result->vote->chamber_label, 
			                                 $result->vote->number);
											 
											 
			$params = array(
			              'billId'=> $billIdStr,
			              'result'=> $result->vote->result,
			              'plus'  => $result->vote->total_plus,
			              'minus' => $result->vote->total_minus,
			              'type'  => $result->vote->vote_type
					  );

            //I need to process each of the objects in order to determine state.
            $votes = $vote->objects;
			
			/*
			echo "<pre>";
			print_r($votes);
			echo "</pre><br>";
			*/
	
			
			//echo "Checking vote object<br>";
			$ctr = 0;

			for($i = 0; $i < count($votes); $i += 1){
				//need to get state from each $votes object	
									
				$v = $votes[$i];
				
                //echo "<pre>";
			    //print_r($v);
			    //echo "</pre><br>";
			    //die();
				
				$state = $this->getState($v->person->name);
				
				if(in_array($state, $this->states)){
					
					$status = $this->formatStatus($params, $v->person, $v->option->value, $link);
					
					echo "$status<br>";
					//$this->tHandle->postStatus($state, $status);
					//die();
				}
				else{
					//debug message
				}
			}
	
		}
		
		function formatStatus($params, $person, $pVote, $link){
			
			
			/*
			return $person->name . " " . $pVote . " on " . $params["billId"] .
			       "; Vote Result: " . $params["result"] . /*" " . $params["type"] . " " . $params["plus"] . "-" . 
			       $params["minus"] . "  " . $link;  */
			       
			return $person->name . " " . $pVote . " " . $params["type"] .
			       "; " . $params["result"] . " " . $link;       
			
		}
		
		// This is some akward processing to pull out the state that the congressperson
		// belongs to. The benefit is that there is one less call to govTrack to obtain
		// voter information.
		function getState($voter){
			
			$fSplit = explode('[', $voter);
			
			$a = $fSplit[1];
			$a = str_replace("]", "", $a);
			
			//fucked up here. have the same call twice.
			
			//now remove any digits
			$q = str_replace(range(0,9), "", $a);
			$tuples = explode("-", $q);
			
			return $tuples[1];
			
		}
		
		function formatBillId($chamber, $number){
			$tagPrefix = substr($chamber, 0,1);
			return $tagPrefix . "." . $number;
		}
		

    }
	
?>
