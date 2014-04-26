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

Route::get('daemon', 'Init@init');

Route::get('vote/{voteId}', 'ViewController@init');

//test can be an array of tests
//valid switchers are [vote, bill]
Route::get('test/{test}', function($test){
	
									define('TEST', $test);
									
									$vc = new ViewController();
									$vc->init(0);
                                }
          );

