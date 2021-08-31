<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* Authorisation  */
        Gate::define('Admin', function () {
            return in_array("users.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('Manager', function () {
            return in_array("users.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('Vondeur', function () {
            return in_array("users.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('Livreur', function () {
            return in_array("users.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('Client', function () {
            return in_array("users.destroy", json_decode(Auth::user()->Role->permissions));
        });


        /* Authorisation Users  */
        Gate::define('users.index', function () {
            return in_array("users.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('users.edit', function () {
            return in_array("users.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('users.create', function () {
            return in_array("users.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('users.destroy', function () {
            return in_array("users.destroy", json_decode(Auth::user()->Role->permissions));
        });

        /* Authorisation Roles  */
        Gate::define('role.index', function () {
            return in_array("role.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('role.edit', function () {
            return in_array("role.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('role.create', function () {
            return in_array("role.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('role.destroy', function () {
            return in_array("role.destroy", json_decode(Auth::user()->Role->permissions));
        });


        /* Authorisation Roles  */
        Gate::define('category.index', function () {
            return in_array("category.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('category.edit', function () {
            return in_array("category.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('category.create', function () {
            return in_array("category.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('category.destroy', function () {
            return in_array("category.destroy", json_decode(Auth::user()->Role->permissions));
        });

        /* Authorisation Roles  */
        Gate::define('products.index', function () {
            return in_array("products.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('products.edit', function () {
            return in_array("products.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('products.create', function () {
            return in_array("products.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('products.destroy', function () {
            return in_array("products.destroy", json_decode(Auth::user()->Role->permissions));
        });

        /* Authorisation Roles  */
        Gate::define('shops.index', function () {
            return in_array("shops.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('shops.edit', function () {
            return in_array("shops.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('shops.create', function () {
            return in_array("shops.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('shops.destroy', function () {
            return in_array("shops.destroy", json_decode(Auth::user()->Role->permissions));
        });

        /* Authorisation Roles  */
        Gate::define('cities.index', function () {
            return in_array("cities.index", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('cities.edit', function () {
            return in_array("cities.edit", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('cities.create', function () {
            return in_array("cities.create", json_decode(Auth::user()->Role->permissions));
        });
        Gate::define('cities.destroy', function () {
            return in_array("cities.destroy", json_decode(Auth::user()->Role->permissions));
        });
    }
}
