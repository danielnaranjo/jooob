<?php

namespace App\Console\Commands;
use App\Models\Dublinjob;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\Metric;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use Mailgun;
use Log;
use Date;

use Illuminate\Console\Command;

class Actividad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tareas:actividad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de actividad diaria';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Date::setLocale('es');
        $tiempo = "1 days";
        $diaria = Date::now('America/Argentina/Buenos_Aires')->sub($tiempo)->format('Y-m-d H:i:s');
        $trabajos = Dublinjob::where('validFrom', '>=', $diaria )->get();
        $candidatos = Candidate::where('created_at', '>=', $diaria )->get();
        $metricas= Metric::where('created_at', '>=', $diaria )->get();
        $empresas = Company::where('created_at', '>=', $diaria )->get();
        $fecha = Date::now('America/Argentina/Buenos_Aires')->format('l j F Y');
        $inside = array(
            'fecha' => $fecha,
            'trabajos' => $trabajos,
            'candidatos' => $candidatos,
            'metricas' =>  $metricas,
            'empresas' =>  $empresas,
        );
        Log::info('**************');
        Log::info('INSIDE: trabajos     : '. count($trabajos));
        Log::info('INSIDE: candidatos   : '. count($candidatos));
        Log::info('INSIDE: metricas     : '. count($metricas));
        Log::info('INSIDE: empresas     : '. count($empresas));
        Log::info('**************');

        Mailgun::send('emails.actividad', $inside, function ($message) use ($inside){
            $message->from("info@jooob.info", "Joel @ Operaciones");
            $message->subject("[jooob] Actividad diaria: ".$inside['fecha']);
            $message->tag(['tareas', 'diarias', 'administrativas']);
            $message->to("daniel@loultimoenlaweb.com");
        });
    }
}
