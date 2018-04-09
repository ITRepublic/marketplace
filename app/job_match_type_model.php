<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_match_type_model extends Model
{
    //
    protected $table = "job_match_type";
    
    protected $fillable = [
        'type_job_id',
    	'job_id', 
        'job_type_id'
    ];
}
