<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WantToJoin;
use App\Services\DashboardService;
use Auth;
use Illuminate\Http\Request;

class TeamRequest extends Controller
{
    public function index(DashboardService $service)
    {
        $requests = $service->getStats(Auth::user());
        return view('admin.team-request', $requests);
    }
}
