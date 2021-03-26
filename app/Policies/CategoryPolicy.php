<?php

namespace App\Policies;

use App\Categorys;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * @param  \App\Categorys  $categorys
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermission(config('permission.action.category.list-category'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        return $user->checkPermission(config('permission.action.category.add-category'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorys  $categorys
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermission(config('permission.action.category.edit-category'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorys  $categorys
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermission(config('permission.action.category.deleted-category'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorys  $categorys
     * @return mixed
     */
    public function restore(User $user, Categorys $categorys)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Categorys  $categorys
     * @return mixed
     */
    public function forceDelete(User $user, Categorys $categorys)
    {
        //
    }
}
