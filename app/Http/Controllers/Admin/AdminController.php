<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Projects;
use App\Models\ProjectView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();
        $projects = Projects::where('user_id', Auth::id())->latest()
                        ->take(5)
                        ->get();;
        $totalProjects = $projects->count();
        $totalViews = $projects->sum('views');
        $todaysViews = ProjectView::whereHas('project', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereDate('created_at', Carbon::today())->count();

        $email = Email::where('user_id', Auth::id())->first();
        
        $todaysEmails = Email::where('user_id', $user->id)
        ->whereDate('created_at', $today)
        ->count();

        return view('admin.dashboard', compact('user', 'projects','totalProjects', 'totalViews', 'todaysViews', 'todaysEmails'));
    }

    public function loginPageView(Request $request)
    {
        if ($request->session()->get('admin')) {
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
