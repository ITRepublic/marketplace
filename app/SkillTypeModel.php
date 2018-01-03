<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillTypeModel extends Model
{
    //
    protected $table = "skilltype";
    
    protected $fillable = [
    	'IndexNo', 
    	'SkillID', 
    	'SkillType', 
    	'SkillDescription'
    ];
}
