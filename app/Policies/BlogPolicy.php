<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any projects.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function view(User $user, Blog $blog)
    {
        return true;
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function restore(User $user, Blog $blog)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog  $blog
     * @return mixed
     */
    public function forceDelete(User $user, Blog $blog)
    {
        return true;
    }
}
