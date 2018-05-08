<?php

namespace App\Http\Controllers;

use App\job_master_model;
use App\skill_type_model;
use App\skill_list_model;
use App\job_create_model;
use App\job_finder_model;
use App\job_type_model;
use App\job_match_type_model;
use App\job_skill_req_model;
use App\job_match_search_model;
use App\master_status;
use App\master_currency;

use Illuminate\Http\Request;
use Carbon\Carbon;

class job_market_controller extends Controller
{
    //
    public function create()
    {
        $dtnow = Carbon::now()->format('m/d/Y');
        $email_id = session()->get('user_email');
        $job_finder_model = job_finder_model::where('email_address', $email_id)->first();
        $job_master_model = job_master_model::join('currency','job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator','job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where('job_master.job_status', '1')
        ->where([
            ['job_master.job_status', '=', '1'],
            ['job_master.expired_date', '>', $dtnow]
        ])
        ->get();
        
        return view('project.job_market', array('job_master_model' => $job_master_model, 'job_finder_model' => $job_finder_model))->withTitle('Job Marketplace');
    }

    public function store(Request $request)
    {
        $data['job_id'] = $request->job_id;
        $edit_session = session()->get('detail_job_market_session');
        $finishtext = 'Editing job is done.';
        if ($edit_session == 'edit')
        {
            $data['description'] = $request->job_description;
            $data['expired_date'] = $request->job_expired_date;
            $data['job_status'] = $request->job_status;
            $data['currency_id'] = $request->currency;
            $data['price_list'] = $request->job_price;
            $jm = job_master_model::where('job_id',$data['job_id'])->update($data);
        }else
        {
            $job_master_model = job_master_model::where('job_id', $data['job_id'])
            ->first();
            $data_update['has_seen_id'] = $job_master_model->has_seen_id + 1;
    
            $jm_update = job_master_model::where('job_id', $data['job_id'])->update($data_update);
            
            $data['jf_email_address'] = session()->get('user_email');
            $data['status_id'] = '1';
            
            $job_match_search_model = job_match_search_model::where([
                ['job_id', '=', $data['job_id']],
                ['jf_email_address', '=', session()->get('user_email')]
            ])
            ->count();

            $finishtext = 'You have applied this job before.';

            if($job_match_search_model == 0){
                $jm = job_match_search_model::create($data);
                $finishtext = 'Job Apply is done.';
            }
        }
        return back()->withSuccess($finishtext);       
    }
    public function get_detail($id)
    {
        session()->forget('detail_job_market_session');
        session()->put('detail_job_market_session', 'view');
        $job_master_model = job_master_model::join('master_status','job_master.job_status', '=', 'master_status.status_id')
        ->join('currency', 'job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator', 'job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where('job_id', $id)
        ->first();

        $job_match_type_model = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['job_type.job_type_desc']);

        $skill_list = job_skill_req_model::join('skill_type','job_match_skill.skill_id', '=', 'skill_type.skill_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['skill_type.skill_type']);

        return view('project.job_market_detail', array('job_master_model' => $job_master_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list))->withTitle($job_master_model->job_title);

    }
    public function all()
    {
        $job_master_model = job_master_model::join('currency','job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator','job_master.jc_email_address', '=', 'job_creator.email_address')
        ->get();

        return view('project.job_market', array('job_master_model' => $job_master_model))->withTitle('Job Marketplace');
    }
    
    public function all_per_customer()
    {
        $email_id = session()->get('user_email');
        $job_master_model = job_master_model::join('currency','job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator','job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where([
            ['jc_email_address', '=', $email_id],
            ['job_status', '=', '1']
            ])
        ->get();
        
        return view('project.job_market', array('job_master_model' => $job_master_model))->withTitle('Job Marketplace');
    }
    public function get_edit_detail($id)
    {
        session()->forget('detail_job_market_session');
        session()->put('detail_job_market_session', 'edit');

        $job_master_model = job_master_model::join('master_status','job_master.job_status', '=', 'master_status.status_id')
        ->join('currency', 'job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator', 'job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where('job_id', $id)
        ->first();

        $job_match_type_model = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['job_type.job_type_desc']);

        $skill_list = job_skill_req_model::join('skill_type','job_match_skill.skill_id', '=', 'skill_type.skill_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['skill_type.skill_type']);
        $job_status = master_status::pluck('status_name', 'status_id');
        $currency = master_currency::pluck('currency_name', 'currency_id');
        return view('project.job_market_detail', array('job_master_model' => $job_master_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list, 'job_status' => $job_status, 'currency' => $currency))->withTitle($job_master_model->job_title);

    }
}
