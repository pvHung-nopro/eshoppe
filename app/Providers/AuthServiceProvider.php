<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->permissionCategory();
        $this->permissionProduct();
        $this->permissionSubCategory();
        $this->permissionUser();
        $this->permissionRoles();

        Gate::define('dashborad', function ($user) {

            // return true;
            // dd(config('permission.action.dashborad'));
               return $user->checkPermission('view_dashborad');
        //    dd($user->checkPermission('dashborad'));
            // return $user->dashborad('dashboard');
            // return true;
        });

    }

    public function permissionCategory()
    {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-create', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-deleted', 'App\Policies\CategoryPolicy@delete');
    }

    public function permissionProduct()
    {
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-create', 'App\Policies\ProductPolicy@create');
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product-deleted', 'App\Policies\ProductPolicy@delete');
    }

    public function permissionSubCategory()
    {
        Gate::define('subcategory-list', 'App\Policies\SubCategoryPolicy@view');
        Gate::define('subcategory-create', 'App\Policies\SubCategoryPolicy@create');
        Gate::define('subcategory-edit', 'App\Policies\SubCategoryPolicy@update');
        Gate::define('subcategory-deleted', 'App\Policies\SubCategoryPolicy@delete');

    }

    protected function permissionUser()
    {
        Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-create', 'App\Policies\UserPolicy@create');
        Gate::define('user-edit', 'App\Policies\UserPolicy@update');
        Gate::define('user-deleted', 'App\Policies\UserPolicy@delete');

    }

    protected function permissionRoles()
    {
        Gate::define('roles-list', 'App\Policies\RolesPolicy@view');
        Gate::define('roles-create', 'App\Policies\RolesPolicy@create');
        Gate::define('roles-edit', 'App\Policies\RolesPolicy@update');
        Gate::define('roles-deleted', 'App\Policies\RolesPolicy@delete');
    }



}
