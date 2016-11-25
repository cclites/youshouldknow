<?php

    namespace App\Http\Controllers;
	use Request;
	use DB;
	use Log;

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
			

			if( $votes->meta->total_count > 0){
				
				Log::info( 'Initializing Main' );
				$main = new Main($votes, $gt);
				$main->init();
			}
		}
    }

?>