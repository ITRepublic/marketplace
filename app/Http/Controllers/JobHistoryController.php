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

use Illuminate\Http\Request;

class JobHistoryController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobHistoryModel = JobAgreementModel::join('jobmatchsearch','jobagreement.JobMatchID', '=', 'jobmatchsearch.JobMatchID')
        ->join('jobmaster', 'jobmatchsearch.JobID', '=', 'jobmaster.JobID')
        ->where('jobmatchsearch.JFEmailAddress', $emailid)
        ->get();
        return view('jobagreement.jobhistory', array('JobHistoryModel' => $JobHistoryModel))->withTitle('Job Agreement List');
    }
}
