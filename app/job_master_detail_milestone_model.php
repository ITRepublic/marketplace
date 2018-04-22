<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_master_detail_milestone_model extends Model
{
    //
    protected $table = "job_master_detail_milestone";
    
    protected $fillable = [
    	'job_id', 
    	'milestone_detail',
        'milestone_price',
        'status_id'
    ];
}
