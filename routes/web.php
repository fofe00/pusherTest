<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat','ChatController@chat');
Route::get('/send1','ChatController@send1');
Route::post('/send','ChatController@send');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fichier', 'FichierController@form')->name('up_form');
Route::post('/fichier', 'FichierController@getFile')->name('post_form');
Route::get('/getFilePerUser', 'FichierController@getFilePerUser');

Route::get('/upload-file', 'FileUploadController@createForm')->name('createForm');
Route::post('/upload-file', 'FileUploadController@fileUpload')->name('fileUpload');
