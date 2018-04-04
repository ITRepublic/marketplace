<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use App\SkillTypeModel;
use App\SkillListModel;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function create()
    {
        $JobFinderModel = JobFinderModel::all();
        return view('resume.resumegrid', array('JobFinderModel' => $JobFinderModel))->withTitle('Job Finder List');
    }
    public function store(Request $request)
    { 
        $rules = [
    		'UserName'      => 'required',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];
        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;
        $jf = JobFinderModel::where('finderid',$request->FinderID)->update($data);
        return redirect('/resume/all')->withSuccess('Resume has been updated.');
    }
    public function all()
    {
        $JobFinderModel = JobFinderModel::all();
        return view('resume.resumegrid', array('JobFinderModel' => $JobFinderModel))->withTitle('Job Finder List');
    }
    public function getDetail($id)
    {
        session()->forget('detailresumesession');
        session()->put('detailresumesession', 'view');
        $JobFinderModel = JobFinderModel::where('finderid', $id)->first();
        $SkillType = SkillTypeModel::pluck('SkillType', 'SkillID');
        $SkillList = SkillListModel::join('skilltype','skilllist.SkillID', '=', 'skilltype.SkillID')
                    ->where('JFEmailAddress', $JobFinderModel->EmailAddress)
                    ->get(['skilltype.SkillType']);

        return view('resume.resumedetail', array('JobFinderModel' => $JobFinderModel, 'SkillType' => $SkillType, 'SkillList' => $SkillList))->withTitle('Profile');
    }
    public function getEditDetail($id)
    {
        session()->forget('detailresumesession');
        session()->put('detailresumesession', 'edit');
        $JobFinderModel = JobFinderModel::where('finderid', $id)->first();
        $SkillType = SkillTypeModel::pluck('SkillType', 'SkillID');

        $SkillList = SkillListModel::join('skilltype','skilllist.SkillID', '=', 'skilltype.SkillID')
                    ->where('JFEmailAddress', $JobFinderModel->EmailAddress)
                    ->get(['skilltype.SkillType']);

        return view('resume.resumedetail', array('JobFinderModel' => $JobFinderModel, 'SkillType' => $SkillType, 'SkillList' => $SkillList))->withTitle('Profile');
    }
}
