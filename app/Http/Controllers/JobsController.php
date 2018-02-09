<?php

namespace App\Http\Controllers;

use App\Models\Dublinjob;
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
        if (Request::isJson()) {
            $data['user'] = Request::header();
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show($pID)
    {
        /*
            cURL http://127.0.0.1:8080/api/jobs/1000 -H user:'daniel naranjo' -H mail:d@d.com
        */
        $data['results'] = Dublinjob::find($pID);
        $data['total'] = count($data['results']);
        if (Request::isJson()) {
            $data['user'] = Request::header();
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($terms)
    {
        $data['results'] = Dublinjob::search( $query )->get();
        $data['total'] = count($data['results']);
        $data['user'] = Request::header();
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
}
