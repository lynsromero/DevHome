<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Auth;



class EmailController extends Controller
{
    public function index(DashboardService $service)
{
    $stats = $service->getStats(Auth::user());
    
    return view('admin.email_list', $stats);
}
}
