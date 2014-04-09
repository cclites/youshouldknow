<?php

    class Init{
    	
	    function __construct() {
        }
		
		/*
		 * Kicks off the entire process.
		 */
		function init(){
			
			$gt = new GovTrack();
			$votes = $gt->getVotes();
			
			if( $votes->meta->total_count > 0){
				$main = new Main($votes, $gt);
				$main->init();
			}
		}
    }

?>