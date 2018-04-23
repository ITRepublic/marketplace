<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyRegistration;
use App\job_create_model;

class job_creator_controller extends Controller
{
    public function create() 
    {
    	return view('jc_regis.create')->withTitle('Register Job Creator');
    }

    public function store(Request $request) 
    {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
            'company_name'   => 'required',
            'company_address'=> 'required',
            'company_profile'=> 'required',
            'phone'         => 'required|numeric',
            'email_address'  => 'required|email|unique:job_creator,email_address',
            'password'      => 'required|min:6',
            'password_confirmation' => 'required|same:password'
    	];

    	$this->validate($request, $rules);

        // store to DB
        $data['email_address'] = $request->email_address;
        $data['password'] = md5($request->password);
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_profile'] = $request->company_profile;
        $data['phone'] = $request->phone;
        $data['group_id'] = 'jc';

        job_create_model::create($data);

        $item = [
            'email' => $request->email_address,
            'name' => $request->company_name,
            'account_type' => 'jc'
        ];

    	// send email to user
        Mail::to($item['email'])->send(new VerifyRegistration($item));

        // redirect
        return redirect('job_creator/create')->withSuccess("Thank you for registering. Account verification's link has been sent to your email.");
    }
}
