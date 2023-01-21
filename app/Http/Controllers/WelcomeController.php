<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::all();
        $projects=Project::all();
        return view('welcome', compact('skills','projects'));
    }
}
