<?php
    class AdminController extends BaseController{
    	
		function __construct() {
        }
		
		function init($adminId = 0){
			
			if($adminId == ADMIN_ID){

				$states = getStates();
				sort($states);
				$states = json_encode($states);
				
				$data = array( 'isAdmin' => true,
				               'states' => $states
				        );
						
				echo View::make("main", $data)->render();
			}else{
				//throw some sort of an exceptioin.
			}
		}
    }
?>

