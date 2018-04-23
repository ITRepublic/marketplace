<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job_create_model;
use App\job_finder_model;

class auth_controller extends Controller
{
    public function create() 
    {
        return view('login');
    }

    public function store(Request $request)
    {
    	$rules = [
    		'login_as' => 'required',
    		'email' => 'required|email',
    		'password' => 'required'
    	];

    	$this->validate($request,$rules);

        $credentials = [
            'email_address' => $request->email,
            'password' => md5($request->password),
            'status' => 'active'
        ];

    	if($request->login_as == 'job_creator') {
    		$isAuthenticated = job_create_model::where($credentials)->first();

            if($isAuthenticated) {
                session()->put([
                    'user_id' => $isAuthenticated->company_id,
                    'user_name' => $isAuthenticated->company_name,
                    'user_email' => $isAuthenticated->email_address,
                    'group_check' => $isAuthenticated->group_id
                ]);
            }
        }
    	else if($request->login_as == 'job_finder') {
    		$isAuthenticated = job_finder_model::where($credentials)->first();
            
            if($isAuthenticated) {
                session()->put([
                    'user_id' => $isAuthenticated->finder_id,
                    'user_name' => $isAuthenticated->username,
                    'user_email' => $isAuthenticated->email_address,
                    'group_check' => $isAuthenticated->group_id
                ]);
                
            }
        }

    	if($isAuthenticated) {
    		return redirect()->to('/');
    	}
    	else {
    		return back()->withErrors('Your email & password did not match. Please try again!');
    	}
    }

    public function destroy()
    {
        $group = "";
        if(session("group_check") == "admin") {
            $group = "admin";
        }
        else {
            $group = "user";
        }

        session()->flush();

        if($group != 'admin') {
            return redirect()->to('/');
        }
        else {
            return redirect()->to('/web_admin')->withSuccess('You have been logged out.');
        }
    }
}
