<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobCreateModel;
use App\JobFinderModel;

class AuthCtrl extends Controller
{
    public function create() 
    {
        return view('index');
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
            'EmailAddress' => $request->email,
            'Password' => md5($request->password)
        ];

    	if($request->login_as == 'job_creator') {
    		$isAuthenticated = JobCreateModel::where($credentials)->first();

            if($isAuthenticated) {
                session()->put([
                    'user_id' => $isAuthenticated->CompanyID,
                    'user_name' => $isAuthenticated->CompanyName,
                    'user_email' => $isAuthenticated->EmailAddress,
                    'group_check' => $isAuthenticated->groupid
                ]);
            }
        }
    	else if($request->login_as == 'job_finder') {
    		$isAuthenticated = JobFinderModel::where($credentials)->first();
            
            if($isAuthenticated) {
                session()->put([
                    'user_id' => $isAuthenticated->finderid,
                    'user_name' => $isAuthenticated->UserName,
                    'user_email' => $isAuthenticated->EmailAddress,
                    'group_check' => $isAuthenticated->groupid
                ]);
                
            }
        }

    	if($isAuthenticated) {
    		return redirect()->to('/projects');
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
            return redirect()->to('/')->withSuccess('You have been logged out.');
        }
        else {
            return redirect()->to('/webadmin')->withSuccess('You have been logged out.');
        }
    }
}
