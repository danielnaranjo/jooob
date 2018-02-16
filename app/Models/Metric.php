<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Feb 2018 14:20:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;

class Metric extends Eloquent
{
	protected $primaryKey = 'metric_id';
	public $timestamps = false;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

	protected $fillable = [
        'metric_id',
        'job_id',
        'user_id',
        'fulltext'
	];

    public function job()
    {
        return $this->belongsTo('App\Models\Dublinjob','id','job_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Candidate','candidate_id','user_id');
    }

}
