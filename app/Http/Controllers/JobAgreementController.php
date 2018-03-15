<?php

namespace App\Http\Controllers;

use App\JobMasterModel;
use App\SkillTypeModel;
use App\SkillListModel;
use App\JobCreateModel;
use App\JobTypeModel;
use App\JobMatchTypeModel;
use App\JobSkillReqModel;
use App\JobAgreementModel;
use App\JobMatchSearchModel;
use App\JobFinderModel;
use App\MasterStatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;

class JobAgreementController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobMatchSearchModel = JobMatchSearchModel::join('jobmaster','jobmatchsearch.JobID', '=', 'jobmaster.JobID')
        ->join('masterstatus', 'jobmaster.JobStatus', '=', 'masterstatus.StatusID')
        ->join('masterdifficulty', 'jobmaster.Difficulty', '=', 'masterdifficulty.DiffID')
        ->where('jobmaster.JCEmailAddress', $emailid)
        ->get();
        return view('jobagreement.jobagreement', array('JobMatchSearchModel' => $JobMatchSearchModel))->withTitle('Job Agreement List');
    }
    public function getDetail($id)
    {
        session()->forget('JobID');
        session()->put('JobID', $id);
        $JobMasterModel = JobMasterModel::join('masterstatus','jobmaster.JobStatus', '=', 'masterstatus.StatusID')
        ->join('currency', 'jobmaster.CurrencyID', '=', 'currency.CurrencyID')
        ->join('jobcreator', 'jobmaster.JCEmailAddress', '=', 'jobcreator.EmailAddress')
        ->where('JobID', $id)
        ->first();

        $JobMatchTypeModel = JobMatchTypeModel::join('jobtype','jobmatchtype.JobTypeID', '=', 'jobtype.JobTypeID')
        ->where('JobID', $JobMasterModel->JobID)
        ->get(['jobtype.JobTypeDesc']);

        $SkillList = JobSkillReqModel::join('skilltype','jobmatchskill.SkillID', '=', 'skilltype.SkillID')
        ->where('JobID', $JobMasterModel->JobID)
        ->get(['skilltype.SkillType']);

        $JobApplicantModel = JobMatchSearchModel::join('jobfinder','jobmatchsearch.JFEmailAddress', '=', 'jobfinder.EmailAddress')
        ->join('masterstatus', 'jobmatchsearch.StatusID', '=', 'masterstatus.StatusID')
        ->where('JobID', $id)
        ->get();

        $JobMatchSearchApplicant = JobMatchSearchModel::join('jobfinder','jobmatchsearch.JFEmailAddress', '=', 'jobfinder.EmailAddress')
        ->where([
            ['StatusID', '=', '5'],
            ['JobID', '=', $id]
            ])
        ->get();
        
        $JobStatus = MasterStatus::whereIn('StatusID', array(1, 2, 3, 6))
        ->pluck('StatusName', 'StatusID');
        

        return view('jobagreement.applicant', array('JobMasterModel' => $JobMasterModel, 'JobApplicantModel' => $JobApplicantModel, 'JobMatchTypeModel' => $JobMatchTypeModel, 'SkillList' => $SkillList, 'JobMatchSearchApplicant' => $JobMatchSearchApplicant, 'JobStatus' => $JobStatus))->withTitle($JobMasterModel->JobTitle);

    }
    public function getDetailApplicant($id)
    {
        $JobID = session()->get('JobID');
        $JobFinderModel = JobFinderModel::where('finderid', $id)
        ->get()
        ->first();

        $SkillList = SkillListModel::join('skilltype','skilllist.SkillID', '=', 'skilltype.SkillID')
        ->where('JFEmailAddress', $JobFinderModel->EmailAddress)
        ->get(['skilltype.SkillType']);

        return view('jobagreement.detailapplicant', array('JobFinderModel' => $JobFinderModel, 'SkillList' => $SkillList))->withTitle('Applicant Profile');

    }
    public function storeapplicant(Request $request)
    {
        $JobID = session()->get('JobID');
        $EmailAddress = $request->EmailAddress;
        $JobMatchSearch = JobMatchSearchModel::where([
            ['JobID', '=', $JobID],
            ['JFEmailAddress', '=',$EmailAddress]
            ])->first();

        $data['StatusID'] = '4';
        if ($JobMatchSearch->StatusID == 4){
            $data['StatusID'] = '5';
        }

        $jmupdate = JobMatchSearchModel::where([
            ['JobID', '=', $JobID],
            ['JFEmailAddress', '=',$EmailAddress]
            ])->update($data);
        
        return redirect()->route('detailJobAgreement', ['id' => $JobID]);
        return redirect()->back();
    }
    public function storestatus(Request $request)
    {
        $JobID = session()->get('JobID');
        $rules = [
            'JobStatus'      => 'required'
        ];
        $this->validate($request, $rules);
        //save db
        $data['JobStatus'] = $request->JobStatus;
    
        $jmupdate = JobMasterModel::where('JobID', $JobID)->update($data);
        session()->forget('Result');
        return redirect()->to('/projects')->withSuccess('Job Status Update is done.');
    }
    
}
