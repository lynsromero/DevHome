<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Projects;
use App\Models\User;
use App\Models\Website_settings;
use Illuminate\Http\Request;
use App\Models\ProjectView;
use Illuminate\Support\Carbon;
use App\Services\ProjectService;

class HomeController extends Controller
{
    public function index(Request $request, ProjectService $projectService)
    {
        $projects = $projectService->getFilteredProjects($request);
        $teams = User::all();
        $settings = Website_settings::first();

        if ($request->ajax()) {
            return view('front.partials.project_cards', compact('projects'))->render();
        }

        return view('front.layouts.home.index', compact('projects', 'teams' , 'settings'));
    }


    public function project(Request $request, $slug)
    {
        $projects = Projects::where('slug', $slug)->firstOrFail();
        $ip = $request->ip();
        $settings = Website_settings::first();

        $alreadyViewed = ProjectView::where('projects_id', $projects->id)
            ->where('ip_address', $ip)
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->exists();

        if (!$alreadyViewed) {
            $projects->increment('views');

            ProjectView::create([
                'projects_id' => $projects->id,
                'ip_address' => $ip,
            ]);
        }

        $user = User::where('id', $projects->user_id)->firstOrFail();

        return view('front.layouts.home.project', compact('projects', 'user', 'settings'));
    }

    public function submit(ContactRequest $request)
    {
        Contact::create($request->validated());


        return response()->json([
            'success' => true,
            'message' => "We've Received Your SMS, Thank You"
        ]);
    }
}