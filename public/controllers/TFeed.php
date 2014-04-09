<?php

    /*
	 * Cleans up the vote data.
	 */
    class TFeed{
    	
		private $states;
		private $credentials;
		
		function __construct($credentials, $states) {
			$this->credentaisl = $credentials;
			$this->states = $states;
        }
		
		function updateStatus($vote){
			
			
			// This is just pulling together general vote info. The data is duplicated
			// in each $vote object, so just grabbing info from the first available
			// object.

			$result = $vote->objects[0];
			$vote_type = $result->vote->vote_type;
			$chamber = $result->vote->chamber_label;
			$number = $result->vote->number;
			$billIdStr = $this->formatBillId($chamber, $number);

            //I need to process each of the objects in order to determine state.
            $votes = $vote->objects;
			
			//I need to get the state from the votes object in order to
			//determine if the data gets processed.
			
			
			for($i = 0; $i < count($votes); $i += 1){
				//need to get state from each $votes;
				
				$v = $votes[$i];
				$state = $this->getState($v->person->name);
				
				if(in_array($state, $this->states)){
					echo "Yeah baby.. My state is $state<br>";
				}
			}
	
		}
		
		function formatStatus(){
			
		}
		
		function getState($voter){
			// This is some akward processing to pull out the state that the congressperson
			// belongs to.
			$fSplit = explode('[', $voter);
			
			$a = $fSplit[1];
			$a = str_replace("]", "", $a);
			
			//fucked up here. have the same call twice.
			
			//now remove any digits
			$q = str_replace(range(0,9), "", $a);
			$tuples = explode("-", $q);
			
			$vState = $tuples[1];
			
			if(in_array($vState, $this->states)){
				
				//if it makes it here, then we have a valid state and we need
				//to update the status.
				
				echo "current state is $currentState<br>";
			}
			
			
			echo "Voter state is $vState";
			//print_r($tuples);
			die();
			
			//$a = str_replace(range(0,9),'',$q);
			/*
			//Final split
			$tuples = explode("-", $q);
			
			$currentState  = $tuples[1];
			
			print_r($this->states);
			
			if(in_array($currentState, $this->states)){
				
				echo "current state is $currentState<br>";
			}
			 * 
			 */
		}
		
		function formatBillId($chamber, $number){
			
			$tagPrefix = substr($chamber, 0,1);
			return $tagPrefix . "." . $number;
		}
		

    }
	
?>
