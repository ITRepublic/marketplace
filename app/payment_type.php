<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_type extends Model
{
    //
    protected $table = "master_payment_type";
    
    protected $fillable = [
    	'payment_type_id', 
    	'payment_type_name'
    ];
}
