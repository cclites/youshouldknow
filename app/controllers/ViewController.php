<?php

  /*
   * This class is responsible for building the initial view model when 
   * coming from a Twitter url. Once the model is ready, the main view 
   * is created. 
   * 
   * There class only contains one method.
   * 
   */
  class ViewController extends BaseController{
  	
	function __construct() {}
	
	function init($voteId = 0){

        // These are the defaults for data implemented in the views.
		$vote = null;
		$bill = null;
		$result = array();
		$result["Defaults"] = array('Yea'=>0, 'Nay'=>0, 'Not Voting'=>0);
		$title = "STUB: VOTE TITLE";
		$link = "STUB: VOTE LINK";
		$description = "STUB: VOTE DESCRIPTION";
		$sponsor = "STUB: VOTE SPONSOR";
		$thomas = "STUB: LIBRARY OF CONGRESS LINK";
		$sponsorLink = "STUB: SPONSOR LINK";
		$currentStatus = "STUB: CURRENT STATUS";
		$sponsorDescription = "STUB: SPONSOR DESCRIPTION";
		
		//**   This first part retrieves the raw JSON data.  **//
		
		//if voteId != 0, display vote info.
		if($voteId != 0){
			$voteUrl = app_path(). "/views/assets/data/vote/$voteId.json";
		
		    $voteObject = json_decode( file_get_contents($voteUrl) );
		    $vote = $voteObject->objects;
		
		
		    $billId = getBillId($voteId);
		
		
	 	    if($billId){
			    $billUrl = app_path(). "/views/assets/data/bill/$billId.json";
			    $bill = json_decode( file_get_contents($billUrl) );
		    }

            $vh = new voterVoteHelper($vote);
		    $result = $vh->getVoteResults();
		}
		
		//**  This next part pulls specific info from the data  **//
		
	    if( isset($vote) ){
	    	//echo "<pre>";
			//print_r($vote);
			$title = $vote[0]->vote->question;
			$description = $vote[0]->vote->result;
			$link = $vote[0]->vote->link;
	    }
		
		if( isset($bill) ){
		    $currentStatus = $bill->current_status_description;
		    $thomas = $bill->thomas_link;
			$sponsor = $bill->sponsor->name;
			$sponsorLink = $bill->sponsor_role->website;
			$sponsorDescription = $bill->sponsor_role->description;
	    }

		
		//Stuff it all in an array
		$data = array('title'=>$title,
		              'link'=>$link,
					  'result'=>$result,
					  'description'=>$description,
					  'currentstatus'=>$currentStatus,
					  'sponsor'=>$sponsor,
					  'thomas'=>$thomas,
					  'sponsorlink'=>$sponsorLink,
					  'sponsordescription'=>$sponsorDescription,
					  'bill'=>$bill,
					  'vote'=>$vote,
					  'isAdmin'=>false);
		/*			  
		echo "<pre>";
		print_r($data);
		die();
		 */
					  
		try{
			echo View::make("main", $data)->render();
		}
		catch(Exception $e){
			echo "<pre>";
			print_r($e);
		}
		
		
	}
  }

?>
