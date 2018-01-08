<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTypeModel extends Model
{
    //
    protected $table = "jobtype";
    
    protected $fillable = [
    	'JobTypeID', 
    	'JobTypeDesc'
    ];
}
