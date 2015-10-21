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

/*
Route::get('/', function () {
    return view('home');
});
*/

$constraints = array(
    'gender' => 'male|female',
);

Route::get('/{gender?}/{people?}/{topic?}', 'IndexController@index')->where('gender', $constraints['gender']);

// Pass server config variables to client
Route::get('config.js', 'ConfigController@makeConfig');
Route::get('article/{slug}', 'ArticleController@index');
Route::get('about-us', function () {
    return view('about');
});
Route::get('disclaimer', function () {
    return view('disclaimer');
});

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('home-articles', 'Api\ApiController@dummy');

});
