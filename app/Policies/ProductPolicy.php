<?php

namespace App\Policies;

use App\Products;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
     * @param  \App\Products  $products
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermission(config('permission.action.product.list-product'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // dd(config('permission.action.product.add-product'));
        return $user->checkPermission(config('permission.action.product.add-product'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermission(config('permission.action.product.edit-product'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermission(config('permission.action.product.deleted-product'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function restore(User $user, Products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Products  $products
     * @return mixed
     */
    public function forceDelete(User $user, Products $products)
    {
        //
    }
}
