<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use App\SkillTypeModel;
use App\SkillListModel;
use Validator;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobFinderModel = JobFinderModel::where('EmailAddress', $emailid)->first();
        $SkillType = SkillTypeModel::pluck('SkillType', 'SkillID');

        $SkillList = SkillListModel::join('skilltype','skilllist.SkillID', '=', 'skilltype.SkillID')
                    ->where('JFEmailAddress', $emailid)
                    ->get(['skilltype.SkillType']);

        return view('jfregis.profile', array('JobFinderModel' => $JobFinderModel, 'SkillType' => $SkillType, 'SkillList' => $SkillList))->withTitle('Profile');
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

    public function addSkill(Request $request)
    {
        $skillName = $request->skill;
        $email = $request->email;
        $skillType = SkillTypeModel::where('SkillID', $skillName)->first();

        $skillListModel = SkillListModel::where('SkillID',$skillType->SkillID)->where('JFEMailAddress',$email)->first();

        $data['JFEmailAddress'] = $email;
        $data['SkillID'] =  $skillType->SkillID;
        
        if($skillListModel == null) {
            $skillList = SkillListModel::create($data);
            return response()->json(array(
                'data' => $skillList,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this skill. Please choose another.'
            ));
        }
    }
}
