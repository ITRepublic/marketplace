<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_skill_req_model extends Model
{
    //
    protected $table = "job_match_skill";
    
    protected $fillable = [
        'skill_job_id',
    	'job_id', 
        'skill_id'
    ];
}
