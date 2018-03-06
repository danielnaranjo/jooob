<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::prefix('v1')->group(function () {
    Route::get('/', 'PublicController@index');
    Route::resource('jobs', 'JobsController');
    Route::resource('candidates', 'CandidateController');
    Route::resource('company', 'CompanyController');
    Route::resource('metrics', 'MetricController');
    Route::post('search', 'JobsController@search');
});

Route::domain('start.jooob.info')->group(function () {
    Route::get('/', 'PublicController@index');
});

// Route::resource('jobs', 'JobsController');
// Route::post('/jobs/search', 'JobsController@search');

//Route::resource('jobs', 'JobsController');
//https://superuser.com/questions/149329/what-is-the-curl-command-line-syntax-to-do-a-post-request
//Route::post('/user','JobsController@index');

//curl --data "name=Daniel Naranjo&email=d@d.com.ar" http://127.0.0.1:8080/api/user/create
// Route::get('/', function(){
//     return response()->json(array(
//         'code'=>200,
//         'version'=>1.0,
//         'message'=>'Welcome to jooob (dot) info',
//         'description'=>'A developer-to-developer jobs listing.',
//         'instructions'=>array(
//             'register'=>'Link your searching history using a Header like: curl --data "name=Daniel&email=your-name@your-email.com" https://jooob.info/jobs/search',
//             'stacks'=>'Searching with your skills or stack: curl --data "stack=php,python,java,mondodb" https://jooob.info/jobs/search',
//             'location'=>'Searching using your location (city,province,country): curl --data "city=buenos+aires" https://jooob.info/jobs/search',
//             'money'=>'Searching a job by salary in USD or ARS: curl --data "money=50000+ars" https://jooob.info/jobs/search',
//             'startup'=>'Looking for a dream job in a Startup (accepted: yes/all/1/ok): curl --data "startup=true" https://jooob.info/jobs/search',
//             'features'=>'Ok, yonu only want features jobs (accepted: yes/all/1/ok): curl --data "feat=1" https://jooob.info/jobs/search',
//             'share'=>'Send a friend this service: curl --data "share=your-friend@your-email.com" https://jooob.info/jobs/share',
//             'share'=>'Send a friend a post: curl --data "share=your-friend@your-email.com" https://jooob.info/jobs/XXXXX/share',
//             'sendme'=>'Send to you email: curl --data "sendme=your-name@your-email.com" https://jooob.info/jobs/sendme',
//         )
//     ));
// });
//
// Route::domain('api.localhost')->group(function () {
//     Route::resource('jobs', 'JobsController');
// });

Route::prefix('private')->group(function () {
    Route::get('/tasks', 'PublicController@indeed');
});
