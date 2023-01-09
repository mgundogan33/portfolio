<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public  function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }}
