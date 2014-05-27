<?php

    /*
	 * Submit status update to Twitter
	 */
    class Twitter{

        private $consumerKey;
		private $consumerSecret;
		private $consumerCredentials;

    	function __construct($appCredentials, $consumerCredentials) {
    		
			$this->consumerKey = $appCredentials["consumerKey"];
			$this->consumerSecret = $appCredentials["consumerSecret"];
			$this->consumerCredentials = $consumerCredentials;
        }
		
		function getConnection($token, $secret){
			
		    return new TwitterOAuth($this->consumerKey, $this->consumerSecret, $token,
                              $secret);	
		}
		
		function postStatus($state, $status){
			$cc = $this->consumerCredentials;
			$connection = $this->getConnection($cc[$state]->access_token, $cc[$state]->access_key);
			
			Log::info('Status update:: $status');
			$callback = $connection->post('statuses/update', array('status' => $status) );
			
			//print_r($callback);
			sleep(1);  //Don't want to completely flood the network

		}
    }
	
?>
