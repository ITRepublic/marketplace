<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use App\SkillTypeModel;
use App\SkillListModel;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobFinderModel = JobFinderModel::where('EmailAddress', $emailid)->first();
        $SkillType = SkillTypeModel::pluck('SkillID', 'SkillID');
        return view('jfregis.profile', array('JobFinderModel' => $JobFinderModel, 'SkillType' => $SkillType))->withTitle('Profile');
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
    
            return redirect('jobFinder/create')->withSuccess('Thank you for registering. Your data has been saved.');
        }
    }
}
