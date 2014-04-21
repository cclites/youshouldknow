<?php

  //use BaseController;

  class ViewController extends BaseController{
  	
	function __construct() {
	}
	
	function init($billId){

        //Grab the billModel and send it to the main view.
		$gt = new GovTrack();
		$billModel = $gt->getBill($billId);
		echo View::make("main")->with('model', $billModel);
	}
  }

?>
