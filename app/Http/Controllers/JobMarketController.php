<?php

namespace App\Http\Controllers;

use App\JobMasterModel;
use App\ProjectJobReqModel;
use App\SkillTypeModel;
use App\SkillListModel;
use App\JobCreateModel;
use App\JobFinderModel;
use App\JobmatchModel;
use App\JobTypeModel;
use App\JobMatchTypeModel;
use App\JobSkillReqModel;
use App\JobMatchSearchModel;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JobMarketController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobFinderModel = JobFinderModel::where('EmailAddress', $emailid)->first();
        $JobMasterModel = JobMasterModel::join('currency','jobmaster.CurrencyID', '=', 'currency.CurrencyID')
        ->join('jobcreator','jobmaster.JCEmailAddress', '=', 'jobcreator.EmailAddress')
        ->join('masterdifficulty','jobmaster.Difficulty', '=', 'masterdifficulty.DiffID')
        ->where('jobmaster.JobStatus', '1')
        ->get();

        return view('project.jobmarket', array('JobMasterModel' => $JobMasterModel, 'JobFinderModel' => $JobFinderModel))->withTitle('Job Marketplace');
    }

    public function store(Request $request)
    {
        $data['JobID'] = $request->JobID;
        $data['JFEmailAddress'] = session()->get('user_email');
        $data['StatusID'] = '4';
        $jm = JobMatchSearchModel::create($data);

        $JobMasterModel = JobMasterModel::where('JobID', $data['JobID'])
        ->first();
        $dataupdate['HasSeenID'] = $JobMasterModel->HasSeenID + 1;

        $jmupdate = JobMasterModel::where('JobID', $data['JobID'])->update($dataupdate);
        return redirect()->to('/projects')->withSuccess('Job Apply is done.');
    }
    public function getDetail($id)
    {
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

        return view('project.jobmarketdetail', array('JobMasterModel' => $JobMasterModel, 'JobMatchTypeModel' => $JobMatchTypeModel, 'SkillList' => $SkillList))->withTitle($JobMasterModel->JobTitle);

    }
}
