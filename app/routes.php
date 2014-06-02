<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
Route::get('/', function(){
	return View::make('hello');
});
 * 
 */

Route::get('/', 'ViewController@init');
Route::get('dev', 'ViewController@init');
Route::get('vote/{voteId}', 'ViewController@init');
Route::get('admin/{adminId}', 'AdminController@init');


//If status updates are suddenly broken,
//change 'post' back to 'get'. I changed
//it to post on the fly, so change is untested.
Route::post('update/', function(){
	$data = Input::all();
	$uc = new UpdatesController();
	$uc->manualUpdate($data["chosenStates"], $data["status"]);
});

//Settings: create a new setting

Route::post('contact/', function(){
	
	$data = Input::all();
	
	$toAddress = "usk_admin@sweeps-soft.com";
    $subject = "Site Contact Message";
	$returnAddress = $data["contactEmail"];
	$message = $data["contactMessage"];

    Log::info( 'Sending Contact.');
    mail($toAddress, $subject, $message,"From: $returnAddress\n");
	Log::info( 'Mail Sent.');
	
	foreach (getallheaders() as $name => $value) {
        Log::info ("$name: $value<br>");
    }
});


