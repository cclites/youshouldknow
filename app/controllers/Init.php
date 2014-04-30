<?php

    class Init extends BaseController{
    	
	    function __construct() {
        }
		
		/*
		 * Kicks off the entire process.
		 */
		function init(){
			
			$gt = new GovTrack();
			$votes = $gt->getVotes();
			
			/*
			echo "<pre>";
			print_r($votes);
			echo "</pre>";
			die("Died in Init@init");
			 */
			
			if( $votes->meta->total_count > 0){
				$main = new Main($votes, $gt);
				$main->init();
			}
		}
    }

?>