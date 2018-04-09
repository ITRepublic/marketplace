<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_status extends Model
{
    //
    protected $table = "master_status";
    
    protected $fillable = [
    	'status_id', 
    	'status_name'
    ];
}
