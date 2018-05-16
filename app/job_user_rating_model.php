<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_user_rating_model extends Model
{
    //
    protected $table = "job_user_rating";
    
    protected $fillable = [
    	'rating_id', 
        'job_id',
        'user_id',
        'group_id',
        'rating_score'
    ];
}
