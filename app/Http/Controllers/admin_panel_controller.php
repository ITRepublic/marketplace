<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\admin_login_model;

class admin_panel_controller extends Controller
{
    //
    public function create() 
    {
        return view('admin_index');
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
        $isAuthenticated = admin_login_model::where($credentials)->first();

        if($isAuthenticated) {
            session()->put([
                'user_id' => $isAuthenticated->admin_id,
                'user_name' => $isAuthenticated->username,
                'user_email' => $isAuthenticated->email_address,
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
    public function create_register() 
    {
        return view('admin_regis/create');
    }
    public function store_register(Request $request) 
    {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
    		'username'      => 'required|unique:master_admin,username',
            'password'      => 'required',
            'email_address'  => 'required'
    	];

    	$this->validate($request, $rules);

        // store to DB
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);
        $data['email_address'] = $request->email_address;

        admin_login_model::create($data);

        // redirect
        return redirect('/web_admin')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
