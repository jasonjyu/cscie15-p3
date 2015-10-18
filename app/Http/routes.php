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

/**
 * Registers the GET route to the application landing page.
 */
Route::get('/', function () {
    return view('index');
});

/**
 * Registers the GET route to the Lorem Ipsum Generator page.
 */
Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');

/**
 * Registers the POST route to the Lorem Ipsum Generator page.
 */
Route::post('/lorem-ipsum', 'LoremIpsumController@postIndex');

/**
 * Registers the GET route to the Random User Generator page.
 */
Route::get('/random-user', 'RandomUserController@getIndex');

/**
 * Registers the POST route to the Random User Generator page.
 */
Route::post('/random-user', 'RandomUserController@postIndex');

/**
 * Registers the GET route to the xkcd Password Generator page.
 */
Route::get('/xkcd-password', 'XkcdPasswordController@getIndex');

/**
 * Registers the POST route to the xkcd Password Generator page.
 */
Route::post('/xkcd-password', 'XkcdPasswordController@postIndex');
