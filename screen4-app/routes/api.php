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

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('sliders', 'Api\HomePage@sliders');
    Route::get('home_videos', 'Api\HomePage@home_videos');
    Route::get('category_videos/{id}/{limit}', 'Api\CategoryPage@category_videos');
    Route::get('category_title/{id}', 'Api\CategoryPage@category_title');
    Route::get('video_attributes/{id}', 'Api\VideoPage@video_attributes');
    Route::get('add_comment/{id}/{email}/{comment}', 'Api\VideoPage@add_comment');
    Route::get('get_comments/{videoId}', 'Api\VideoPage@get_comments');
    Route::get('signup/{name}/{email}/{password}', 'Api\User@signup');
    Route::get('signin/{email}/{password}', 'Api\User@signin');
});   

    