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
Route::get('/roles', 'RoleController@index');
Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', 'ArticleController@getOne');
Route::patch('/articles', 'ArticleController@update');
Route::get('/tags', 'TagController@index');
Route::post('/article', 'ArticleController@store');

