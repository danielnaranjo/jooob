<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Feb 2018 14:20:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

/**
 * Class Dublinjob
 *
 * @property int pID
 * @property string $company
 * @property string $info
 * @property string $website
 * @property string $email
 * @property string $startup
 * @property string $logo
 * @property string $jobtitle
 * @property string $description
 * @property string $contract
 * @property string $location
 * @property string $city
 * @property string $country
 * @property \Carbon\Carbon $validFrom
 * @property \Carbon\Carbon $validTo
 * @property string $stack
 * @property string $salary
 * @property string $equity
 * @property string $instructions
 * @property string $marketing
 * @property string $ip
 * @property string $paidoptions
 * @property string $status
 *
 * @package App\Models
 */
class Dublinjob extends Eloquent
{
	protected $primaryKey = 'pID';
	public $timestamps = false;

	protected $dates = [
		'validFrom',
		'validTo'
	];

	protected $fillable = [
		'jobtitle',
		'description',
		'contract',
		'location',
		'city',
		'country',
		'validFrom',
		'validTo',
		'stack',
		'salary',
		'equity',
		'instructions',
	];
    protected $hidden = [
        'company',
		'info',
		'website',
		'email',
		'startup',
		'logo',
		'marketing',
		'ip',
		'paidoptions',
		'status',
    ];
}
