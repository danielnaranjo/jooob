<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Feb 2018 14:20:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

class Candidate extends Eloquent
{
	protected $primaryKey = 'candidate_id';
	public $timestamps = false;

	protected $fillable = [
        'name',
        'email',
        'city',
        'province',
        'country',
        'stack',
        'fulltext',
        'uuid'
	];
    protected $hidden = [
        'uuid'
    ];
}
