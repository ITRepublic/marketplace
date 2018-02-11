<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobMatchTypeModel extends Model
{
    //
    protected $table = "jobmatchtype";
    
    protected $fillable = [
    	'JobID', 
        'JobTypeID'
    ];
}
