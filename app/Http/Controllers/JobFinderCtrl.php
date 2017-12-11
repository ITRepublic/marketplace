<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use Illuminate\Http\Request;

class JobFinderCtrl extends Controller
{
    public function create()
    {
        return view('jfregis.create')->withTitle('Register');
    }

    public function store(Request $request)
    {
        $rules = [
    		'UserName'      => 'required',
            'Password'      => 'required',
            'EmailAddress'  => 'required|email|unique:jobfinder,EmailAddress',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];

        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Password'] = md5($request->Password);
        $data['EmailAddress'] = $request->EmailAddress;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;
        $data['groupid'] = 'JF';

        $jf = JobFinderModel::create($data);

        return redirect('jobFinder/create')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
