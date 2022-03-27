<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


    }

    /**
    * Defined gates to check for user types
    * @return boolean
    */
    public function registerPolicies(){
        Gate::define('admin-only', function($user)
        {
          if($user->role=='Admin')
          {
            return true;
          }
          return false;
        });

        Gate::define('librarian-only', function($user)
        {
          if($user->role ==='Librarian') {
            return true;
          }
          return false;
        });

        Gate::define('teacher-only', function($user)
        {
          if($user->role ==='Teacher')
          {
            return true;
          }
          return false;
        });

        Gate::define('parents-only', function($user)
        {
          if($user->role ==='Parent')
          {
            return true;
          }
          return false;
        });


    }
}
