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
        'ExpiredDate',
        'JCEmailAddress', 
        'Difficulty',
        'CurrencyID', 
        'HasSeenID',
        'PriceList'
    ];
}
