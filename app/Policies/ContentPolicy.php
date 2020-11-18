<?php

namespace App\Policies;

use App\Domain\Permissions\CertifyUser;
use App\Models\Content;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $check = new CertifyUser();
        return  $check->checkPermission('view-content'); 
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Content  $content
     * @return mixed
     */
    public function view(User $user, Content $content)
    {
        return $user->id == $content->user_id; 
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $check = new CertifyUser();
        return $user && $check->checkPermission('create-content'); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Content  $content
     * @return mixed
     */
    public function update(User $user, Content $content)
    {
        return $user->id == $content->user_id; 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Content  $content
     * @return mixed
     */
    public function delete(User $user, Content $content)
    {
        return $user->id == $content->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Content  $content
     * @return mixed
     */
    public function restore(User $user, Content $content)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Content  $content
     * @return mixed
     */
    public function forceDelete(User $user, Content $content)
    {
        //
    }
}
