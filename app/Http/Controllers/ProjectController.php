<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function index() {
        $user_id = Auth::id();
        $projects = Project::where('user_id', $user_id)->get();
        return view('project.index', compact('projects'));
    }

    public function create() {}

    public function store(Request $request) {
        Auth::user()->projects()->create($request->all());
        return redirect('projects');
    }

    public function show($id) {
        $user_id = Auth::id();
        $project = Project::where('user_id', $user_id)->findOrFail($id);
        return view('project.show', compact('project'));
    }

    public function edit($id) {}

    public function update(Request $request, $id) {
        $user_id = Auth::id();
        $project = Project::where('user_id', $user_id)->findOrFail($id);
        $project->update($request->all());
        return redirect('projects/' . $id);
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('projects');
    }
}
