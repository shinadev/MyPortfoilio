<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $project = project::all();

        return view('admin.project.index', compact('project'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_descr' => 'required|string',
        ]);

        $project = new project();

        $project->uniqueid = Str::random(20);
        $project->project_name = $request->project_name;
        $project->project_descr = $request->project_descr;

        if ($request->hasFile('project_image')) {
            $image = $request->file('project_image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('uploads/projects'), $imageName);

            $project->project_image = 'uploads/projects/' . $imageName;
        }

        $project->save();

        return redirect()
            ->back()
            ->with('success', 'Project added successfully.');
    }

    public function edit($project_id)
    {
        $project = project::findOrFail($project_id);

        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $project_id)
    {
        $project = project::findOrFail($project_id);

        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_descr' => 'required|string',
        ]);

        $project->project_name = $request->project_name;
        $project->project_descr = $request->project_descr;

        if ($request->hasFile('project_image')) {
            $image = $request->file('project_image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('uploads/projects'), $imageName);

            $project->project_image = 'uploads/projects/' . $imageName;
        }

        $project->save();

        return redirect()
            ->back()
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($project_id)
    {
        $project = project::findOrFail($project_id);

        $project->delete();

        return redirect()
            ->back()
            ->with('success', 'Project deleted successfully.');
    }
}