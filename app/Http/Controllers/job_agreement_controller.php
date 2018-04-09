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

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;

class job_agreement_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_match_search_model = job_match_search_model::join('job_master','job_match_search.job_id', '=', 'job_master.job_id')
        ->join('master_status', 'job_master.job_status', '=', 'master_status.status_id')
        ->join('master_difficulty', 'job_master.difficulty', '=', 'master_difficulty.diff_id')
        ->where('job_master.jc_email_address', $email_id)
        ->get();
        return view('job_agreement.job_agreement', array('job_match_search_model' => $job_match_search_model))->withTitle('Job Agreement List');
    }
    public function get_detail($id)
    {
        session()->forget('job_id');
        session()->put('job_id', $id);
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
        
        $job_status = master_status::wherein('status_id', array(1, 2, 3, 6))
        ->pluck('status_name', 'status_id');
        

        return view('job_agreement.applicant', array('job_master_model' => $job_master_model, 'job_applicant_model' => $job_applicant_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list, 'job_match_search_applicant' => $job_match_search_applicant, 'job_status' => $job_status))->withtitle($job_master_model->job_title);

    }
    public function all()
    {
        $job_match_search_model = job_match_search_model::join('job_master','job_match_search.job_id', '=', 'job_master.job_id')
        ->join('master_status', 'job_master.job_status', '=', 'master_status.status_id')
        ->join('master_difficulty', 'job_master.difficulty', '=', 'master_difficulty.diff_id')
        ->get();
        return view('job_agreement.job_agreement', array('job_match_search_model' => $job_match_search_model))->withtitle('Job Agreement List');
    }
    public function get_detail_applicant($id)
    {
        $job_id = session()->get('job_id');
        $job_finder_model = job_finder_model::where('finder_id', $id)
        ->get()
        ->first();

        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
        ->where('jf_email_address', $job_finder_model->email_address)
        ->get(['skill_type.skill_type']);

        return view('job_agreement.detail_applicant', array('job_finder_model' => $job_finder_model, 'skill_list' => $skill_list))->withtitle('Applicant Profile');

    }
    public function store_applicant(Request $request)
    {
        $job_id = session()->get('job_id');
        $email_address = $request->email_address;
        $job_match_search = job_match_search_model::where([
            ['job_id', '=', $job_id],
            ['jf_email_address', '=',$email_address]
            ])->first();

        $data['status_id'] = '4';
        if ($job_match_search->status_id == 4){
            $data['status_id'] = '5';
        }

        $jm_update = job_match_search_model::where([
            ['job_id', '=', $job_id],
            ['jf_email_address', '=',$email_address]
            ])->update($data);
        
        return redirect()->route('detail_jobagreement', ['id' => $job_id]);
        return redirect()->back();
    }
    public function store_status(Request $request)
    {
        $job_id = session()->get('job_id');
        $rules = [
            'job_status'      => 'required'
        ];
        $this->validate($request, $rules);
        //save db
        $data['job_status'] = $request->job_status;
    
        $jm_update = job_master_model::where('job_id', $job_id)->update($data);
        session()->forget('result');
        return redirect()->to('/projects')->withSuccess('Job Status Update is done.');
    }
    
}
