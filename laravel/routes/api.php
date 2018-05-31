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
Route::patch('roles/{id}', 'ProjectController@update');
Route::get('/projects', 'ProjectController@index');
Route::get('/templates/{slug}', 'TemplateController@show');
Route::get('/articles/{id}', 'ArticleController@getOne');
Route::post('/article', 'ArticleController@store');
Route::patch('/articles', 'ArticleController@update');
Route::get('/tags', 'TagController@index');
Route::post('/article', 'ArticleController@store');
