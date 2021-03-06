<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        $tags = Tag::query()
            ->orderBy('created_at', 'DESC')
            ->paginate(25);

        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Tag::class);
        return  view('admin.tag.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        $this->authorize('update', $tag);
        return view('admin.tag.edit', compact('tag'));
    }
}
