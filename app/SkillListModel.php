<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillListModel extends Model
{
    //
    protected $table = "skilllist";
    
    protected $fillable = [ 
    	'SkillListID', 
    	'JFEmailAddress', 
    	'SkillID'
    ];
}