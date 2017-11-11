<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCreateModel extends Model
{
    protected $table = "jobcreator";
    
    protected $fillable = [
    	'CompanyID', 
    	'EmailAddress', 
    	'Password', 
    	'CompanyName', 
    	'CompanyAddress', 
    	'CompanyProfile', 
    	'CreditCard', 
    	'Phone'
    ];

    protected $guarded = ['Password', 'CreditCard'];
}
