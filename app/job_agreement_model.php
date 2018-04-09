<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_agreement_model extends Model
{
    //
    protected $table = "job_agreement";
    
    protected $fillable = [
    	'agreement_id', 
    	'job_match_id', 
    	'agreement_desc'
    ];
}
