<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
