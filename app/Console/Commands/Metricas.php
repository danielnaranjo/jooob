<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Metric;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use Mailgun;
use Log;
use Date;

class Metricas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tareas:metricas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de metricas mensuales';

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
        $tiempo = "30 days";
        $diaria = Date::now('America/Argentina/Buenos_Aires')->sub($tiempo)->format('Y-m-d H:i:s');
        $metricas= Metric::where('created_at', '>=', $diaria )->get();
        $fecha = Date::now('America/Argentina/Buenos_Aires')->format('l j F Y');
        $inside = array(
            'fecha' => $fecha,
            'metricas' =>  $metricas,
        );
        Log::info('**************');
        Log::info('Metricas: '.Date::now('America/Argentina/Buenos_Aires')->format('l j F Y H:m') );
        Log::info('**************');

        Mailgun::send('emails.metricas', $inside, function ($message) use ($inside){
            $message->from("info@jooob.info", "Joel @ Operaciones");
            $message->subject("[jooob] Metricas al ".$inside['fecha']);
            $message->tag(['tareas', 'mensual', 'metricas']);
            $message->to("daniel@loultimoenlaweb.com");
        });
    }
}
