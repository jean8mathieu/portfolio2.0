<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get the admin home index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('admin.home.index', compact('projects'));
    }
}
