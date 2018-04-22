<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main_controller extends Controller
{
    public function create() {
    	return view('index');
    }
}
