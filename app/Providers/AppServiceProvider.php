<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;
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
        $this->app->register(FortifyServiceProvider::class);

        //


    }
}
