<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_finder_model extends Model
{
    protected $table = "job_finder";
    
    protected $fillable = [
    	'username', 
    	'password', 
    	'email_address', 
    	'address', 
    	'phone',
		'group_id',
		'total_rating',
		'status'
    ];

    protected $guarded = ['password'];
}
