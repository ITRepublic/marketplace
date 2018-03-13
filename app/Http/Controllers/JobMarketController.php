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
        ->get();
        return view('project.jobmarket', array('JobMasterModel' => $JobMasterModel, 'JobFinderModel' => $JobFinderModel))->withTitle('Job Marketplace');
    }

    public function store(Request $request)
    {
        $data = $request->all(); // This will get all the request data.
        
    }
}
