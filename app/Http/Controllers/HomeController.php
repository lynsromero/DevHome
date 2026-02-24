<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ProjectContactRequest;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Projects;
use App\Models\User;
use App\Models\Website_settings;
use Illuminate\Http\Request;
use App\Models\ProjectView;
use Illuminate\Support\Carbon;
use App\Services\HomeService;

class HomeController extends Controller
{
    public function index(Request $request, HomeService $homeService)
    {

        $data = $homeService->getHomeData($request);


        if ($request->ajax()) {
            return view('front.partials.project_cards', [
                'projects' => $data['projects']
            ])->render();
        }


        return view('front.layouts.home.index', $data);
    }


    public function project(Request $request, $slug)
    {
        $projects = Projects::where('slug', $slug)->firstOrFail();
        $ip = $request->ip();
        $settings = Website_settings::first();

        $alreadyViewed = ProjectView::where('projects_id', $projects->id)
            ->where('ip_address', $ip)
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->exists();

        if (!$alreadyViewed) {
            $projects->increment('views');

            ProjectView::create([
                'projects_id' => $projects->id,
                'ip_address' => $ip,
            ]);
        }

        $user = User::where('id', $projects->user_id)->firstOrFail();

        return view('front.layouts.home.project', compact('projects', 'user', 'settings'));
    }

    public function submit(ContactRequest $request)
    {

        Contact::create($request->validated());


        return response()->json([
            'success' => true,
            'message' => "We've Received Your SMS, Thank You"
        ]);
    }
    public function contactMe(ProjectContactRequest $request)
    {        
        if ($request->has('user_id')) {           
            $targetUserId = $request->user_id;
        } else {
            $project = Projects::findOrFail($request->project_id);
            $targetUserId = $project->user_id;
        }

        Email::create(array_merge($request->validated(), [
            'user_id' => $targetUserId,            
            'project_id' => $request->project_id ?? null
        ]));

        return response()->json([
            'success' => true,
            'message' => "I've Received Your Message, Thank You"
        ]);
    }

    public function uploadEditorImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // 1. Generate a unique name
            $fileName = time() . '_' . $file->getClientOriginalName();

            // 2. Store the image in storage/app/public/project-images
            // 'public' disk refers to the storage/app/public folder
            $path = $file->storeAs('project-images', $fileName, 'public');

            // 3. Generate the public URL
            $url = asset('storage/' . $path);

            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
}
