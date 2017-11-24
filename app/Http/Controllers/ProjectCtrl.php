<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectCtrl extends Controller
{
    public function create() {
        return view('project.create')->withTitle('Projects');
    }
}
