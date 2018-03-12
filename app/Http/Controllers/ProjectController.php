<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function index() {
        $user = Auth::user();
        $projects = Project::get();
        return view('project.index', compact('user', 'projects'));
    }

    public function create() {}

    public function store(Request $request) {
        $request->validate(Project::$validate_rule);
        Auth::user()->projects()->create($request->all());
        return redirect('projects');
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        $users = $project->users;
        return view('project.show', compact('project', 'users'));
    }

    public function edit($id) {}

    public function update(Request $request, $id) {
        $request->validate(Project::$validate_rule);
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

    public function join($id){
        $user = Auth::user();
        if(!$user->is_joining($id)) {
            $user->projects()->attach($id);
        }
        return redirect('projects');
    }

    public function leave($id){
        $user = Auth::user();
        if($user->is_joining($id)) {
            $user->projects()->detach($id);
        }
        return redirect('projects');
    }
}
