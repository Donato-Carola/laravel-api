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

        $projects = Project::all();

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

    public function search(Request $request){
        $data = $request->all();

        if ( isset($data['name'])){
            $stringa = $data['name'];
            $project = Project::where('title', 'LIKE', "%{$stringa}%")->get();


            return response()->json([
                "success" => true,
                "results" => $project
            ]);
        } else {
            abort(404);
        }
    }
}
