<?php

namespace App\Http\Controllers;

use App\ProjectJobReqModel;
use App\SkillTypeModel;
use App\SkillListModel;
use App\JobCreateModel;
use App\JobTypeModel;

use Illuminate\Http\Request;

class JobRegistrationController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobCreateModel = JobCreateModel::where('EmailAddress', $emailid)->first();
        $JobType = JobTypeModel::pluck('JobTypeID', 'JobTypeDesc');
        $SkillType = SkillTypeModel::pluck('SkillID', 'SkillID');
        return view('project.jobmarketregis', array('JobCreateModel' => $JobCreateModel, 'JobType' => $JobType, 'SkillType' => $SkillType))->withTitle('Job Registration');
    }

    public function store(Request $request)
    {
        $data = $request->all(); // This will get all the request data.
        if($request->ajax())
        {
            return "True request!";
        }
        else
        {
            
            $rules = [
                'SkillList'      => 'required'
            ];
    
            $this->validate($request, $rules);
            //save db
            $data['IndexNo'] = $request->UserName;
            $data['SkillListID'] = $request->UserName;
            $data['JFEmailAddress'] = session()->get('user_email');
            $data['SkillID'] = $request->Address;
            $data['Phone'] = $request->Phone;
            $data['groupid'] = 'JF';
    
            $jf = JobFinderModel::create($data);
    
            return redirect('Profile/create')->withSuccess('Thank you for registering. Your data has been saved.');
        }
    }
}
