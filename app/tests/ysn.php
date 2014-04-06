<?php

    class YSN_initTests extends TestCase{
    	
		private $init;
		private $comms;
		
		/*
		 * Expects the function to return a 0.
		 */
		public function testInit(){
        
			$this->init = new Init();
		    $val = $this->init->init();
			$this->assertTrue($val == 0);
		}
		
		public function testComms(){
		    $this->comms = new Comms();	
		}
		
    }
?>