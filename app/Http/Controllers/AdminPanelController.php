<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AdminLoginModel;

class AdminPanelController extends Controller
{
    //
    public function create() 
    {
        return view('adminindex');
    }
    public function store(Request $request)
    {
    	$rules = [
    		'username' => 'required',
    		'password' => 'required'
    	];

    	$this->validate($request,$rules);

        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password)
        ];
        $isAuthenticated = AdminLoginModel::where($credentials)->first();

        if($isAuthenticated) {
            session()->put([
                'user_id' => $isAuthenticated->adminid,
                'user_name' => $isAuthenticated->username,
                'user_email' => $isAuthenticated->emailaddress,
                'group_check' => 'admin'
            ]);
        }

    	if($isAuthenticated) {
    		return redirect()->to('/projects');
    	}
    	else {
    		return back()->withErrors('Your username & password did not match. Please try again!');
    	}
    }
    public function createregister() 
    {
        return view('adminregis/create');
    }
    public function storeregister(Request $request) 
    {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
    		'username'      => 'required|unique:masteradmin,username',
            'password'      => 'required',
            'emailaddress'  => 'required'
    	];

    	$this->validate($request, $rules);

        // store to DB
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);
        $data['email_address'] = $request->emailaddress;

        AdminLoginModel::create($data);

        // redirect
        return redirect('/webadmin')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
