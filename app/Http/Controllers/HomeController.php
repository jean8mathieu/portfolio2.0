<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the home index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projectsSlider = Project::query()
            ->whereNotNull('cover')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        $projects = Project::query()
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('home.index', compact('projects', 'projectsSlider'));
    }

    /**
     * Show the home about page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('home.about');
    }

    /**
     * Show the home contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('home.contact');
    }

    /**
     * Get project base by the tag
     *
     * @param  Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag(Tag $tag)
    {
        $projectsSlider = $tag->projects()
            ->whereNotNull('cover')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        $projects = $tag->projects()
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('home.index', compact('projectsSlider', 'projects', 'tag'));
    }
}
