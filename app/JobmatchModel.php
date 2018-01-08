<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobmatchModel extends Model
{
    //
    protected $table = "jobmatchsearch";
    
    protected $fillable = [
    	'IndexNo', 
    	'JobMatchID', 
    	'JobID', 
    	'SkillListID'
    ];
}
