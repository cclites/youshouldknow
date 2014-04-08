<?php

    /*
	 * Wrapper to contain api calls to govTrack
	 */

    class GovTrack{
    
        function getVotes(){
        	
        	//$bills = array();
			//$date = '2014-04-05';
			$day = date('d') - 2;
			$date = date("Y-m") . "-$day";
			//$date = strtotime ( '-2 day' , strtotime ( $date ) ) ;
			$url = "https://www.govtrack.us/api/v2/vote?created__gt=$date&fields=chamber,id,bill,congress";

            return file_get_contents($url);
			
			//return $bills;
        }
		
		function getVoterVotes(){
			
		}
    }
	
?>
	
