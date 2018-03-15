<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobMatchSearchModel extends Model
{
    //
    protected $table = "jobmatchsearch";
    
    protected $fillable = [
    	'JobMatchID', 
    	'JobID', 
        'JFEmailAddress',
        'StatusID'
    ];
}
