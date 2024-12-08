<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use App\Policies\EditProfilePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        //
        Gate::policy('edit-profile', [EditProfilePolicy::class, 'update']);
    }
}
