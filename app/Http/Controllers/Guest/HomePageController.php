<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('guest.index', compact('projects'));
    }

    public function show(Project $project)
    {
        if (!$project) {
            abort(404);
        }

        return view('guest.show', compact('project'));
    }
}
