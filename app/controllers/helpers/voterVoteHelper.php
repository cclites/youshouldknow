<?php

   class voterVoteHelper{
   	
	    private $vote;
		private $voteArray = array();
		
	    function __construct($vote) {
	    	$this->vote = $vote;
	    }
		
		function getVoteResults(){
			
			$this->buildVoteResults();
			return $this->voteArray;
		}
		
		function buildVoteResults(){
			
			$c = count($this->vote);
			
			for($i = 0; $i < $c; $i += 1){
				$v = $this->vote[$i];
				
				//Figure out the party by parsing the name string
				$party = $this->getParty($v);
				
				//Allows us to dynamically add a party without knowing
				//the party in advance. If the party type is already
				//in the vote array, then do nothing.
				$this->addParty($party);
				
                //record how this member voted.
                if($v->option->key == "+"){
                	$this->voteArray[$party]["Yea"] += 1;
                }else if($v->option->key == "-"){
                	$this->voteArray[$party]["Nay"] += 1;
                }else{
                	$this->voteArray[$party]["Not Voting"] += 1;
                }
			}
		}
		
		function addParty($party){
		
		  if(!array_key_exists ( $party , $this->voteArray )){
		  	 $this->voteArray[$party] = array("Yea"=>0, "Nay"=>0, "Not Voting"=>0);
		  }		
		}
		
		//do some ugly string parsing to pull the party from the
		//name string
		function getParty($person){
			
			$name = $person->person->name;
            $tuples = explode("[", $name);
			return strstr($tuples[1], "-", true);
		}
		
		function toString(){
			return print_r($this->vote);
		}
   }

?>