<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use Illuminate\Http\Request;
use Hash;

class JobFinderCtrl extends Controller
{
    public function __construct(Request $request)
    {
       $credentials = ['email' => $request->email, 'password' => $request->password];
       $rules = ['email' => 'required', 'password' => 'required'];

       $this->validate($request,$rules);

       if(Auth::attempt($credentials)) {
           // success login

           //store to session
           session()->put([
               'user_id' => Auth::user()->id,
               'user_name' => Auth::user()->name
           ]); 

           //get session
           $user_id = session()->get('user_id');

           // DB Transaction
           // save ke multiple DB jadi dia ngecek dlu kalo udah berhasil smua baru di commit

           DB::beginTransaction();
           try {
               // query ke table
           }
           catch(\Exception $e) {
               // kalo gagal
               DB::rollback();
               throw $e;
               // return back()->withErrors('Ada masalah pada server.');
           }
           //if success
           DB::commit();
           return redirect()->withSuccess();
       }
       else {
           return back()->withErrors();
       }
    }

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
        return view('JFRegis/create')->withTitle('Register');
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
    		'UserName'      => 'required',
            'Password'      => 'required',
            'Email'         => 'required|email',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];

        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Password'] = Hash::make($request->Password);
        $data['Email'] = $request->Email;
        $data['Address'] = $request->Address;
        $data['Phone'] = $request->Phone;

        $jf = JobFinderModel::create($data);

        // $i['jf_id'] = $jf->id;
        // $i['jf_item'] = $request->item;
        // JobFinderDetail::create($i);

        // JobFinderModel::where('id',$jf->id)->update($i);
        // // delete lgsg hapus data dr table
        // // soft delete tdk hapus data dr table tapi ada kolom baru deleted_at, jadi datanya ga ilang (pas u tarik data, dia ga bakal muncul)
        // JobFinderModel::where('id',$jf->id)->delete();

        // redirect
        return redirect('registerjobfinder/create')->withSuccess('Thank you for registering. Your data has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cr  $jobFinderModel
     * @return \Illuminate\Http\Response
     */
    public function show(JobFinderModel $jobFinderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $jobFinderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(JobFinderModel $jobFinderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $jobFinderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $jobFinderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $jobFinderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobFinderModel $jobFinderModel)
    {
        //
    }
}
