<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterCurrency extends Model
{
    //
    protected $table = "currency";
    
    protected $fillable = [
    	'CurrencyID', 
    	'CurrencyName'
    ];
}
