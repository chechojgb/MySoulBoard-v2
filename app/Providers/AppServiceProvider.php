<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('hasrole', function (...$roleIds) {
            $user = Auth::user();
        
            if (!$user) return false;
        
            // Verifica si el usuario tiene alguno de los role_id
            return $user->areaRoles->pluck('role_id')->intersect($roleIds)->isNotEmpty();
        });
    }
}
