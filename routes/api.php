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
Route::get('/posts',[
    'uses'=>'ApiController@getPosts'
]);
Route::get('/categories',[
    'uses'=>'ApiController@getCategory'
]);
Route::get('/post/id/{id}',[
    'uses'=>'ApiController@getPostOne'
]);
Route::post('/new/category',[
    'uses'=>'ApiController@newCategory'
]);
