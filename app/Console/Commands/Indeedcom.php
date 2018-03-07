<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Request;
use App\Models\Dublinjob;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema;
use Illuminate\Support\Facades\Route;
use Cookie;
use Session;
use Validator;
use MessageBag;
use Mail;
use Mailgun;
use Helper;
use Date;

class Indeedcom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tareas:indeedcom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar datos de indeed.com';

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
        function limpiar($nombre){
	        $replace = array( 'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o','ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','-'=>' ', '('=>'', '-'=>'',')'=>'', '/'=>'', ','=>'', '.'=>'');
	        return strtr( $nombre, $replace);
	    }

	   //http://api.indeed.com/ads/apisearch?publisher=7342305347890008&q=node,nodejs,javascript,java,ionic,c,php,python,ruby,aws,rackspace,lua,android,ios,bi,pentaho,networking,cisco,juniper,linux,ngix,engineer&l=buenos+aires&sort=date&radius=&st=&jt=&start=&limit=&fromage=&filter=&latlong=1&co=ar&chnl=&v=2

	   $url = 'http://api.indeed.com/ads/apisearch?co=ar&start=0&limit=100&';
	   $url.= 'format=json&publisher=7342305347890008&highlight=1&';
	   $url.= 'q=node,nodejs,javascrip,java,ionic,c,php,python,ruby,aws,rackspace,lua,android,ios,bi,pentaho,networking,cisco,juniper,linux,ngix,engineer&';
	   $url.= 'l=buenos+aires';
	   $url.= '&sort=&radius=&st=&jt=&fromage=1&filter=1&latlong=1&chnl=&userip=1.2.3.4';
	   $url.= '&useragent=Mozilla/%2F4.0%28Firefox%29&v=2';

	   $json_string = file_get_contents($url);
	   $parsed_json = json_decode($json_string);

	   foreach($parsed_json->results as $p){
	       // Fields
	       $validFrom = date("Y-m-d", strtotime($p->date));
	       $validTo=date("Y-m-d", strtotime("$validFrom +30 days"));
	       $jobtitle=limpiar($p->jobtitle);
	       $description=strip_tags($p->snippet);
	       $company=$p->source;
	       $location=$p->formattedLocation;
	       $stack=limpiar($jobtitle);
	       //$ip = '0.0.0.0';
	       $shorten=$p->url;//bitly_v3_shorten($p->url, $bitly_key, 'j.mp')
           $added = new Dublinjob();
           $added->company_id = 0;
           $added->jobtitle = $jobtitle;
           $added->description = $description;
           $added->contract = 'Consultar';
           $added->location = 'Consultar';
           $added->city = $location;
           $added->country = 'Argentina';
           $added->stack = $stack;
           $added->validFrom = $validFrom;
           $added->validTo = $validTo;
           $added->salary = 0;
           $added->equity = 0;
           $added->instructions = 'Para aplicar debes hacer clic en el siguiente enlace: '.$shorten;
           $added->marketing = 'Indeed';
           $added->ip = '0.0.0.0';
           $added->paidoptions = 0;
           $added->status = 1;
           $added->save();
       }
   }
}
