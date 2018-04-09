<?php

namespace App\Http\Controllers;

use App\job_finder_model;
use App\skill_type_model;
use App\skill_list_model;
use Illuminate\Http\Request;

class resume_controller extends Controller
{
    public function create()
    {
        $job_finder_model = job_finder_model::all();
        return view('resume.resume_grid', array('job_finder_model' => $job_finder_model))->withTitle('Job Finder List');
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
        $job_finder_model = job_finder_model::all();
        return view('resume.resume_grid', array('job_finder_model' => $job_finder_model))->withTitle('Job Finder List');
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
}
