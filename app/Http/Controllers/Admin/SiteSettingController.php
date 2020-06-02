<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('viewAny', SiteSetting::class);

        $settings = SiteSetting::query()
            ->orderBy('created_at', 'DESC')
            ->paginate(25);

        return  view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', SiteSetting::class);
        return  view('admin.setting.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SiteSetting $setting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(SiteSetting $setting)
    {
        $this->authorize('update', $setting);
        return  view('admin.setting.edit', compact('setting'));
    }
}
