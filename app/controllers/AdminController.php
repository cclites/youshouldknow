<?php
    class AdminController extends BaseController{
    	
		function __construct() {
        }
		
		function init($adminId){
			if($adminId != ADMIN_ID){
				App::abort(401, 'You are not authorized.');
			}
			else{
                $GLOBALS["isadmin"] = TRUE;
				echo View::make("main");
			}
		}
    }
?>