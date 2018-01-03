<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use App\SkillTypeModel;

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
        $rules = [
    		'UserName'      => 'required',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];

        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;

        $jf = JobFinderModel::where('EmailAddress',session()->get('user_email'))->update($data);

        return redirect('/profile')->withSuccess('Profile has been updated.');
    }
}
