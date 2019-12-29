<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $filteredTag = [];

        //Search for the tag containing the string
        $tags = Tag::query()
            ->where('name', 'like', "%{$request->search}%");

        //If type is set and it's numeric
        if ($request->type && is_numeric($request->type)) {
            $tags->where('type', '=', (int)$request->type);
        }

        //Query the database
        $tags = $tags->get();

        //Generate the array
        foreach ($tags as $tag) {
            $filteredTag[] = [
                'text' => $tag->name,
                'value' => $tag->id
            ];
        }

        return $filteredTag;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if (Tag::create([
            'name' => $request->name,
            'type' => $request->type
        ])) {
            return response([
                'message' => "The tag have been created successfully!",
                'redirect' => route('admin.tag.index')
            ], 200);
        }

        return response([
            'message' => "The tag could not be created... Please try again..."
        ], 500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        if ($tag->update([
            'name' => $request->name,
            'type' => $request->type
        ])) {
            return response([
                'message' => "The tag have been updated successfully!",
                'redirect' => route('admin.tag.index')
            ], 200);
        }

        return response([
            'message' => "The tag could not be updated... Please try again..."
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            return response([
                'message' => "The tag have been successfully deleted!",
                'redirect' => route('admin.tag.index')
            ], 200);
        }

        return response([
            'message' => "The tag could not be deleted... Please try again..."
        ], 500);
    }
}
