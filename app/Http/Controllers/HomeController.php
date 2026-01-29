<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projects = Projects::all();
        $teams = User::all();

        return view('index', compact('projects', 'teams'));

    }

    public function project($slug){
        $projects = Projects::where('slug', $slug)->firstOrFail();
        $projects->increment('views');
        $user = User::where('id', $projects->user_id)->firstOrFail();


        return view('project' , compact('projects' , 'user'));
    }
}
