<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobMasterModel extends Model
{
    //
    protected $table = "jobmaster";
    
    protected $fillable = [
    	'JobID', 
    	'JobTitle', 
        'Description',
        'JCEmailAddress', 
    	'Difficulty', 
        'HasSeenID',
        'PriceList'
    ];
}
