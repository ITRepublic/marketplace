<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginJCModel extends Model
{
    //
    protected $table = "jobcreator";
    
    protected $fillable = [
    	'EmailAddress', 
    	'Password'
    ];

    protected $guarded = ['Password'];
}
