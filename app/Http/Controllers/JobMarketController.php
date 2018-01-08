<?php

namespace App\Http\Controllers;

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
        $SkillType = SkillTypeModel::pluck('SkillID', 'SkillID');
        return view('project.jobmarket')->withTitle('Job Marketplace');
    }

    public function store(Request $request)
    {
        $data = $request->all(); // This will get all the request data.
        
    }
}
