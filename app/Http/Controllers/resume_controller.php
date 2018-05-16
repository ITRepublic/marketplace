<?php

namespace App\Http\Controllers;

use App\job_finder_model;
use App\skill_type_model;
use App\skill_list_model;
use App\job_match_search_model;
use App\master_status;
use App\payment_type;
use App\job_master_model;
use App\job_user_rating_model;

use Illuminate\Http\Request;

class resume_controller extends Controller
{
    public function create()
    {
        session()->forget('detail_resume_session');
        session()->put('detail_resume_session', 'view');
        $job_finder_model = job_finder_model::all();
        return view('resume.resume_grid', array('job_finder_model' => $job_finder_model))->withTitle('Resume');
    }
    public function store(Request $request)
    { 
        $rules = [
    		'username'      => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric'
    	];
        $this->validate($request, $rules);
        //save db
        $data['username'] = $request->username;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $jf = job_finder_model::where('finder_id',$request->finder_id)->update($data);
        return redirect('/resume/all')->withSuccess('Resume has been updated.');
    }
    public function all()
    {
        session()->forget('detail_resume_session');
        session()->put('detail_resume_session', 'view');
        $job_finder_model = job_finder_model::all();
        return view('resume.resume_grid', array('job_finder_model' => $job_finder_model))->withTitle('Resume');
    }
    public function get_detail($id)
    {
        session()->forget('detail_resume_session');
        session()->put('detail_resume_session', 'view');
        $job_finder_model = job_finder_model::where('finder_id', $id)->first();
        $skill_type = skill_type_model::pluck('skill_type', 'skill_id');
        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
                    ->where('jf_email_address', $job_finder_model->email_address)
                    ->get(['skill_type.skill_type']);

        return view('resume.resume_detail', array('job_finder_model' => $job_finder_model, 'skill_type' => $skill_type, 'skill_list' => $skill_list))->withTitle('Profile');
    }
    public function get_edit_detail($id)
    {
        session()->forget('detail_resume_session');
        session()->put('detail_resume_session', 'edit');
        $job_finder_model = job_finder_model::where('finder_id', $id)->first();
        $skill_type = skill_type_model::pluck('skill_type', 'skill_id');

        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
                    ->where('jf_email_address', $job_finder_model->email_address)
                    ->get(['skill_type.skill_type']);

        return view('resume.resume_detail', array('job_finder_model' => $job_finder_model, 'skill_type' => $skill_type, 'skill_list' => $skill_list))->withTitle('Profile');
    }
    public function get_view_applicant($id)
    {
        session()->forget('detail_resume_session');
        session()->put('detail_resume_session', 'hire');

        $job_finder_model = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->join('master_status', 'job_match_search.status_id', '=', 'master_status.status_id')
        ->where('job_id', $id)
        ->get();
        
        return view('resume.resume_grid', array('job_finder_model' => $job_finder_model))->withTitle('Applicant List');
    }
    public function get_detail_applicant($id, $job_id)
    {
        $job_master_model = job_master_model::join('currency', 'job_master.currency_id', '=', 'currency.currency_id')
        ->where('job_id', $job_id)
        ->first();
        $job_finder_model = job_finder_model::where('finder_id', $id)
        ->get()
        ->first();
        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
        ->where('jf_email_address', $job_finder_model->email_address)
        ->get(['skill_type.skill_type']);
        $payment_type = payment_type::pluck('payment_type_name', 'payment_type_id');

        return view('job_agreement.detail_applicant', array('job_finder_model' => $job_finder_model, 'skill_list' => $skill_list, 'payment_type' => $payment_type, 'job_master_model' => $job_master_model))->withtitle('Applicant Profile');

    }
}
