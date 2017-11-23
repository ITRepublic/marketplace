<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobFinderModel extends Model
{
    //
    protected $table = "jobfinder";
    
    protected $fillable = [
    	'UserName', 
    	'Password', 
    	'Email', 
    	'Address', 
    	'Phone'
    ];

    protected $guarded = ['Password'];
}
