<?php

namespace App\Providers;

use App\Sugestao;
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

        Gate::define('user-comum', function ($user, Sugestao $sugestao){

            return $user->id == $sugestao->userSugestao->id;
        });

        Gate::define('user-admin', function ($user, Sugestao $sugestao){
            $tipoUser = 'admin';
            return $user->tipo == $tipoUser;
        });

        Gate::define('user-admin-menu', function ($user){
            $tipoUser = 'admin';
            return $user->tipo == $tipoUser;
        });

        Gate::define('minhas-sugestoes', function ($user, Sugestao $sugestao){

            return $user->id == $sugestao->userSugestao->id;
        });

        Gate::define('listar-usuarios', function ($user){
            $admin = 'admin';
            $comum = 'comum';
            $avaliador = 'avaliador';
            
            return $user->tipo == $admin;
        });

        Gate::define('listar-sugestoes', function ($user){
            $admin = 'admin';
            $comum = 'comum';
            $avaliador = 'avaliador';
            
            return $user->tipo == $admin;
        });

        Gate::define('listar-implantadas', function ($user){
            $admin = 'admin';
            $comum = 'comum';
            $avaliador = 'avaliador';
            
            return $user->tipo == $admin || $user->tipo == $avaliador;
        });

        Gate::define('listar-aguardandoAvaliacao', function ($user){
            $admin = 'admin';
            $comum = 'comum';
            $avaliador = 'avaliador';
            
            return $user->tipo == $admin || $user->tipo == $avaliador;
        });


    }
}
