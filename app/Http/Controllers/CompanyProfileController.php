<?php

namespace App\Http\Controllers;

use App\JobCreateModel;
use App\JobMatchTypeModel;
use App\JobTypeModel;

use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    //
    public function create()
    {
        $emailid = session()->get('user_email');
        $JobCreateModel = JobCreateModel::where('EmailAddress', $emailid)->first();
        $JobTypeUsed = JobMatchTypeModel::join('jobtype','jobmatchtype.JobTypeID', '=', 'jobtype.JobTypeID')
        ->join('jobmaster', 'jobmatchtype.JobID', '=', 'jobmaster.JobID')
        ->distinct()
        ->where('jobmaster.JCEmailAddress', $emailid)
        ->get();
        return view('jcregis.companyprofile', array('JobCreateModel' => $JobCreateModel, 'JobTypeUsed' => $JobTypeUsed))->withTitle('Company Profile');
    }
}
