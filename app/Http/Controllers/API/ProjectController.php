<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Project;
use App\Models\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $project = Project::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'url' => $request->url,
            'user_id' => Auth::id(),
            'repo_url' => $request->repository
        ]);

        if(!$project) {
            return response([
                'message' => "We could not create the project... Please try again..."
            ], 500);
        }

        if (!$data = $this->updateMultipleTags($project, $request, 'tag', 'tags')) {
            return response($data, 500);
        }

        if($this->updateCoverPicture($project, $request) === false) {
            return response([
                'message' => "We could not add the cover picture... Please try again..."
            ], 500);
        }

        return response([
            'message' => "The project was successfully created!",
            'redirect' => route('admin.home.index')
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Project $project)
    {
        $success = $project->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'url' => $request->url,
            'user_id' => Auth::id(),
            'repo_url' => $request->repository
        ]);

        if (!$success) {
            return response([
                'message' => "We could not update the project... Please try again..."
            ], 500);
        }

        if (!$data = $this->updateMultipleTags($project, $request, 'tag', 'tags')) {
            return response($data, 500);
        }

        if($this->updateCoverPicture($project, $request) === false) {
            return response([
                'message' => "We could not add the cover picture... Please try again..."
            ], 500);
        }

        return response([
            'message' => "The project was successfully updated!",
            'redirect' => route('admin.home.index')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        if ($project->delete()) {
            return response([
                'message' => "The project have been successfully deleted!"
            ], 200);
        }

        return response([
            'message' => "The project could not be deleted... Please try again..."
        ], 500);
    }

    /**
     * Update the cover picture for project
     *
     * @param  Project $project
     * @param  Request $request
     * @return bool|null
     */
    private function updateCoverPicture(Project $project, Request $request)
    {
        if ($request->file('cover')) {
            $image = $request->file('cover');

            $name = $image->getClientOriginalName();
            $image->move(storage_path("app/public/images/project/{$project->id}"), $name);

            if (!$project->update([
                'cover' => "/storage/images/project/{$project->id}/{$name}"
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
