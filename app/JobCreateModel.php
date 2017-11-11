<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCreateModel extends Model
{
    protected $table = "jobcreator";
    
        protected $fillable = ['CompanyID','EmailAddress', 'CompanyName','CompanyAddress','CompanyProfile','Phone'];
    
        protected $guarded = ['Password', 'CreditCard'];
}
