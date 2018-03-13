<?php

namespace App\Http\Controllers;

use App\JobMasterModel;
use App\SkillTypeModel;
use App\SkillListModel;
use App\JobCreateModel;
use App\JobTypeModel;
use App\JobMatchTypeModel;
use App\JobSkillReqModel;
use App\MasterDifficulty;
use App\MasterStatus;
use App\MasterCurrency;

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
            'Description'   => 'required',
            'ExpiredDate'   => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        
        $data['JobTitle'] = $request->JobTitle;
        $data['JCEmailAddress'] = $request->EmailAddress;
        $data['Description'] = $request->Description;
        $data['ExpiredDate'] = $request->ExpiredDate;
        $data['Difficulty'] = '';
        $data['CurrencyID'] = '0';
        $data['HasSeenID'] = '';
        $data['PriceList'] = '';
        $num_liscence_exist=true;
        while($num_liscence_exist){

           if (!JobMasterModel::where([
            ['JobTitle', '=', $data['JobTitle']],
            ['JCEmailAddress', '=', $data['JCEmailAddress']],
            ['Description', '=', $data['Description']]
            ])->exists()) {
                $Result = $data['JobTitle'] . '+' . $data['JCEmailAddress'] . '+' . $data['Description'];
                $num_liscence_exist=false;
                $jm = JobMasterModel::create($data);
                session()->forget('Result');
                session()->put('Result', $Result);
           }else
           {
               //Nih Jor yang buat nampilin error
           }
        }
        
        return redirect('jobmarketregis/createstep2')->withSuccess('Next to second step.');
    }
    
    public function createstep2()
    {
        $Result = session()->get('Result');
        $splitJobString = explode('+', $Result, 3);
        $JobTitle = $splitJobString[0];
        $JCEmailAddress = $splitJobString[1];
        $Description = $splitJobString[2];
        $JobMasterModel = JobMasterModel::where([
            ['JobTitle', '=', $JobTitle],
            ['JCEmailAddress', '=', $JCEmailAddress],
            ['Description', '=', $Description]
            ])->first();
        $JobType = JobTypeModel::pluck('JobTypeDesc', 'JobTypeID');
        $Difficulty = MasterDifficulty::pluck('DiffName', 'DiffID');
        $JobMatchTypeModel = JobMatchTypeModel::join('jobtype','jobmatchtype.JobTypeID', '=', 'jobtype.JobTypeID')
        ->where('JobID', $JobMasterModel->JobID)
        ->get(['jobtype.JobTypeDesc']);

        return view('project.secondjobmarketregis', array('Difficulty' => $Difficulty, 'JobMasterModel' => $JobMasterModel, 'JobType' => $JobType, 'JobMatchTypeModel' => $JobMatchTypeModel))->withTitle('Job Registration');
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
            'Difficulty'      => 'required'
    	];
        $this->validate($request, $rules);

        $data['Difficulty'] = $request->Difficulty;

        $Result = session()->get('Result');
        $splitJobString = explode('+', $Result, 3);
        $JobTitle = $splitJobString[0];
        $JCEmailAddress = $splitJobString[1];
        $Description = $splitJobString[2];
        $JobMasterModel = JobMasterModel::where([
            ['JobTitle', '=', $JobTitle],
            ['JCEmailAddress', '=', $JCEmailAddress],
            ['Description', '=', $Description]
            ])->first();
        $jmupdate = JobMasterModel::where('JobID', $JobMasterModel->JobID)->update($data);
        return redirect('jobmarketregis/createstep3')->withSuccess('Next to second step.');
    }
    public function createstep3()
    {
        $Result = session()->get('Result');
        $splitJobString = explode('+', $Result, 3);
        $JobTitle = $splitJobString[0];
        $JCEmailAddress = $splitJobString[1];
        $Description = $splitJobString[2];
        $JobMasterModel = JobMasterModel::where([
            ['JobTitle', '=', $JobTitle],
            ['JCEmailAddress', '=', $JCEmailAddress],
            ['Description', '=', $Description]
            ])->first();

        $JobMatchTypeModel = JobMatchTypeModel::join('jobtype','jobmatchtype.JobTypeID', '=', 'jobtype.JobTypeID')
        ->where('JobID', $JobMasterModel->JobID)
        ->get(['jobtype.JobTypeDesc']);

        $SkillList = JobSkillReqModel::join('skilltype','jobmatchskill.SkillID', '=', 'skilltype.SkillID')
        ->where('JobID', $JobMasterModel->JobID)
        ->get(['skilltype.SkillType']);
        $SkillType = SkillTypeModel::pluck('SkillType', 'SkillID');
        $JobStatus = MasterStatus::pluck('StatusName', 'StatusID');
        $Currency = MasterCurrency::pluck('CurrencyName', 'CurrencyID');
        return view('project.thirdjobmarketregis', array('JobMasterModel' => $JobMasterModel, 'JobMatchTypeModel' => $JobMatchTypeModel, 'SkillType' => $SkillType, 'SkillList' => $SkillList, 'JobStatus' => $JobStatus, 'Currency' => $Currency))->withTitle('Job Registration');
    }
    public function addSkill(Request $request)
    {
        $SkillTypeID = $request->SkillTypeID;
        $JobID = $request->JobID;

        $skillListModel = JobSkillReqModel::where('JobID', $JobID)->where('SkillID', $SkillTypeID)->first();
        
        if(count($skillListModel) == 0) {
            $data['JobID'] = $JobID;
            $data['SkillID'] = $SkillTypeID;
            $SkillList = JobSkillReqModel::create($data);

            return response()->json(array(
                'data' => $SkillList,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this job skill req. Please choose another.'
            ));
        }
    }
    public function storestep3(Request $request)
    {
        $rules = [
            'JobStatus'      => 'required',
            'Currency'       => 'required',
            'JobPrice'       => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        $data['JobStatus'] = $request->JobStatus;
        $data['CurrencyID'] = $request->Currency;
        $data['PriceList'] = $request->JobPrice;

        $Result = session()->get('Result');
        $splitJobString = explode('+', $Result, 3);
        $JobTitle = $splitJobString[0];
        $JCEmailAddress = $splitJobString[1];
        $Description = $splitJobString[2];
        $JobMasterModel = JobMasterModel::where([
            ['JobTitle', '=', $JobTitle],
            ['JCEmailAddress', '=', $JCEmailAddress],
            ['Description', '=', $Description]
            ])->first();
        $jmupdate = JobMasterModel::where('JobID', $JobMasterModel->JobID)->update($data);
        session()->forget('Result');
        return redirect()->to('/projects')->withSuccess('Job Registration is done.');
    }
}
