<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use App\SkillTypeModel;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobFinderModel = JobFinderModel::where('EmailAddress', $emailid)->first();
        $SkillType = SkillTypeModel::pluck('SkillID', 'SkillID');
        return view('jfregis.profile', array('JobFinderModel' => $JobFinderModel, 'SkillType' => $SkillType))->withTitle('Profile');
    }
    public function store(Request $request)
    {
        $rules = [
    		'UserName'      => 'required',
            'Password'      => 'required',
            'EmailAddress'  => 'required|email|unique:jobfinder,EmailAddress',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];

        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Password'] = md5($request->Password);
        $data['EmailAddress'] = $request->EmailAddress;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;
        $data['groupid'] = 'JF';

        $jf = JobFinderModel::create($data);

        return redirect('jobFinder/create')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
