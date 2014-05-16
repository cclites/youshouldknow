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
	
	//Won't need. GetUserCredentials
	function getStateCredentials($state){
			
		$map = DB::table('account')
        ->join('t_configs', 'account.id', '=', 't_configs.user_id')
        ->where('state', $state )
        ->get();
		
		print_r($map);
	}
	
	/*
	 * This function is used to grab a list of active states for the
	 * state selection dropdown.
	 */
	function getStates(){
		return DB::table('account')->lists('state');
	}
	
	/*
	 * Retrieve credentials specific to authenticating the twitter feeder app.
	 */
	function getAppCredentials(){
		$consumerKey = DB::table('system')->where('name', 'yskconsumerkey')->pluck('value');
		$consumerSecret = DB::table('system')->where('name', 'yskconsumersecret')->pluck('value');
		
		return array(
		                "consumerKey" => $consumerKey,
		                "consumerSecret" => $consumerSecret
		            );
	}
	
	/*
	 * The object id's table is usd to map vote id to bill id so that the site does not need to hit
	 * GovTrack's servers any more than necessary. Used to correlate data between the bill and vote 
	 * tables.
	 * 
	 */
	function insertObjectIds($voteId, $billId){
		
		//See if object exists first
		$obj = DB::table('object_ids')->where('vote', '=', $voteId)->first();   // this will return NULL if empty
		
		if(!$obj){
			DB::insert('INSERT INTO object_ids (vote, bill) values (?, ?)', array($voteId, $billId));
		}	
	}
	
	/*
	 * Save vote data as text data type. 
	 */
	function insertVote($voteId, $vote){
		
		//See if object exists first.
		$obj = DB::table('voter_vote')->where('vote_id', '=', $voteId)->first();   // this will return NULL if empty
		
		if(!$obj){
			//DB::insert('INSERT INTO voter_vote (vote_id, vote) values (?, ?)', array($voteId, $vote));
			return 1;
		}
		
		return 0;
	}
	
	function getBillId($voteId = 0){
		$query = "SELECT bill FROM object_ids WHERE vote=$voteId";
		$response = DB::select($query);
        return $response[0]->bill;
	}
		
?>
