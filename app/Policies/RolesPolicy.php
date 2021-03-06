<?php

namespace App\Policies;

use App\User;
use App\roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function view(User $user)
    {
        // return true;
        return $user->checkPermission(config('permission.action.roles.list-roles'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return $user->checkPermission(config('permission.action.roles.add-roles'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function update(User $user)
    {
        // return true;
        return $user->checkPermission(config('permission.action.roles.edit-roles'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermission(config('permission.action.roles.deleted-roles'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function restore(User $user, roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function forceDelete(User $user, roles $roles)
    {
        //
    }
}
