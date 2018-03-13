<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAgreementModel extends Model
{
    //
    protected $table = "jobagreement";
    
    protected $fillable = [
    	'AgreementID', 
    	'JobMatchID', 
    	'AgreementDesc'
    ];
}
