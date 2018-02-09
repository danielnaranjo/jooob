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
Route::resource('jobs', 'JobsController');
//https://superuser.com/questions/149329/what-is-the-curl-command-line-syntax-to-do-a-post-request
Route::post('/user','JobsController@');
//curl --data "name=Daniel Naranjo&email=d@d.com.ar" http://127.0.0.1:8080/api/user/create
