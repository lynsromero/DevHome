<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use App\Models\WantToJoin;
use App\Services\HomeService;
use Illuminate\Http\Request;
use App\Http\Requests\JoinRequest;
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
    public function joinreq (JoinRequest $request)
    {
        $join = new WantToJoin();
        
        $join->name = $request->name;
        $join->link = $request->link;
        $join->save();
        return redirect()->back()->with('success', 'Request sent successfully');
    }
}
