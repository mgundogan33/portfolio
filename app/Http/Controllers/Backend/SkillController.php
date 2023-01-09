<?php

namespace App\Http\Controllers\Backend;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSkillRequest;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }
    public function create()
    {
        return view('skills.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ], [
            'name.required' => 'Beceri Ad Alanı Zorunludur',
            'image.required' => 'Resim Alanı Zorunludur',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('skills');
            Skill::create([
                'name' => $request->name,
                'image' => $image
            ]);
            return to_route('skills.index');
        }
        return back();
    }
    public function edit($id)
    {
        $skills = Skill::find($id);
        return view('skills.edit', compact('skills'));
    }
    public function update(Request $request, $id)
    {
        $skills = Skill::find($id);
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Beceri Ad Alanı Zorunludur',
        ]);

        $image = $skills->image;
        if ($request->hasFile('image')) {
            Storage::delete($skills->image);
            $image = $request->file('image')->store('skills');
        }
        $skills->update([
            'name' => $request->name,
            'image' => $image
        ]);
        return to_route('skills.index');
    }
    public function destroy($id)
    {
        $skills = Skill::find($id);
        Storage::delete($skills->image);
        $skills->delete();

        return to_route('skills.index');
    }
}
