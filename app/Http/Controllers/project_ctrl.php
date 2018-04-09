<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class project_ctrl extends Controller
{
    public function create() {
        return view('project.create')->withTitle('Projects');
    }
}
