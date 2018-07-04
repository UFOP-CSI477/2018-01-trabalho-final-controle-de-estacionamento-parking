<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('admin', function ($user) {
            if($user->nivel == "Administrador"){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('user', function ($user) {
            if($user->nivel == "Usuário"){
                return true;
            }else{
                return false;
            }
        });
        Gate::define('oper', function ($user) {
            if($user->nivel == "Operador"){
                return true;
            }else{
                return false;
            }
        });

    }
}
