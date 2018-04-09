<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_match_search_model extends Model
{
    //
    protected $table = "job_match_search";
    
    protected $fillable = [
    	'job_match_id', 
    	'job_id', 
        'jf_email_address',
        'status_id'
    ];
}
