<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //
    public function create()
    {
        $JobFinderModel = JobFinderModel::all();
        return view('resume.resumegrid', array('JobFinderModel' => $JobFinderModel))->withTitle('Job Finder List');
    }
}
