<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_type_model extends Model
{
    //
    protected $table = "job_type";
    
    protected $fillable = [
    	'job_type_id', 
    	'job_type_desc'
    ];
}
