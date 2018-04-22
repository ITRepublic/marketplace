<?php

namespace App\Http\Controllers;

use App\job_master_model;
use App\skill_type_model;
use App\skill_list_model;
use App\job_create_model;
use App\job_type_model;
use App\job_match_type_model;
use App\job_skill_req_model;
use App\master_status;
use App\master_currency;

use Illuminate\Http\Request;
use Carbon\Carbon;

class job_registration_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_create_model = job_create_model::where('email_address', $email_id)->first();
        return view('project.job_market_regis', array('job_create_model' => $job_create_model))->withTitle('Job Registration');
    }
    
    public function store_step_1(Request $request)
    {
        $rules = [
            'job_title'      => 'required',
            'email_address'  => 'required',
            'description'   => 'required',
            'expired_date'   => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        
        $data['job_title'] = $request->job_title;
        $data['jc_email_address'] = $request->email_address;
        $data['description'] = $request->description;
        $data['expired_date'] = $request->expired_date;
        $data['payment_type_id']= '1';
        $data['currency_id'] = '0';
        $data['has_seen_id'] = '0';
        $data['price_list'] = '';
        $data['job_status'] = '0';
        $num_liscence_exist=true;
        while($num_liscence_exist){

           if (!job_master_model::where([
            ['job_title', '=', $data['job_title']],
            ['jc_email_address', '=', $data['jc_email_address']],
            ['description', '=', $data['description']]
            ])->exists()) {
                $result = $data['job_title'] . '+' . $data['jc_email_address'] . '+' . $data['description'];
                $num_liscence_exist=false;
                $jm = job_master_model::create($data);
                session()->forget('result');
                session()->put('result', $result);
           }else
           {
               //nih jor yang buat nampilin error
               
           }
        }
        
        return redirect('job_market_regis/create_step_2')->withsuccess('Next to second step.');
    }
    
    public function create_step_2()
    {
        $result = session()->get('result');
        $split_job_string = explode('+', $result, 3);
        $job_title = $split_job_string[0];
        $jc_email_address = $split_job_string[1];
        $description = $split_job_string[2];

        $job_master_model = job_master_model::where([
            ['job_title', '=', $job_title],
            ['jc_email_address', '=', $jc_email_address],
            ['description', '=', $description]
            ])->first();
        $job_type = job_type_model::pluck('job_type_desc', 'job_type_id');

        $job_match_type_model = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['job_type.job_type_desc']);

        return view('project.second_job_market_regis', array('job_master_model' => $job_master_model, 'job_type' => $job_type, 'job_match_type_model' => $job_match_type_model))->withTitle('Job Registration');
    }
    public function add_job_type(Request $request)
    {
        $job_type_id = $request->job_type_id;
        $job_id = $request->job_id;

        $job_type_list_model = job_match_type_model::where('job_id', $job_id)->where('job_type_id', $job_type_id)->first();
        
        if($job_type_list_model == null) {
            $data['job_id'] = $job_id;
            $data['job_type_id'] = $job_type_id;
            $job_match_type_model = job_match_type_model::create($data);

            return response()->json(array(
                'data' => $job_match_type_model,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this job type. Please choose another.'
            ));
        }
    }
    public function store_step_2(Request $request)
    {
        $result = session()->get('result');
        $split_job_string = explode('+', $result, 3);
        $job_title = $split_job_string[0];
        $jc_email_address = $split_job_string[1];
        $description = $split_job_string[2];
        
        $job_master_model = job_master_model::where([
            ['job_title', '=', $job_title],
            ['jc_email_address', '=', $jc_email_address],
            ['description', '=', $description]
            ])->first();

        return redirect('job_market_regis/create_step_3')->withSuccess('Next to third step.');
    }
    public function create_step_3()
    {
        $result = session()->get('result');
        $split_job_string = explode('+', $result, 3);
        $job_title = $split_job_string[0];
        $jc_email_address = $split_job_string[1];
        $description = $split_job_string[2];
        $job_master_model = job_master_model::where([
            ['job_title', '=', $job_title],
            ['jc_email_address', '=', $jc_email_address],
            ['description', '=', $description]
            ])->first();

        $job_match_type_model = job_match_type_model::join('job_type','job_match_type.job_type_id', '=', 'job_type.job_type_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['job_type.job_type_desc']);

        $skill_list = job_skill_req_model::join('skill_type','job_match_skill.skill_id', '=', 'skill_type.skill_id')
        ->where('job_id', $job_master_model->job_id)
        ->get(['skill_type.skill_type']);
        $skill_type = skill_type_model::pluck('skill_type', 'skill_id');
        $currency = master_currency::pluck('currency_name', 'currency_id');
        return view('project.third_job_market_regis', array('job_master_model' => $job_master_model, 'job_match_type_model' => $job_match_type_model, 'skill_type' => $skill_type, 'skill_list' => $skill_list, 'currency' => $currency))->withTitle('Job Registration');
    }
    public function add_skill(Request $request)
    {
        $skill_type_id = $request->skill_type_id;
        $job_id = $request->job_id;

        $skill_list_model = job_skill_req_model::where('job_id', $job_id)->where('skill_id', $skill_type_id)->first();
        
        if($skill_list_model == null) {
            $data['job_id'] = $job_id;
            $data['skill_id'] = $skill_type_id;
            $skill_list = job_skill_req_model::create($data);

            return response()->json(array(
                'data' => $skill_list,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this job skill req. Please choose another.'
            ));
        }
    }
    public function store_step_3(Request $request)
    {
        $rules = [
            'currency'       => 'required',
            'job_price'       => 'required'
    	];
        $this->validate($request, $rules);
        //save db
        $data['job_status'] = "1";
        $data['currency_id'] = $request->currency;
        $data['price_list'] = $request->job_price;

        $result = session()->get('result');
        $split_job_string = explode('+', $result, 3);
        $job_title = $split_job_string[0];
        $jc_email_address = $split_job_string[1];
        $description = $split_job_string[2];
        $job_master_model = job_master_model::where([
            ['job_title', '=', $job_title],
            ['jc_email_address', '=', $jc_email_address],
            ['description', '=', $description]
            ])->first();
        $jm_update = job_master_model::where('job_id', $job_master_model->job_id)->update($data);
        session()->forget('result');
        return redirect()->to('/project_list')->withSuccess('Job Registration is done.');
    }
}
