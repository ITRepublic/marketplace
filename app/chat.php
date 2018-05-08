<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table = 'chat';

    protected $fillable = [
    	'job_id','sender_id','receiver_id','message'
    ];
}
