<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job_master_model extends Model
{
    //
    protected $table = "job_master";
    
    protected $fillable = [
    	'job_id', 
    	'job_title', 
        'description',
        'expired_date',
        'jc_email_address', 
        'currency_id', 
        'has_seen_id',
        'price_list',
        'job_status',
        'payment_type_id'
    ];
}
