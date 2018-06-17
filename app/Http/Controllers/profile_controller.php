<?php

namespace App\Http\Controllers;

use App\job_finder_model;
use App\skill_type_model;
use App\skill_list_model;
use Validator;
use Carbon\Carbon;

use Illuminate\Http\Request;

class profile_controller extends Controller
{
    public function create()
    {
        $email_id = session()->get('user_email');
        $job_finder_model = job_finder_model::where('email_address', $email_id)->first();
        $skill_type = skill_type_model::pluck('skill_type', 'skill_id');

        $skill_list = skill_list_model::join('skill_type','skill_list.skill_id', '=', 'skill_type.skill_id')
                    ->where('jf_email_address', $email_id)
                    ->get(['skill_type.skill_type']);

        return view('jf_regis.profile', array('job_finder_model' => $job_finder_model, 'skill_type' => $skill_type, 'skill_list' => $skill_list))->withTitle('Profile');
    }

    public function store(Request $request)
    { 
        $rules = [
    		'username'      => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric'
    	];
        $this->validate($request, $rules);

        // upload image
    	if ($request->hasFile('profile_pict')) {
    		// will store in folder storage/app/image
    		$path = 'storage/app/'.$request->file('profile_pict')->store('image');
        }
        else {
            $path = "";
        }
        
        //save db
        $data['username'] = $request->username;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['profile_pict'] = $path;
        
        $jf = job_finder_model::where('email_address',session()->get('user_email'))->update($data);
        return redirect('/profile')->withSuccess('Profile has been updated.');
    }

    public function add_skill(Request $request)
    {
        $skill_name = $request->skill;
        $email = $request->email;
        $skill_type = skill_type_model::where('skill_id', $skill_name)->first();

        $skill_list_model = skill_list_model::where('skill_id',$skill_type->skill_id)->where('jf_email_address',$email)->first();

        $data['jf_email_address'] = $email;
        $data['skill_id'] =  $skill_type->skill_id;
        
        if($skill_list_model == null) {
            $skill_list = skill_list_model::create($data);
            return response()->json(array(
                'data' => $skill_list,
                'message' => 'OK'
            ));
        }
        else {
            return response()->json(array(
                'data' => [],
                'message' => 'You have added this skill. Please choose another.'
            ));
        }
    }
}
