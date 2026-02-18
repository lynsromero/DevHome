<?php
namespace App\Services;

use App\Models\User;
use App\Models\Website_settings;
use Illuminate\Http\Request;

/**
 * Class HomeService
 * @package App\Services
 */
class HomeService
{

protected $projectService;

public function __construct(ProjectService $projectService)
{
  $this->projectService = $projectService;
}

public function getHomeData(Request $request)
    {
        return [
            'projects' => $this->projectService->getFilteredProjects($request),
            'teams'    => User::all(),
            'settings' => Website_settings::first(),
        ];
    }
}
