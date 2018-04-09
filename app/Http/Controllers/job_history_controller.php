<?php

namespace App\Http\Controllers;

use App\job_master_model;
use App\skill_type_model;
use App\skill_list_model;
use App\job_create_model;
use App\job_type_model;
use App\job_match_type_model;
use App\job_skill_req_model;
use App\job_agreement_model;

use Illuminate\Http\Request;

class job_history_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_history_model = job_agreement_model::join('job_match_search','job_agreement.job_match_id', '=', 'job_match_search.job_match_id')
        ->join('job_master', 'job_match_search.job_id', '=', 'jobmaster.job_id')
        ->where('job_match_search.jf_email_address', $email_id)
        ->get();
        return view('job_agreement.job_history', array('job_history_model' => $job_history_model))->withTitle('Job Agreement List');
    }
}
