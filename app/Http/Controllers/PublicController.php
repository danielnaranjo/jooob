<?php

namespace App\Http\Controllers;
use Request;

use App\Models\Dublinjob;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\Metric;

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
            $searched = new Metric();
            if(Request::header('email')){
            $searched->user_id = Request::header('email');
            }
            $searched->fulltext = $data['results'];
            $searched->job_id = 'instructions';
            $searched->created_at = Date::now()->format('Y-m-d H:i:s');
            $searched->save();
        } else {
            return view('welcome');
        }
    }

    public function indeed(){

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
	       $ip = $_SERVER['REMOTE_ADDR'];
	       $shorten=$p->url;//bitly_v3_shorten($p->url, $bitly_key, 'j.mp')

	       // SQL Statement
	       //$Query="INSERT INTO dublinjobs VALUES (NULL, '0', '".$jobtitle."', '".$description."', 'Otros','Consultar', '".$location."', '".$location."','".$validFrom."', '".$validTo."','".$stack."','0','Consultar','Para aplicar debes hacer clic en el siguiente enlace: ".$shorten."','Loaded via API/CronJob/Indeed','".$ip."','0','1');";
	       //echo  $Query. '<br><br>'; // debug

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
