<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDifficulty extends Model
{
    //
    protected $table = "masterdifficulty";
    
    protected $fillable = [
    	'DiffID', 
    	'DiffName'
    ];
}
