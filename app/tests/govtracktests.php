<?php

    class govtracktests extends TestCase {
    	
		
		
		public function testGetVotes()
	    {
	        $gt = new GovTrack();
			$bills =  $gt->getVotes();
		    $this->assertNotNull( $bills, "FAILURE: Get votes is returning null." );
			$this->assertNotEmpty( $bills, "FAILURE: Get Bills is empty.");
		}
		
		
		//this needs an id to work with eventually.
		public function testGetVoterVotes(){
			$this->assertTrue(True);
		}
    }

?>