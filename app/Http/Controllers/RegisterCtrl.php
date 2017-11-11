<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobCreateModel;
use Hash;

class RegisterCtrl extends Controller
{
    public function create() {
    	return view('register')->withTitle('Register');
    }

    public function store(Request $request) {

    	// Validate, if fails automatically return redirect back and show error messages
    	$rules = [
    		'EmailAddress'  => 'required|email',
            'Password'      => 'required',
            'CompanyName'   => 'required',
            'CompanyAddress'=> 'required',
            'CreditCard'    => 'required|numeric',
            'CompanyProfile'=> 'required',
            'Phone'         => 'required|numeric'
    	];

    	$this->validate($request, $rules);

        /* 
        	Store to DB
         	kalo ini konsepnya OOP, tidak perlu declare protected $fillable = []; di model
         	less security
        */

        // $JobCreateModel = new JobCreateModel;
        // $JobCreateModel->CompanyID      = null;
        // $JobCreateModel->EmailAddress   = $request->EmailAddress;
        // $JobCreateModel->Password       = Hash::make($request->Password);
        // $JobCreateModel->CompanyName    = $request->CompanyName;
        // $JobCreateModel->CompanyAddress = $request->CompanyAddress;
        // $JobCreateModel->CreditCard     = $request->CreditCard;
        // $JobCreateModel->CompanyProfile = $request->CompanyProfile;
        // $JobCreateModel->Phone          = $request->Phone;
        // $JobCreateModel->save();

        /* 
        	Bisa juga gini
        	tapi kalo pake yg ini, harus declare protected $fillable = []; di model nya baru bisa masuk ke DB 
        	lebih secure karena cuma data yg di declare di $fillable aja yang bisa masuk ke DB
        */

        $data['EmailAddress'] = $request->EmailAddress;
        $data['Password'] = Hash::make($request->Password);
        $data['CompanyName'] = $request->CompanyName;
        $data['CompanyAddress'] = $request->CompanyAddress;
        $data['CreditCard'] = $request->CreditCard;
        $data['CompanyProfile'] = $request->CompanyProfile;
        $data['Phone'] = $request->Phone;

        JobCreateModel::create($data);

        // redirect
        return redirect('register')->withSuccess('Thank you for registering. Your data has been saved.');
    }
}
