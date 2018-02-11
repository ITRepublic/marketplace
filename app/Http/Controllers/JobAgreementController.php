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

class JobAgreementController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobAgreementModel = JobAgreementModel::join('jobmatchsearch','jobagreement.JobMatchID', '=', 'jobmatchsearch.JobMatchID')
        ->join('jobmaster', 'jobmatchsearch.JobID', '=', 'jobmaster.JobID')
        ->where('jobmaster.JCEmailAddress', $emailid)
        ->get();
        return view('jobagreement.jobagreement', array('JobAgreementModel' => $JobAgreementModel))->withTitle('Job Agreement List');
    }
}
