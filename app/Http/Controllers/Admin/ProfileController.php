<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }

           
            $filename = time() . '_' . $image->getClientOriginalName();

           
            $image->storeAs('images', $filename, 'public');

            
            $user->image = 'storage/images/' . $filename;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->facebook_url = $request->facebook_url;
        $user->linkedin_url = $request->linkedin_url;
        $user->github_url = $request->github_url;
        $user->experience = $request->experience;
        if ($request->filled('languages')) {        
        $user->languages = array_map('trim', explode(',', $request->languages));
    }

        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->ajax()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully!',
            'user' => $user
        ]);
    }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
