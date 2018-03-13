<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSkillReqModel extends Model
{
    //
    protected $table = "jobmatchskill";
    
    protected $fillable = [
        'SkillJobID',
    	'JobID', 
        'SkillID'
    ];
}
