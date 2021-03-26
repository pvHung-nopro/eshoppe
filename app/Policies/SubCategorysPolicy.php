<?php

namespace App\Policies;

use App\SubCategorys;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategorysPolicy
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
     * @param  \App\SubCategorys  $subCategorys
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermission(config('permission.action.product.list-subcategory'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermission(config('permission.action.product.add-subcategory'));

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategorys  $subCategorys
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermission(config('permission.action.product.edit-subcategory'));

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategorys  $subCategorys
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermission(config('permission.action.product.deleted-subcategory'));

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategorys  $subCategorys
     * @return mixed
     */
    public function restore(User $user, SubCategorys $subCategorys)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategorys  $subCategorys
     * @return mixed
     */
    public function forceDelete(User $user, SubCategorys $subCategorys)
    {
        //
    }
}
