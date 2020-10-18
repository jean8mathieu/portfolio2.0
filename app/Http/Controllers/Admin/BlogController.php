<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Get the admin blog index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'tags'])
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Blog::class);
        return view('admin.blog.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('admin.blog.edit', compact('blog'));
    }
}
