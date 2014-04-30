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
	
	/*
	 * This function is used to grab a list of active states for the
	 * state selection dropdown.
	 */
	function getStates(){
		return DB::table('account')->pluck('state');
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
	
	//not used
	function getVote($voteId)
	{
		$vote = DB::table('voter_vote')->where('vote_id', $voteId)->pluck('vote');
		
		//return $vote->meta;
		
		echo "<pre>";
		print_r($vote);
		die();
  		
		
		return json_decode($vote);
	}
	
	/*
	 * Save bill data as text data type.
	 */
	//Not used
	function insertBill($billId, $bill){
		
		//See if object exists first.
		$obj = DB::table('bill')->where('bill_id', '=', $billId)->first();   // this will return NULL if empty
		
		if(!$obj){
			return 1;
		  //DB::insert('INSERT INTO bill (bill_id, bill) values (?, ?)', array($billId, $bill));
		}
		return 0;
	}
	
	//Not used
	function getBill($voteId){
		
		$query = "SELECT b.bill FROM bill AS b, object_ids AS o WHERE o.vote=$voteId AND o.bill=bill_id";
		
		$bill = DB::select($query);
		
		if($bill){
			return json_decode($bill[0]->bill);
		}
		
		return null;
	}
	
?>
