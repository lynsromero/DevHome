<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProjectView;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
public function index(Request $request)
{
    $teams = User::all();
    $query = Projects::query();

    // 1. Capture the filter
    $filter = $request->get('filter');

    // 2. Apply Filtering (Only if filter is present and not 'all')
    if ($request->has('filter') && $filter !== 'all') {
        $query->where(function($q) use ($filter) {
            // Check if it's stored as a JSON array
            $q->whereJsonContains('tech_stack', $filter)
            // OR check if it's stored as a comma-separated string
              ->orWhere('tech_stack', 'LIKE', '%' . $filter . '%');
        });
    }

    // 3. Sorting & Fetching
    if ($request->filled('filter') && $request->filter !== 'all') {
    $projects = $query->latest()->get();
} else {
    $projects = ($request->load_all == 'true') 
                ? $query->latest()->get() 
                : $query->latest()->take(6)->get();
}

    // 4. AJAX Response
    if ($request->ajax()) {
        return view('partials.project_cards', compact('projects'))->render();
    }

    return view('index', compact('projects', 'teams'));
}


    public function project(Request $request, $slug)
    {
        $projects = Projects::where('slug', $slug)->firstOrFail();
        $ip = $request->ip();

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

        return view('project', compact('projects', 'user'));
    }

}
