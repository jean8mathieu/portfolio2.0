<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSetting\StoreRequest;
use App\Http\Requests\SiteSetting\UpdateRequest;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', SiteSetting::class);
        $filteredSettings = [];

        $settings = SiteSetting::query()
            ->where('key', 'like', "%{$request->search}%")
            ->get();

        //Generate the array
        foreach ($settings as $setting) {
            $filteredSettings[] = [
                'text' => $setting->key,
                'value' => $setting->id
            ];
        }

        return response($filteredSettings, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', SiteSetting::class);

        if (SiteSetting::create([
            'key' => $request->key,
            'value' => $request->value
        ])) {
            return response([
                'message' => "The setting was successfully created!",
                'redirect' => route('admin.setting.index')
            ], 200);
        }

        return response([
            'message' => "The setting could not be created... Please try again..."
        ], 500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  SiteSetting $setting
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, SiteSetting $setting)
    {
        $this->authorize('update', $setting);

        if ($setting->update([
            'key' => $request->key,
            'value' => $request->value
        ])) {
            return response([
                'message' => "The setting was successfully updated!",
                'redirect' => route('admin.setting.index')
            ], 200);
        }

        return response([
            'message' => "The setting could not be updated... Please try again..."
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SiteSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $setting)
    {
        $this->authorize('delete', $setting);

        if ($setting->delete()) {
            return response([
                'message' => "The setting have been successfully deleted!"
            ], 200);
        }

        return response([
            'message' => "The setting could not be deleted... Please try again..."
        ], 500);
    }
}
