<?php

namespace App\Http\Controllers;
use Request;

class PublicController extends Controller {

    public function index() {
        if(Request::isJson()) {
            return response()->json(array(
                'code'=>200,
                'version'=>1.0,
                'message'=>'Welcome to jooob (dot) info',
                'description'=>'A developer-to-developer jobs listing.',
                'instructions'=>array(
                    'register'=>'Link your searching history using a Header like: curl --data "name=Daniel&email=your-name@your-email.com" https://jooob.info/jobs/search',
                    'stacks'=>'Searching with your skills or stack: curl --data "stack=php,python,java,mondodb" https://jooob.info/jobs/search',
                    'location'=>'Searching using your location (city,province,country): curl --data "city=buenos+aires" https://jooob.info/jobs/search',
                    'money'=>'Searching a job by salary in USD or ARS: curl --data "money=50000+ars" https://jooob.info/jobs/search',
                    'startup'=>'Looking for a dream job in a Startup (accepted: yes/all/1/ok): curl --data "startup=true" https://jooob.info/jobs/search',
                    'features'=>'Ok, yonu only want features jobs (accepted: yes/all/1/ok): curl --data "feat=1" https://jooob.info/jobs/search',
                    'share'=>'Send a friend this service: curl --data "share=your-friend@your-email.com" https://jooob.info/jobs/share',
                    'share'=>'Send a friend a post: curl --data "share=your-friend@your-email.com" https://jooob.info/jobs/XXXXX/share',
                    'sendme'=>'Send to you email: curl --data "sendme=your-name@your-email.com" https://jooob.info/jobs/sendme',
                )
            ));
        } else {
            return view('welcome');
        }
    }

}
