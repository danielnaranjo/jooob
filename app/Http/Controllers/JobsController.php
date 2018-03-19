<?php

namespace App\Http\Controllers;

use App\Models\Dublinjob;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\Metric;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema;
use Illuminate\Support\Facades\Route;
use Request;
use Cookie;
use Session;
use Validator;
use MessageBag;
use Mail;
use Mailgun;
use Helper;
use Date;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['results'] = Dublinjob::all();
        $data['total'] = count($data['results']);
        if (Request::isJson()) {
            //$data['user'] = Request::header();
            if(Request::header('email')){
                $data['user'] = Request::header('user');
                $data['email'] = Request::header('email');
                if(Request::header('email')){
                    $data['user'] = Request::header('user');
                    $data['email'] = Request::header('email');
                    $added = Candidate::firstOrNew( array( 'email' => Request::header('email') ) );
                    $added->name = Request::header('user');
                    $added->city = Request::header('city');
                    $added->province = Request::header('province');
                    $added->country = Request::header('country');
                    $added->stack = Request::header('stack');
                    $added->created_at = Date::now()->format('Y-m-d H:i:s');
                    $added->save();
                }
            }
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
            cURL http://127.0.0.1:8080/api/jobs/1000 -H user:'daniel naranjo' -H mail:d@d.com
        */
        $data['results'] = Dublinjob::find($id);
        if (Request::isJson()) {
            //$data['user'] = Request::header();
            if(Request::header('email')){
                $data['user'] = Request::header('user');
                $data['email'] = Request::header('email');
                $added = Candidate::firstOrNew( array( 'email' => Request::header('email') ) );
                $added->name = Request::header('user');
                $added->city = Request::header('city');
                $added->province = Request::header('province');
                $added->country = Request::header('country');
                $added->stack = Request::header('stack');
                $added->created_at = Date::now()->format('Y-m-d H:i:s');
                $added->save();
            }
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $terms = Request::input('terms');
        $data['results'] = Dublinjob::search( $terms )->get();
        $data['total'] = count($data['results']);
        if(Request::header('email')){
            $data['user'] = Request::header('user');
            $data['email'] = Request::header('email');
            $added = Candidate::firstOrNew( array( 'email' => Request::header('email') ) );
            $added->name = Request::header('user');
            $added->city = Request::header('city');
            $added->province = Request::header('province');
            $added->country = Request::header('country');
            $added->stack = Request::header('stack');
            $added->created_at = Date::now()->format('Y-m-d H:i:s');
            $added->save();
        }
        $searched = new Metric();
        if(Request::header('email')){
        $searched->user_id = Request::header('email');
        }
        $searched->fulltext = $data['results'];
        $searched->job_id = $terms;
        $searched->created_at = Date::now()->format('Y-m-d H:i:s');
        $searched->save();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Dublinjob $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dublinjob $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dublinjob $jobs)
    {
        //
    }

    public function sendme(Request $request) {
        Date::setLocale('es');
        $tiempo = "1 days";
        $trabajos = Dublinjob::find($id);
        $fecha = Date::now('America/Argentina/Buenos_Aires')->format('l j F Y');
        $inside = array(
            'fecha' => $fecha,
            'trabajos' => $trabajos,
            'email' => $email,
        );
        $data['inside'] = $inside;

        Mailgun::send('emails.compartir', $inside, function ($message) use ($inside){
            $message->from("info@jooob.info");
            $message->subject("Te has enviado una vacante de jooob ");
            $message->tag(['sendme', 'users']);
            $message->to("daniel@loultimoenlaweb.com");
        });
    }

    public function share(Request $request,$id) {
        Date::setLocale('es');
        $tiempo = "1 days";
        $trabajos = Dublinjob::find($id);
        $fecha = Date::now('America/Argentina/Buenos_Aires')->format('l j F Y');
        $inside = array(
            'fecha' => $fecha,
            'trabajos' => $trabajos,
            'email' => $email,
        );
        $data['inside'] = $inside;

        Mailgun::send('emails.compartir', $inside, function ($message) use ($inside){
            $message->from("info@jooob.info");
            $message->subject("Te han compartido una vacante de jooob ");
            $message->tag(['share', 'users']);
            $message->to("daniel@loultimoenlaweb.com");
        });
    }
}
