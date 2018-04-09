<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_difficulty extends Model
{
    //
    protected $table = "master_difficulty";
    
    protected $fillable = [
    	'diff_id', 
    	'diff_name'
    ];
}
