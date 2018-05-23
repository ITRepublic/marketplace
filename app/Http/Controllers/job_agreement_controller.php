<?php

namespace App\Http\Controllers;

use App\job_master_model;
use App\skill_type_model;
use App\skill_list_model;
use App\job_create_model;
use App\job_type_model;
use App\job_match_type_model;
use App\job_skill_req_model;
use App\job_agreement_model;
use App\job_match_search_model;
use App\job_finder_model;
use App\master_status;
use App\job_master_detail_milestone_model;
use App\payment_type;
use App\master_currency;
use App\job_user_rating_model;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;

class job_agreement_controller extends Controller
{
    //
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_match_search_model = job_master_model::join('master_status', 'job_master.job_status', '=', 'master_status.status_id')
        ->where('job_master.jc_email_address', $email_id)
        ->get();
        return view('job_agreement.job_agreement', array('job_match_search_model' => $job_match_search_model))->withTitle('Job Agreement List');
    }
    public function get_detail($id)
    {

        session()->forget('detail_job_agreement_session');
        session()->put('detail_job_agreement_session', 'edit');

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

        $job_applicant_model = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->join('master_status', 'job_match_search.status_id', '=', 'master_status.status_id')
        ->where([
            ['job_match_search.status_id', '=', '6'],
            ['job_id', '=', $id]
            ])
        ->get();

        $job_match_search_applicant = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->where([
            ['status_id', '=', '5'],
            ['job_id', '=', $id]
            ])
        ->get();
        
        $job_master_detail_milestone_model_check = job_master_detail_milestone_model::where('job_id', $id)
        ->where(function($query)
            {
                $query->where('status_id', '=', '2')
                    ->orWhere('status_id', '=', '3')
                    ->orWhere('status_id', '=', '4')
                    ->orWhere('status_id', '=', '5')
                    ->orWhere('status_id', '=', '6');
            })
        ->count();

        $payment_status = '1';
        $job_master_detail_milestone_model = job_master_detail_milestone_model::where('job_id', $id)
        ->get();
        if ($job_master_detail_milestone_model_check > 0){
            $payment_status = '2';
        }
        else {
            $job_master_detail_milestone_model = [];
        }
        

        $job_agreement_status = payment_type::where('payment_type_id', $payment_status)
        ->select('master_payment_type.payment_type_name')->first();
        
        $job_status = master_status::wherein('status_id', array(1, 2, 3, 6))
        ->pluck('status_name', 'status_id');
        

        return view('job_agreement.applicant', array('job_master_model' => $job_master_model, 'job_applicant_model' => $job_applicant_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list, 'job_match_search_applicant' => $job_match_search_applicant, 'job_status' => $job_status, 'job_master_detail_milestone_model_check' => $job_master_detail_milestone_model_check, 'job_agreement_status' => $job_agreement_status ,'job_master_detail_milestone_model' => $job_master_detail_milestone_model))->withtitle($job_master_model->job_title);

    }
    public function all()
    {
        $job_match_search_model = job_match_search_model::join('job_master','job_match_search.job_id', '=', 'job_master.job_id')
        ->join('master_status', 'job_master.job_status', '=', 'master_status.status_id')
        ->join('master_difficulty', 'job_master.difficulty', '=', 'master_difficulty.diff_id')
        ->get();
        return view('job_agreement.job_agreement', array('job_match_search_model' => $job_match_search_model))->withtitle('Job Agreement List');
    }
    public function get_detail_applicant($id)
    {
        $job_id = session()->get('job_id');
        $job_finder_model = job_finder_model::where('finder_id', $id)
        ->get()
        ->first();

        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
        ->where('jf_email_address', $job_finder_model->email_address)
        ->get(['skill_type.skill_type']);

        return view('job_agreement.detail_applicant', array('job_finder_model' => $job_finder_model, 'skill_list' => $skill_list))->withtitle('Applicant Profile');

    }
    public function store_applicant(Request $request)
    {
        $job_id = $request->job_id;
        //hire
        $email_address = $request->email_address;
        
        $job_match_search = job_match_search_model::where([
            ['job_id', '=', $job_id],
            ['jf_email_address', '=',$email_address]
            ])->first();

        $data['status_id'] = '6';

        if ($job_match_search->status_id == 6){
            $data['status_id'] = '7';
        }

        $jm_update = job_match_search_model::where([
            ['job_id', '=', $job_id],
            ['jf_email_address', '=',$email_address]
            ])->update($data);

        $data_job['job_status'] = '6';
        $data_job['payment_type_id'] = $request->payment_type;

        $ju_update = job_master_model::where([
            ['job_id', '=', $job_id]
            ])->update($data_job);

        //if milestone
        $payment_type = $request->payment_type;
        $counter_detail = $request->counter_detail_milestone;
        $milestone_detail = '';
        $milestone_price = '';
        if ($payment_type == '2')
        {
            $milestone_detail_array = array();
            for ($counter = 1; $counter <= $counter_detail; $counter++){
                $milestone_detail = $request->{"milestone_detail_" . $counter};
                $milestone_price = $request->{"milestone_price_" . $counter};
                $completed_string = $milestone_detail . "+" . $milestone_price;
                $milestone_detail_array[] = $completed_string;
            }
            $total_new_price = '0';
            
            foreach($milestone_detail_array as $value) {

                $split_detail_milestone_string = explode('+', $value, 2);
                $detail_milestone = $split_detail_milestone_string[0];
                $price_milestone = $split_detail_milestone_string[1];

                $data['job_id'] = $job_id;
                $data['milestone_detail'] = $detail_milestone;
                $data['milestone_price'] = $price_milestone;
                $total_new_price = $total_new_price + $price_milestone;

                $data['status_id'] = '6';
                $jd = job_master_detail_milestone_model::create($data);
            }
            $new_data_price['price_list'] = $total_new_price;
            $ju_update = job_master_model::where([
                ['job_id', '=', $job_id]
                ])->update($new_data_price);
        }    
        
        
        $email_id = session()->get('user_email');
        $job_master_model = job_master_model::join('currency','job_master.currency_id', '=', 'currency.currency_id')
        ->join('job_creator','job_master.jc_email_address', '=', 'job_creator.email_address')
        ->where([
            ['job_status', '=', '1'],
            ['job_id', '=', $job_id]
            ])
        ->get();

        return view('project.job_market', array('job_master_model' => $job_master_model))->withTitle('Job Marketplace');
    }

    public function edit_detail($id)
    {
        session()->forget('detail_job_agreement_session');
        session()->put('detail_job_agreement_session', 'edit');

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

        $job_applicant_model = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->join('master_status', 'job_match_search.status_id', '=', 'master_status.status_id')
        ->where('job_id', $id)
        ->get();

        $job_match_search_applicant = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
        ->where([
            ['status_id', '=', '5'],
            ['job_id', '=', $id]
            ])
        ->get();
        
        $job_master_detail_milestone_model_check = job_master_detail_milestone_model::where('job_id', $id)
        ->where(function($query)
            {
                $query->where('status_id', '=', '2')
                    ->orWhere('status_id', '=', '3')
                    ->orWhere('status_id', '=', '4')
                    ->orWhere('status_id', '=', '5')
                    ->orWhere('status_id', '=', '6');
            })
        ->count();
        
        $job_master_detail_milestone_model = job_master_detail_milestone_model::where('job_id', $id)
        ->get();

        $payment_status = '1';
        
        if ($job_master_detail_milestone_model_check > 0){
            $payment_status = '2';
            
        }
        

        $job_agreement_status = payment_type::where('payment_type_id', $payment_status)
        ->get(['master_payment_type.payment_type_name'])->first();

        
        
        $job_status = master_status::wherein('status_id', array(1, 2, 3, 6))
        ->pluck('status_name', 'status_id');
        

        return view('job_agreement.applicant', array('job_master_model' => $job_master_model, 'job_applicant_model' => $job_applicant_model, 'job_match_type_model' => $job_match_type_model, 'skill_list' => $skill_list, 'job_match_search_applicant' => $job_match_search_applicant, 'job_status' => $job_status, 'job_master_detail_milestone_model_check' => $job_master_detail_milestone_model_check, 'job_agreement_status' => $job_agreement_status ,'job_master_detail_milestone_model' => $job_master_detail_milestone_model))->withtitle($job_master_model->job_title);

    }

    public function store_status(Request $request)
    {
        $job_id = $request->job_id;
        
        $group = session()->get('group_check');

        $data['job_status'] = '6';
        $data_update['status_id'] = '6';

        $job_master_detail_milestone_model_check = job_master_detail_milestone_model::where('job_id', $job_id)
        ->where(function($query)
            {
                $query->where('status_id', '=', '2')
                    ->orWhere('status_id', '=', '3')
                    ->orWhere('status_id', '=', '4')
                    ->orWhere('status_id', '=', '5')
                    ->orWhere('status_id', '=', '6');
            })
        ->count();
        
        $job_master_model = job_master_model::where('job_id', $job_id)
        ->first();

        if ($group == 'jf' && $job_master_model->job_status == '6')
        {
            $data['job_status'] = '3';
            $data_update['status_id'] = '3';
        }
        elseif ($group == 'jf' && $job_master_model->job_status == '3' && $job_master_model->payment_type_id == '1')
        {
            $data['job_status'] = '4';
        }
        else
        {
            $job_applicant_model = job_match_search_model::join('job_finder','job_match_search.jf_email_address', '=', 'job_finder.email_address')
            ->where([
                ['job_match_search.status_id', '=', '6'],
                ['job_id', '=', $job_id]
                ])
            ->get()->first();
            $rating_score = $request->total_score_rating;
            $data['job_status'] = '2';
            
            $data_insert['job_id'] = $job_id;
            $data_insert['user_id'] = $job_applicant_model->finder_id;
            $data_insert['group_id'] = 'jf';
            $data_insert['rating_score'] = $rating_score;
            
            job_user_rating_model::create($data_insert);
            $finder_score = job_user_rating_model::where('user_id',$job_applicant_model->finder_id)
            ->get(['rating_score']);

            $total_score = '0';
            
            foreach($finder_score as $value) {
                $total_score += $value->rating_score;

            }
            $data_total_score['total_rating'] = $total_score/count($finder_score);
            job_finder_model::where('finder_id', $job_applicant_model->finder_id)->update($data_total_score);       
        }


        $jm_update = job_master_model::where('job_id', $job_id)->update($data);
        if ($job_master_detail_milestone_model_check > 0){
            $job_mile_update = job_master_detail_milestone_model::where('job_id', $job_id)->update($data_update);       
            
        }
        
        session()->forget('result');
        if ($group == 'jf')
        {
            return redirect()->to('/history')->withSuccess('Job Status Update is done.');
        }else
        {
            return redirect()->to('/job_agreement')->withSuccess('Job Status Update is done.');
        }
    }

    public function update_status_review($id, $job_id)
    {
        $job_milestone_check = job_master_detail_milestone_model::where('job_detail_id', $id)->get()->first();
        echo $job_milestone_check->milestone_detail;
        $data_update['status_id'] = '3';

        $check_status = $job_milestone_check->status_id;
        if ($check_status == '3')
        {
            $data_update['status_id'] = '4';
        }

        $job_mile_update = job_master_detail_milestone_model::where('job_detail_id', $id)->update($data_update);
        return redirect()->route('job_history_detail', ['id' => $job_id]);
        
    }
    public function update_status_finish_review($id, $job_id)
    {
        session()->forget('detail_job_agreement_session');
        session()->put('detail_job_agreement_session', 'edit');
        $job_milestone_check = job_master_detail_milestone_model::where('job_detail_id', $id)->get()->first();
        echo $job_milestone_check->milestone_detail;
        $data_update['status_id'] = '4';

        $check_status = $job_milestone_check->status_id;
        if ($check_status == '4')
        {
            $data_update['status_id'] = '5';
        }

        $job_mile_update = job_master_detail_milestone_model::where('job_detail_id', $id)->update($data_update);
        return redirect()->route('detail_job_agreement', ['id' => $job_id]);

    }
    
    
}
