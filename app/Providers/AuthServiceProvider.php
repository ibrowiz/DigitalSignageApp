<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;
use Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         if (Schema::hasTable('permissions')) 
            {

                foreach ($this->getPermissions() as $permission) 

                {

                        Gate::define(trim($permission->name), function ($user) use ($permission) {

                         $roles = $permission->roles;
                         foreach ($roles as $role) 
                         {
                            

                            if ( $user->hasRole('name', $role->name) ) 
                                {
                                     return true;
                                }

                        }

                            return false;
                        });

        
                }
            }

            Gate::define('admin.access', function($user){

                if($user->super_admin == 1){
                    return true;
                }
                return false;
            });

    }

     function getPermissions() 
        {
            return Permission::with('roles')->get();
        }
}
