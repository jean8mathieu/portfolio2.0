<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\StoreRequest;
use App\Http\Requests\Experience\UpdateRequest;
use App\Models\Experience;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class ExperienceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Experience::class);

        if ($experience = Experience::create([
            'position' => $request->position,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'started_at' => Carbon::parse($request->started_at)->toDateTimeString(),
            'ended_at' => $request->ended_at ? Carbon::parse($request->ended_at)->toDateTimeString() : null
        ])) {
            return response([
                'message' => "The experience have been created successfully!",
                'redirect' => route('admin.experience.edit', [$experience])
            ], 200);
        }

        return response([
            'message' => "We could not create the experience... Please try again..."
        ], 500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Experience $experience
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, Experience $experience)
    {
        $this->authorize('update', $experience);

        if ($experience->update([
            'position' => $request->position,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'description' => $request->description,
            'markdown_description' => Markdown::convertToHtml($request->description),
            'started_at' => Carbon::parse($request->started_at)->toDateTimeString(),
            'ended_at' => $request->ended_at ? Carbon::parse($request->ended_at)->toDateTimeString() : null
        ])) {
            return response([
                'message' => "The experience have been updated successfully!",
                'redirect' => route('admin.experience.edit', [$experience])
            ], 200);
        }

        return response([
            'message' => "We could not update the experience... Please try again..."
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Experience $experience)
    {
        $this->authorize('delete', $experience);

        if ($experience->delete()) {
            return response([
                'message' => "The experience have been deleted successfully!",
                'redirect' => route('admin.experience.index')
            ], 200);
        }

        return response([
            'message' => "We could not delete the experience... Please try again..."
        ], 500);
    }
}
