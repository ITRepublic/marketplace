<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginCtrl extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function doLogin() {
        return redirect('/projects');
    }
}
