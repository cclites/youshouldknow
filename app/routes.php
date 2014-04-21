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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('daemon', function(){
	$init = new Init();
	$init->init();
});


Route::get('vote/{voteId}', 'ViewController@init');
/*
Route::get('vote/{voteId}', function($voteId){
	//how to grab a parameter. args[0]?
	echo "Vote id is $voteId<br>";
});
 */

/*
Route::get('/', function()
{
    $callback = url('twitter/callback');
    return Twitter::authorize($callback);
});

Route::get('callback', function()
{
    $callback = Twitter::getCallback();

    if($callback == 200)
    {
        return Redirect::to('share')->withFlashSuccess('Your twitter is connected.');
    }
    return Redirect::to('/')->withFlashError('Connecting failed.');
});
 * 
 */
