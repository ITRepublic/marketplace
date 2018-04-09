<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_create_model;

class job_creator_ctrl extends Controller
{
    public function create() 
    {
    	return view('jc_regis.create')->withTitle('Register Job Creator');
    }

    public function store(Request $request) 
    {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
    		'email_address'  => 'required|email|unique:job_creator,email_address',
            'password'      => 'required',
            'company_name'   => 'required',
            'company_address'=> 'required',
            'credit_card'    => 'required|numeric',
            'company_profile'=> 'required',
            'phone'         => 'required|numeric'
    	];

    	$this->validate($request, $rules);

        // store to DB
        $data['email_address'] = $request->email_address;
        $data['password'] = md5($request->password);
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['credit_card'] = $request->credit_card;
        $data['company_profile'] = $request->company_profile;
        $data['phone'] = $request->phone;
        $data['group_id'] = 'jc';

        job_create_model::create($data);

        // redirect
        return redirect('job_creator/create')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
