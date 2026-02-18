<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request, HomeService $homeService){
        $data = $homeService->getHomeData($request);
        return view('front.team.index', $data);
    }
}
