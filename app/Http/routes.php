<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Pass server config variables to client
Route::get('config.js', 'ConfigController@makeConfig');

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('home-articles', 'Api\ApiController@dummy');

});
