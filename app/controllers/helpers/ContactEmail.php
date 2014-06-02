<?php
    //Ignoring the laravel method for now because there is only a single 
    //instance where mail gets sent. Temporarily using a throw away function.
    //This will eventually be an actual view.
    class ContactEmail extends BaseController{
    	
		
    	
		function sendContact($data){
		    $returnAddress;
	        $message;
	        $toAddress = "usk_admin@sweeps-soft.com";
	        $subject = "Site Contact Message";
		
		    Log::info( 'Sending Contact.');
		
		    mail($toAddress, $subject, $message,"From: $returnAddress\n");
			
			Log::info( 'Mail Sent.');
	    }
		
    }
?>