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

//Leave the default

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
//Route::post('update/{params}','UpdatesController@init');

Route::get('update/', function(){
	$data = Input::all();
	$uc = new UpdatesController();
	$uc->manualUpdate($data["chosenStates"], $data["status"]);
});  


