<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Blog::class);

        if (empty($request->slug)) {
            $slug = Str::kebab($request->title);
        } else {
            $slug = Str::kebab($request->slug);
        }

        $blog = Blog::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'slug' => $slug,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'user_id' => Auth::id(),
        ]);

        if (!$blog) {
            return response([
                'message' => "We could not create the blog... Please try again..."
            ], 500);
        }

        if (!$data = $this->updateMultipleTags($blog, $request, 'tag', 'tags')) {
            return response($data, 500);
        }

        if ($this->updateCoverPicture($blog, $request) === false) {
            return response([
                'message' => "We could not add the cover picture... Please try again..."
            ], 500);
        }

        return response([
            'message' => "The blog was successfully created!",
            'redirect' => route('admin.blog.index')
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        if ($request->slug !== $blog->slug) {
           $slug = Str::kebab($request->slug);
        } elseif (empty($request->slug)) {
            $slug = Str::kebab($request->title);
        } else {
            $slug = $blog->slug;
        }

        $success = $blog->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'slug' => $slug,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'user_id' => Auth::id(),
        ]);

        if (!$success) {
            return response([
                'message' => "We could not update the blog... Please try again..."
            ], 500);
        }

        if (!$data = $this->updateMultipleTags($blog, $request, 'tag', 'tags')) {
            return response($data, 500);
        }

        if ($this->updateCoverPicture($blog, $request) === false) {
            return response([
                'message' => "We could not add the cover picture... Please try again..."
            ], 500);
        }

        return response([
            'message' => "The blog was successfully updated!",
            'redirect' => route('admin.blog.index')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Blog $blog
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);
        if ($blog->delete()) {
            return response([
                'message' => "The blog have been successfully deleted!",
                'redirect' => route('admin.blog.index')
            ], 200);
        }

        return response([
            'message' => "The blog could not be deleted... Please try again..."
        ], 500);
    }

    /**
     * Update the cover picture for blog
     *
     * @param  Blog $blog
     * @param  Request $request
     * @return bool|null
     */
    private function updateCoverPicture(Blog $blog, Request $request)
    {
        if ($request->file('cover')) {
            $image = $request->file('cover');

            $name = $image->getClientOriginalName();
            $image->move(storage_path("app/public/images/blog/{$blog->id}"), $name);

            if (!$blog->update([
                'cover' => "/storage/images/blog/{$blog->id}/{$name}"
            ])) {
                return false;
            }
            return true;
        }
        return null;
    }

    /**
     * Update Multiple tags
     *
     * @param $model
     * @param $request
     * @param $parameter
     * @param $relationship
     * @return array|bool
     */
    private function updateMultipleTags($model, $request, $parameter, $relationship)
    {
        try {
            $tagsArray = [];
            //Create the relationship between the article and the specific relationship
            if ($request->{$parameter}) {
                if (!is_array($request->{$parameter})) {
                    $request->{$parameter} = [$request->{$parameter}];
                }
                foreach ($request->{$parameter} as $tag) {
                    if ($tag = Tag::find($tag)) {
                        $tagsArray[] = $tag->id;
                    }
                }
            }

            if (!$model->{$relationship}()->sync($tagsArray)) {
                return ['error' => true, 'message' => "Could not create a relationship with {$relationship}..."];
            }
        } catch (\Exception $e) {
            return ['error' => true, 'message' => "Something went wrong for {$relationship}..."];
        }

        return true;
    }
}
