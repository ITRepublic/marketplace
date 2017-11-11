<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectCtrl extends Controller
{
    public function getProject() {
        return view('project.show')->withTitle('Projects');
    }
}
