<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function index()
    {

        $projects = Project::with('user', 'type', 'technologies')->paginate(20);

        return response()->json(
            [
                "success" => true,
                "results" => $projects
            ]
        );
    }

    public function show(Project $project)
    {
        return response()->json([
            "success" => true,
            "results" => $project
        ]);
    }

    public function search(Request $request)
    {
        $data = $request->all();

        if (isset($data['title'])) {
            $stringa = $data['title'];
            $projects = Project::where('title', 'LIKE', "%{$stringa}%")->get();
        } elseif ( is_null($data['title'])) {
            $projects = Project::all();
        } else {
            abort(404);
        }
        return response()->json([
            "success" => true,
            "results" => $projects,
            "matches" => count($projects)
        ]);
    }
}
