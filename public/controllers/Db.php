<?php

    function getMaxVoteId(){
		return DB::table('system')->where('name', 'max_id')->pluck('value');
    }

	function setMaxVoteId($id){
		DB::table('system')->where('name', 'max_id')->update(array('value' => $id));
	}
	
	function getUserCredentials(){
		
		return DB::table('account')
        ->join('t_configs', 'account.id', '=', 't_configs.user_id')
        ->get();
	}

?>
