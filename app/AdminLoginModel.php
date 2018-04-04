<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLoginModel extends Model
{
    //
    protected $table = "masteradmin";
    
    protected $fillable = [
    	'adminid', 
    	'username', 
        'password',
        'emailaddress'
    ];
}
