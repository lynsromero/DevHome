<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use App\Services\HomeService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request, HomeService $homeService, $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $projects = Projects::where('user_id', $user->id)->get();

        //  Get the shared home data (projects, teams, settings)
        $homeData = $homeService->getHomeData($request);

        // 3. Merge them into one flat array so variables are easy to use in Blade
        $viewData = array_merge($homeData, ['projects' => $projects, 'user' => $user]);

        return view('front.team.index', $viewData);
    }
}
