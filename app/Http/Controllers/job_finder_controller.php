<?php

namespace App\Http\Controllers;

use App\job_finder_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyRegistration;

class job_finder_controller extends Controller
{
    public function create()
    {
        return view('jf_regis.create')->withTitle('Register');
    }

    public function store(Request $request)
    {
        $rules = [
    		'name'      => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric',
            'email_address'  => 'required|email|unique:job_finder,email_address',
            'password'      => 'required|min:6',
            'password_confirmation' => 'required|same:password'
    	];

        $this->validate($request, $rules);
        //save db
        $data['username'] = $request->name;
        $data['password'] = md5($request->password);
        $data['email_address'] = $request->email_address;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['group_id'] = 'jf';
        $data['total_rating'] = '0';

        $jf = job_finder_model::create($data);

        $item = [
            'email' => $request->email_address,
            'name' => $request->name,
            'account_type' => 'jf'
        ];

    	// send email to user
        Mail::to($item['email'])->send(new VerifyRegistration($item));

        return redirect('job_finder/create')->withSuccess("Thank you for registering. Account verification's link has been sent to your email.");
    }
}
