<?php

  /*
   * This class is responsible for building the initial view model when 
   * coming from a Twitter url. Once the model is ready, the main view 
   * is created. 
   * 
   * The model contains a voterVote object, a bill object, and a results
   * object.
   */
  class ViewController extends BaseController{
  	
	function __construct() {}
	
	function init($voteId = 0){

		$voteUrl = app_path(). "/views/assets/data/vote/$voteId.json";
		
		$voteObject = json_decode( file_get_contents($voteUrl) );
		$vote = $voteObject->objects;
		
		$billId = getBillId($voteId);
		
		$bill = null;
		
		if($billId){
			$billUrl = app_path(). "/views/assets/data/bill/$billId.json";
			$bill = json_decode( file_get_contents($billUrl) );
		}

        $vh = new voterVoteHelper($vote);
		$result = $vh->getVoteResults();
		
		//vote results should be in here also
		$_SESSION["model"] = array('vote'=>$vote, 'bill'=>$bill, 'result'=>$result);
		
		echo View::make("main")->with('model');
		
	}
  }

?>
