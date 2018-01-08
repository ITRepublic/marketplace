<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectJobReqModel extends Model
{
    //
    protected $table = "projectjobrequirement";
    
    protected $fillable = [
    	'JobID', 
        'SkillID',
        'JCEmailAddress', 
    	'JobType', 
    	'JobTypeDesc', 
    	'JobName', 
    	'JobDescription', 
    	'PriceList'
    ];
}
