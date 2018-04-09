<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill_list_model extends Model
{
    //
    protected $table = "skill_list";
    
    protected $fillable = [ 
    	'skill_list_id', 
    	'jf_email_address', 
    	'skill_id'
    ];
}
