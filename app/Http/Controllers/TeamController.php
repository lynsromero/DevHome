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
        
        $homeData = $homeService->getHomeData($request);
       
        $viewData = array_merge($homeData, ['projects' => $projects, 'user' => $user]);

        return view('front.team.index', $viewData);
    }
}
