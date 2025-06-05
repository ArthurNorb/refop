<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate; // Descomente se for usar Gates
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy', // Exemplo
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Exemplo de como registrar um Gate:
        // Gate::define('edit-settings', function (User $user) {
        //     return $user->isAdmin();
        // });
    }
}