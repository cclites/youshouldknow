<?php

    function getMaxVoteId(){
		return DB::table('system')->where('name', 'max_id')->pluck('value');
    }

	function setMaxVoteId($id){
		DB::table('system')->where('name', 'max_id')->update(array('value' => $id));
	}
	
	function getUserCredentials(){
		
		$map =  DB::table('account')
        ->join('t_configs', 'account.id', '=', 't_configs.user_id')
        ->get();
		
		//duplicate the array, but use the state as the key for easier
		//processing later.
		$newMap = array();
		
		for($i =0; $i < count($map); $i += 1){
			$newMap[$map[$i]->state] = $map[$i];
		}
		
		return $newMap;
		
	}
	
	function getAppCredentials(){
		$consumerKey = DB::table('system')->where('name', 'yskconsumerkey')->pluck('value');
		$consumerSecret = DB::table('system')->where('name', 'yskconsumersecret')->pluck('value');
		
		return array(
		                "consumerKey" => $consumerKey,
		                "consumerSecret" => $consumerSecret
		            );
	}

?>
