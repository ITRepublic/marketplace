<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobCreateModel;

class JobCreatorCtrl extends Controller
{
    public function create() 
    {
    	return view('jcregis.create')->withTitle('Register Job Creator');
    }

    public function store(Request $request) 
    {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
    		'EmailAddress'  => 'required|email|unique:jobcreator,EmailAddress',
            'Password'      => 'required',
            'CompanyName'   => 'required',
            'CompanyAddress'=> 'required',
            'CreditCard'    => 'required|numeric',
            'CompanyProfile'=> 'required',
            'Phone'         => 'required|numeric'
    	];

    	$this->validate($request, $rules);

        // store to DB
        $data['EmailAddress'] = $request->EmailAddress;
        $data['Password'] = md5($request->Password);
        $data['CompanyName'] = $request->CompanyName;
        $data['CompanyAddress'] = $request->CompanyAddress;
        $data['CreditCard'] = $request->CreditCard;
        $data['CompanyProfile'] = $request->CompanyProfile;
        $data['Phone'] = $request->Phone;
        $data['groupid'] = 'JC';

        JobCreateModel::create($data);

        // redirect
        return redirect('jobCreator/create')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
