<?php

namespace App\Http\Controllers;

use App\JobMasterModel;
use App\SkillTypeModel;
use App\SkillListModel;
use App\JobCreateModel;
use App\JobTypeModel;
use App\JobMatchTypeModel;
use App\JobSkillReqModel;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JobRegistrationController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobCreateModel = JobCreateModel::where('EmailAddress', $emailid)->first();
        return view('project.jobmarketregis', array('JobCreateModel' => $JobCreateModel))->withTitle('Job Registration');
    }
    
    public function storestep1(Request $request)
    {
        $rules = [
            'JobTitle'      => 'required',
            'EmailAddress'  => 'required',
            'Description'   => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        
        $data['JobTitle'] = $request->JobTitle;
        $data['JCEmailAddress'] = $request->EmailAddress;
        $data['Description'] = $request->Description;
        $data['Difficulty'] = '';
        $data['HasSeenID'] = '';
        $data['PriceList'] = '';
        $PrefixID = 'JBR';
        $GeneratedID = "";
        $num_liscence_exist=true;
        while($num_liscence_exist){
           $GeneratedID=uniqid(Carbon::now()->toDateString());
           $ResultID = $PrefixID . '-' . $GeneratedID;
           if (!JobMasterModel::where('JobID', '=',"'".$ResultID."'")->exists()) {
                $data['JobID'] = $ResultID;
                $jm = JobMasterModel::create($data);
                $num_liscence_exist=false;
                session()->forget('JobID');
                session()->put('JobID', $ResultID);
           }
        }
        
        return redirect('jobmarketregis/createstep2')->withSuccess('Next to second step.');
    }
    
    public function createstep2()
    {
        $JobID = session()->get('JobID');
        $JobMasterModel = JobMasterModel::where('JobID', $JobID)->first();
        $JobType = JobTypeModel::pluck('JobTypeDesc', 'JobTypeID');
        return view('project.secondjobmarketregis', array('JobMasterModel' => $JobMasterModel, 'JobType' => $JobType))->withTitle('Job Registration');
    }
    public function addJobType(Request $request)
    {
        $JobTypeID = $request->JobTypeID;
        $JobID = $request->JobID;

        $JobTypeListModel = JobMatchTypeModel::where('JobID', $JobID)->where('JobTypeID', $JobTypeID)->first();
        
        if(count($JobTypeListModel) == 0) {
            $data['JobID'] = $JobID;
            $data['JobTypeID'] = $JobTypeID;
            $JobMatchTypeModel = JobMatchTypeModel::create($data);

            return response()->json(array(
                'data' => $JobMatchTypeModel,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this job type. Please choose another.'
            ));
        }
    }
    public function storestep2(Request $request)
    {
        $rules = [
    		'JobTitle'      => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        $data['JobTitle'] = $request->JobTitle;
        $data['EmailAddress'] = $request->EmailAddress;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;
        $data['groupid'] = 'JF';

        $jf = JobFinderModel::create($data);
        return redirect('jobmarketregis/createstep3')->withSuccess('Next to second step.');
    }
    public function createstep3()
    {
        $emailid = session()->get('user_email');
        $JobMasterModel = JobMasterModel::where('EmailAddress', $emailid)->first();
        $SkillType = SkillTypeModel::pluck('SkillID', 'SkillID');
        return view('project.thirdjobmarketregis', array('JobMasterModel' => $JobMasterModel, 'SkillType' => $SkillType))->withTitle('Job Registration');
    }
    public function addSkill(Request $request)
    {
        $skillName = $request->skill;
        $email = $request->email;
        $skillType = SkillTypeModel::where('SkillID', $skillName)->first();

        $skillListModel = SkillListModel::where('SkillID',$skillType->IndexNo)->first();

        $data['SkillListID'] = $skillType->IndexNo;
        $data['JFEmailAddress'] = $email;
        $data['SkillID'] =  $skillType->IndexNo;
        
        if(count($skillListModel) == 0) {
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
    public function storestep3(Request $request)
    {
        $rules = [
    		'JobTitle'      => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        $data['JobTitle'] = $request->JobTitle;
        $data['EmailAddress'] = $request->EmailAddress;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;
        $data['groupid'] = 'JF';

        $jf = JobFinderModel::create($data);
        return redirect('/jobregistration')->withSuccess('Next to second step.');
    }
}
