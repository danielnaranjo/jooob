<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dublinjob;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use Mailgun;
use Log;
use Date;

class Vacantes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'envios:vacantes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de Vacantes segun stack personal';

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
        Log::info('**************');
        Log::info('Vacantes: '.Date::now('America/Argentina/Buenos_Aires')->format('l j F Y H:m') );
        Log::info('**************');
        Date::setLocale('es');

        // $fecha = Date::now('America/Argentina/Buenos_Aires')->format('l j F Y');
        // $inside = array(
        //     'fecha' => $fecha,
        //     'trabajos' => $trabajos,
        //     'candidatos' => $candidatos,
        //     'metricas' =>  $metricas,
        //     'empresas' =>  $empresas,
        // );
        // Mail::send('emails.actividad', $inside, function ($message) use ($inside){
        //     $message->from("info@jooob.info", "Joel @ Operaciones");
        //     $message->subject("[jooob] Actividad diaria: ".$inside['fecha']);
        //     //$message->tag(['tareas', 'diarias', 'administrativas']);
        //     $message->to("daniel@loultimoenlaweb.com");
        // });
    }
}
