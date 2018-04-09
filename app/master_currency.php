<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_currency extends Model
{
    //
    protected $table = "currency";
    
    protected $fillable = [
    	'currency_id', 
    	'currency_name'
    ];
}
