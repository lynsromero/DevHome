<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('admin.dashboard' , compact('user'));
    }

    public function loginPageView(Request $request){
        if ($request->session()->get('admin')) {
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request){  
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

         $credentials = $request->only('email', 'password');
          if (Auth::attempt($credentials)) {
            $request->session()->regenerate();return redirect()->intended(route('dashboard'));
    }
        return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput($request->only('email'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}


