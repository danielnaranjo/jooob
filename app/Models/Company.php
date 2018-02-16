<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Feb 2018 14:20:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

class Company extends Eloquent
{
	protected $table = 'company';
    protected $primaryKey = 'company_id';
	public $timestamps = false;

	protected $fillable = [
        'company',
        'info',
        'email',
        'website',
        'city',
        'startup',
        'logo',
        'uuid'
	];
    protected $hidden = [
        'uuid'
    ];
}
