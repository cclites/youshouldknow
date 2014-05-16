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

            Log::info( 'Total new votes:: ' . $votes->meta->total_count );
			Log::info( 'Initializing Main' );

			if( $votes->meta->total_count > 0){
				$main = new Main($votes, $gt);
				$main->init();
			}
		}
    }

?>