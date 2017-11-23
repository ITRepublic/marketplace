<?php

namespace App\Http\Controllers;

use App\LoginJCModel;
use Illuminate\Http\Request;
use Hash;
use Session;

class LoginJCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('LoginJC')->withTitle('Login Job Creator');
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
        $rules = [
    		'EmailAddress'  => 'required',
            'Password'      => 'required'
    	];

        $this->validate($request, $rules);
        //save db
        // $data['EmailAddress'] = $request->UserName;
        // $data['Password']     = Hash::make($request->Password);
        $matchCondition = ['EmailAddress' => $request->UserName, 'Password' => Hash::make($request->Password)];
        $user = LoginJCModel::where($matchCondition)->first();
        // Session::put('EmailAddress', $user->EmailAddress);
        return redirect('/projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoginJCModel  $loginJCModel
     * @return \Illuminate\Http\Response
     */
    public function show(LoginJCModel $loginJCModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LoginJCModel  $loginJCModel
     * @return \Illuminate\Http\Response
     */
    public function edit(LoginJCModel $loginJCModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoginJCModel  $loginJCModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoginJCModel $loginJCModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoginJCModel  $loginJCModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoginJCModel $loginJCModel)
    {
        //
    }
}
