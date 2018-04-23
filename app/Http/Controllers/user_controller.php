<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use App\job_create_model;
use App\job_finder_model;

class user_controller extends Controller
{
    public function verifyRegistration() {
        $email = $_GET['email'];
        $account_type = $_GET['account_type'];

        if($account_type == 'jc') {
            $user = job_create_model::where('email_address', $email)->first();
        }
        else {
            $user = job_finder_model::where('email_address', $email)->first();
        }
        
        if($user != null) {
            if($account_type == 'jc') {
                job_create_model::where('email_address', $email)->update(['status' => 'active']);
            }
            elseif($account_type == 'jf') {
                job_finder_model::where('email_address', $email)->update(['status' => 'active']);
            }
            
            $flag = 'success';
        }
        else {
            return redirect('/');
        }

        return view('verify_registration', compact('flag'));
    }

    public function getForgotPassword() {
    	return view('forgot_password')->withTitle('Forgot Password');
    }

    public function doForgotPassword(Request $request) {
       $this->validate($request, ['email' => 'required|email','account_type' => 'required']);
    
       if($request->account_type == 'jc') {
        $check = job_create_model::where('email_address', $request->email)->first();
       }
       elseif($request->account_type == 'jf') {
        $check = job_finder_model::where('email_address', $request->email)->first();
       }

       if($check == null) {
           return back()->withErrors("Your email is invalid. Make sure you entered the right email.");
        }
        else {
            $item = [
                'email' => $request->email,
                'account_type' => $request->account_type
            ];
    
            // send email to user
            Mail::to($item['email'])->send(new ResetPassword($item));
            return back()->withSuccess("Please check your email to get the forgot password request.");
        }
    }
    
    public function getResetPassword() {
        $email = $_GET['email'];
        $account_type = $_GET['account_type'];
        return view('reset_password',compact('email','account_type'));
    }

    public function doResetPassword(Request $request) {

        $email = $request->email;
        $account_type = $request->account_type;

        $this->validate($request, [
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password'
        ]);

        if($account_type == 'jc') {
            job_create_model::where('email_address', $request->email)->update(['password' => md5($request->new_password)]);
        }
        elseif($account_type == 'jf') {
            job_finder_model::where('email_address', $request->email)->update(['password' => md5($request->new_password)]);
        }

        return back()->withSuccess('Your password has been successfully changed.');

    }
}
