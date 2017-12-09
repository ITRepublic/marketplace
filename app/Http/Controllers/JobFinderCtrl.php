<?php

namespace App\Http\Controllers;

use App\JobFinderModel;
use Illuminate\Http\Request;

class JobFinderCtrl extends Controller
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
        return view('jfregis.create')->withTitle('Register');
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
            'EmailAddress'  => 'required|email|unique:jobfinder,EmailAddress',
            'Address'       => 'required',
            'Phone'         => 'required|numeric'
    	];

        $this->validate($request, $rules);
        //save db
        $data['UserName'] = $request->UserName;
        $data['Password'] = md5($request->Password);
        $data['EmailAddress'] = $request->EmailAddress;
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
        return redirect('jobFinder/create')->withSuccess('Thank you for registering. Your data has been saved.');
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
