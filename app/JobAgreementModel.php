<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAgreementModel extends Model
{
    //
    protected $table = "jobagreement";
    
    protected $fillable = [
    	'IndexNo', 
    	'AgreementID', 
    	'JobMatchID', 
    	'AgreementDesc'
    ];
}
