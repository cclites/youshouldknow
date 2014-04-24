<?php

    /*
	 * Wrapper to contain api calls to govTrack
	 */

    class GovTrack{
    	
		function __construct() {
        }
    
	    /*
		 * Get votes held on the previous day.
		 */
        function getVotes(){
			$day = date('d') - 1;
			$date = date("Y-m") . "-$day";
			$url = "https://www.govtrack.us/api/v2/vote?created__gt=$date";
			
			echo "$url";
			die();
            return json_decode(file_get_contents($url));
        }
		
		/*
		 * Get vote information by id
		 */
		function getVoterVotes($id){
			$url = "https://www.govtrack.us/api/v2/vote_voter?vote=$id";
			return json_decode(file_get_contents($url));
		}
		
		function getBill($billId){
			$url = "https://www.govtrack.us/api/v2/bill/" . $billId . "/text";
			return json_decode(file_get_contents($url));
		}
    }
	
?>
	
