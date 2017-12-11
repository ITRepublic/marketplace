<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobFinderModel extends Model
{
    protected $table = "jobfinder";
    
    protected $fillable = [
    	'UserName', 
    	'Password', 
    	'EmailAddress', 
    	'Address', 
    	'Phone',
    	'groupid'
    ];

    protected $guarded = ['Password'];
}
