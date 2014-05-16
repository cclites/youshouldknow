<?php
    class UpdatesController extends BaseController{
    	
		private $tHandle;
		
		
        function __construct() {
        }
		
		function manualUpdate($state, $status){
			
			//Need to get credentials by state.
			$credentials = getUserCredentials();
			
			$this->tHandle = new Twitter(  getAppCredentials(), getUSerCredentials() );
			$this->tHandle->postStatus( $state, urldecode($status) );
		}
	}
?>
    	