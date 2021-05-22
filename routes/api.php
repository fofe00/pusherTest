<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/fichier', 'FichierController@getFile');
Route::post('/deleteFile', 'FichierController@deleteFile');
Route::get('/getFilePerUser', 'FichierController@getFilePerUser');
Route::get('/articles', 'ArticleController@index');
Route::get('/article/{id}', 'ArticleController@articleId');
Route::post('/saveProject','ProjectController@saveProject');
Route::get('/getProject/{id?}','ProjectController@getProject');
Route::post('/pp','ProjectController@getProject1');
Route::post('/updatePoject','ProjectController@updatePoject');
Route::post('/deleteProject','ProjectController@deleteProject');
