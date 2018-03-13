<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterStatus extends Model
{
    //
    protected $table = "masterstatus";
    
    protected $fillable = [
    	'StatusID', 
    	'StatusName'
    ];
}
