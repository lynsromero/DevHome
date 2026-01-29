<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.projects.add', compact('user'));
    }
    public function store(Request $request)
    {
        $project = new Projects();
        $project->user_id = auth()->id();
        $project->title = $request->title;
        if (empty($request->slug)) {
            $project->slug = Str::slug($request->title);
        } else {

            $project->slug = Str::slug($request->slug);
        }
        $project->description = $request->description;
        $project->github_url = $request->github_url;
        $project->live_url = $request->live_url;


        if ($request->tech_stack) {
            $project->tech_stack = array_map('trim', explode(',', $request->tech_stack));
        }


        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');


            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('project_thumbnail', $filename, 'public');
            $project->thumbnail = 'storage/project_thumbnail/' . $filename;
        }

        $project->save();
        return redirect()->route('dashboard')->with('success', 'Project Updated Successfully!');
    }

    public function list()
    {
        $user = Auth::user();
        $projects = Projects::where('user_id', Auth::user()->id)->latest()->get();
        return view('admin.projects.list', compact('user', 'projects'));
    }

    public function destroy($slug)
    {
        $project = Projects::where('slug', $slug)->firstOrFail();
        if ($project->thumbnail && file_exists(public_path($project->thumbnail))) {
            unlink(public_path($project->thumbnail));
        }
        $project->delete();

        return redirect()->route('dashboard')->with('success', 'Project removed successfully.');
    }
}
