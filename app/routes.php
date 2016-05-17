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

Route::get('/', 'registerController@index');
Route::post('/', 'registerController@index');
Route::post('/validemail', 'registerController@valid_email');
Route::post('/register', 'registerController@add');
Route::post('/preview', 'previewController@index');
Route::get('/print/{id}', 'pdfController@index');
Route::get('/test/pdf', 'registerController@index');
// http://198.211.116.172/registermagnitude/public/registration/confirm?key=2297aea7107a2828a896c22459b17226
Route::get('/registration/confirm', 'verifyController@confirm');

Route::get('/email/thanks', 'emailController@comming');
Route::get('/email/miss', 'emailController@not_coming');