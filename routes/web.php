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

//use Request;

Route::get('/', 'PublicController@index');

//Route::resource('jobs', 'JobsController');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::domain('api.localhost')->group(function () {
    Route::get('/', 'PublicController@index');
    Route::resource('jobs', 'JobsController');
    Route::resource('candidates', 'CandidateController');
    Route::resource('company', 'CompanyController');
    Route::resource('metrics', 'MetricController');
});

Route::resource('jobs', 'JobsController');
Route::post('/jobs/search', 'JobsController@search');

// Route::group(array('domain' => '{subdomain}.website.com'), function () {
//     Route::get('/', function ($subdomain) {
//         $name = DB::table('users')->where('name', $subdomain)->get();
//         dd($name);
//     });
// });

// return response()->json(array(
//     'code'=>200,
//     'version'=>1.0,
//     'message'=>'Welcome to jooob (dot) info',
//     'description'=>'A developer-to-developer jobs listing.',
//     'instructions'=>array(
//         'register'=>'Link your searching history using a Header like: curl --data "name=Daniel&email=your-name@your-email.com" https://api.jooob.info/jobs/search',
//         'stacks'=>'Searching with your skills or stack: curl --data "stack=php,python,java,mondodb" https://api.jooob.info/jobs/search',
//         'location'=>'Searching using your location (city,province,country): curl --data "city=buenos+aires" https://api.jooob.info/jobs/search',
//         'money'=>'Searching a job by salary in USD or ARS: curl --data "money=50000+ars" https://api.jooob.info/jobs/search',
//         'startup'=>'Looking for a dream job in a Startup (accepted: yes/all/1/ok): curl --data "startup=true" https://api.jooob.info/jobs/search',
//         'features'=>'Ok, yonu only want features jobs (accepted: yes/all/1/ok): curl --data "feat=1" https://api.jooob.info/jobs/search',
//         'share'=>'Send a friend this service: curl --data "share=your-friend@your-email.com" https://api.jooob.info/jobs/share',
//         'share'=>'Send a friend a post: curl --data "share=your-friend@your-email.com" https://api.jooob.info/jobs/XXXXX/share',
//         'sendme'=>'Send to you email: curl --data "sendme=your-name@your-email.com" https://api.jooob.info/jobs/sendme',
//     )
// ));
