<?php

namespace App\Http\Controllers;

use App\job_create_model;
use App\job_match_type_model;
use App\job_type_model;

use Illuminate\Http\Request;

class company_profile_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_create_model = job_create_model::where('email_address', $email_id)->first();
        $job_type_used = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->join('job_master', 'job_match_type.job_id', '=', 'job_master.job_id')
        ->distinct()
        ->where('job_master.jc_email_address', $email_id)
        ->get(['job_type.job_type_id','job_type.job_type_desc']);
        return view('jc_regis.company_profile', array('job_create_model' => $job_create_model, 'job_type_used' => $job_type_used))->withTitle('Company Profile');
    }
}
