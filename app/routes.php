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

Route::get('/email/thanks', 'emailController@comming');