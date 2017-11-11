<?php

namespace App\Http\Controllers;

use App\JobCreateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use View;

class JobCreateModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('JCRegis.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('JCRegis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'EmailAddress'  => 'required|email',
            'Password'      => 'required',
            'CompanyName'   => 'required',
            'CompanyAddress'=> 'required',
            'CreditCard'    => 'required|numeric',
            'CompanyProfile'=> 'required',
            'Phone'         => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('JCRegis/create')
                ->withErrors($validator)
                ->withInput(Input::except('Password'));
        } else {
            // store
            $JobCreateModel = new JobCreateModel;
            $JobCreateModel->CompanyID      = null;
            $JobCreateModel->EmailAddress   = Input::get('EmailAddress');
            $JobCreateModel->Password       = Input::get('Password');
            $JobCreateModel->CompanyName    = Input::get('CompanyName');
            $JobCreateModel->CompanyAddress = Input::get('CompanyAddress');
            $JobCreateModel->CreditCard     = Input::get('CreditCard');
            $JobCreateModel->CompanyProfile = Input::get('CompanyProfile');
            $JobCreateModel->Phone          = Input::get('Phone');
            $JobCreateModel->save();

            // redirect
            return Redirect::to('JCRegis');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobCreateModel  $jobCreateModel
     * @return \Illuminate\Http\Response
     */
    public function show(JobCreateModel $jobCreateModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobCreateModel  $jobCreateModel
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCreateModel $jobCreateModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobCreateModel  $jobCreateModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCreateModel $jobCreateModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobCreateModel  $jobCreateModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCreateModel $jobCreateModel)
    {
        //
    }
}
