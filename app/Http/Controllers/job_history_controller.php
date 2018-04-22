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
use App\job_match_search_model;
use App\job_finder_model;
use App\master_status;
use App\job_master_detail_milestone_model;
use App\payment_type;
use App\master_currency;



use Illuminate\Http\Request;

class job_history_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_history_model = job_master_model::join('job_match_search','job_master.job_id', '=', 'job_match_search.job_id')
        ->join('job_creator','job_master.jc_email_address', '=', 'job_creator.email_address')
        ->join('master_status','job_master.job_status', '=', 'master_status.status_id')
        ->where('job_match_search.jf_email_address', $email_id)
        ->get();
        return view('job_agreement.job_history', array('job_history_model' => $job_history_model))->withTitle('Job Agreement List');
    }
    public function job_history_detail($id)
    {
        session()->forget('detail_job_agreement_session');
        session()->put('detail_job_agreement_session', 'edit');

        $job_master_model = job_master_model::join('master_status','job_master.job_status', '=', 'master_status.status_id')
        ->join('currency', 'job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator', 'job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where('job_id', $id)
        ->first();

        $job_match_type_model = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['job_type.job_type_desc']);

        $skill_list = job_skill_req_model::join('skill_type','job_match_skill.skill_id', '=', 'skill_type.skill_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['skill_type.skill_type']);

        $job_applicant_model = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->join('master_status', 'job_match_search.status_id', '=', 'master_status.status_id')
        ->where('job_id', $id)
        ->get();

        $job_match_search_applicant = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->where([
            ['status_id', '=', '5'],
            ['job_id', '=', $id]
            ])
        ->get();
        
        $job_master_detail_milestone_model_check = job_master_detail_milestone_model::where('job_id', $id)
        ->where(function($query)
            {
                $query->where('status_id', '=', '2')
                    ->orWhere('status_id', '=', '3')
                    ->orWhere('status_id', '=', '4')
                    ->orWhere('status_id', '=', '5')
                    ->orWhere('status_id', '=', '6');
            })
        ->count();
        
       

        $payment_status = '1';

        
        $job_master_detail_milestone_model = job_master_detail_milestone_model::where('job_id', $id)
        ->get();
        if ($job_master_detail_milestone_model_check > 0){
            $payment_status = '2';
            
        }
        

        $job_agreement_status = payment_type::where('payment_type_id', $payment_status)
        ->get(['master_payment_type.payment_type_name'])->first();

        
        
        $job_status = master_status::wherein('status_id', array(1, 2, 3,4,5, 6))
        ->pluck('status_name', 'status_id');
        

        return view('job_agreement.applicant', array('job_master_model' => $job_master_model, 'job_applicant_model' => $job_applicant_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list, 'job_match_search_applicant' => $job_match_search_applicant, 'job_status' => $job_status, 'job_master_detail_milestone_model_check' => $job_master_detail_milestone_model_check, 'job_agreement_status' => $job_agreement_status ,'job_master_detail_milestone_model' => $job_master_detail_milestone_model))->withtitle($job_master_model->job_title);

    }

}
