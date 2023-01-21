<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public  function index()
    {
        $projects = Project::get();

        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        $skills = Skill::get();
        return view('projects.create', compact('skills'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'project_url' => 'nullable',
            'skill_id' => 'required'
        ], [
            'name.required' => 'Proje Ad Alanı Zorunludur',
            'image.required' => 'Resim Alanı Zorunludur',
            'project_url.nullable' => 'Beceri Ad Alanı Zorunludur',
            'skill_id.required' => 'Bu Alan Zorunludur'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects');
            Project::create([
                'skill_id' => $request->skill_id,
                'name' => $request->name,
                'image' => $image,
                'project_url' => $request->project_url
            ]);
            return to_route('projects.index')->with('success','Proje Başarıyla Oluşturuldu...');
        }
        return back();
    }
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return view('projects.edit', compact('project','skills'));
    }
    public function update(Request $request, Project $project)
    {
        // $projects = Skill::find($id);
        $request->validate([
            'name' => 'required',
            'project_url' => 'nullable',
            'skill_id' => 'required'
        ], [
            'name.required' => 'Beceri Ad Alanı Zorunludur',
            'project_url.nullable' => 'Beceri Ad Alanı Zorunludur',
            'skill_id.required' => 'Bu Alan Zorunludur'
        ]);

        $image = $project->image;
        if ($request->hasFile('image')) {
            Storage::delete($project->image);
            $image = $request->file('image')->store('projects');
        }
        $project->update([
            'skill_id'=>$request->skill_id,
            'name' => $request->name,
            'project_url'=>$request->project_url,
            'image' => $image
        ]);
        return to_route('projects.index')->with('success','Proje Başarıyla Güncellendi...');
    }
    public function destroy(Project $project)
    {
        // $skills = Skill::find($id);
        Storage::delete($project->image);
        $project->delete();

        return to_route('projects.index')->with('danger','Proje Başarıyla Silindi...');
    }
}
