<?php

namespace App\Policies;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiteSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any site settings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the site setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SiteSetting  $setting
     * @return mixed
     */
    public function view(User $user, SiteSetting $setting)
    {
        return true;
    }

    /**
     * Determine whether the user can create site settings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the site setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SiteSetting  $setting
     * @return mixed
     */
    public function update(User $user, SiteSetting $setting)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the site setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SiteSetting  $setting
     * @return mixed
     */
    public function delete(User $user, SiteSetting $setting)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the site setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SiteSetting  $setting
     * @return mixed
     */
    public function restore(User $user, SiteSetting $setting)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the site setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SiteSetting  $setting
     * @return mixed
     */
    public function forceDelete(User $user, SiteSetting $setting)
    {
        return true;
    }
}
