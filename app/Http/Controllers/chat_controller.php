<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chat;
use App\job_create_model;
use App\job_finder_model;
use App\job_match_search_model;
use App\job_master_model;

class chat_controller extends Controller
{
    public function get_chat($job_id, $finder_id) {
    	$user_id = session('user_id');
    	$group = session('group_check');

    	$chats = chat::where('job_id', $job_id)
    	->where('sender_id', $user_id)
    	->orWhere('receiver_id', $user_id)
    	->orderBy('created_at','asc')
    	->get();

    	foreach($chats as $chat) {
    		if($group == 'jc') {
    			if($chat->sender_id == $user_id) {
	    			$qry = job_create_model::where('company_id', $user_id)->first();
	    			$user[$chat->id] = $qry->company_name;
    			}
    			else {
    				$qry = job_finder_model::where('finder_id', $chat->sender_id)->first();
    				$user[$chat->id] = $qry->username;
    			}
    		}
    		elseif($group == 'jf') {
    			if($chat->sender_id == $user_id) {
	    			$qry = job_finder_model::where('finder_id', $user_id)->first();
    				$user[$chat->id] = $qry->username;
    			}
    			else {
    				$qry = job_create_model::where('company_id', $chat->sender_id)->first();
	    			$user[$chat->id] = $qry->company_name;
    			}
    		}
    	}

    	return view('chat', compact('chats','user','user_id','job_id','finder_id'));
    }

    public function send_chat(Request $request, $job_id, $finder_id) {
    	if(isset($request->message) && !empty($request->message)) {

    		$group = session('group_check');
    		$job_master = job_master_model::where('job_id', $job_id)->first();
    		$job_creator = job_create_model::where('email_address', $job_master->jc_email_address)->first();

    		$chat['job_id'] = $job_id;
    		$chat['sender_id'] = session('user_id');

    		if($group == 'jc') {
	    		$chat['receiver_id'] = $finder_id;
    		}
    		elseif($group == 'jf') {
    			$chat['receiver_id'] = $job_creator->company_id;
    		}

    		$chat['message'] = nl2br($request->message);

    		$send = chat::create($chat);
    	}

    	return back();
    }
}
