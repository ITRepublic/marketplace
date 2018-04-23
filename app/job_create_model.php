<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_create_model extends Model
{
    protected $table = "job_creator";
    
    protected $fillable = [
    	'company_id', 
    	'email_address', 
    	'password', 
    	'company_name', 
    	'company_address', 
    	'company_profile',
    	'phone',
		'group_id',
		'status'
    ];

    protected $guarded = ['password'];
}
