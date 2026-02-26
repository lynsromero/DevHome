<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use Spatie\LaravelPdf\Facades\Pdf;

class CVController extends Controller
{
    /**
     * 1. Generate DevHome CV (Dynamic PDF)
     */
    public function generateDevHome($slug)
    {
        $user = User::where('slug' , $slug)->firstOrFail();
        $data = [
            'user' => $user,
            'projects' => Projects::where('user_id' , $user->id)->get()
        ];

        return Pdf::view('pdf.dev_cv', $data)
        ->name("Cv-Of-{{$user->name}}")
        ->download();
    }

    /**
     * 2. Download Customized CV (Stored File)
     */
    public function downloadCustom(User $user)
    {
        if (!$user->custom_cv) {
            return back()->with('error', 'No customized CV found.');
        }

        // Strip 'storage/' to get the actual path inside storage/app/public/
        $filePath = str_replace('storage/', '', $user->custom_cv);

        // Get the absolute path to the file
        $absolutePath = storage_path('app/public/' . $filePath);

        if (!file_exists($absolutePath)) {
            return back()->with('error', 'The file was not found on the server.');
        }

        // Use the global response helper - this avoids the "Undefined method" warning
        return response()->download($absolutePath, "CV-Of-{$user->name}.pdf");
    }
}
