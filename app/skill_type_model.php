<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill_type_model extends Model
{
    //
    protected $table = "skill_type";
    
    protected $fillable = [
    	'skill_id', 
    	'skill_type', 
    	'skill_description'
    ];
}
