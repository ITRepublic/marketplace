<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_login_model extends Model
{
    //
    protected $table = "master_admin";
    
    protected $fillable = [
    	'admin_id', 
    	'username', 
        'password',
        'email_address'
    ];
}
