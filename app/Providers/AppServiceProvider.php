<?php

namespace App\Providers;

use App\Http\Interfaces\PhotoServiceInterface;
use App\Http\Services\PhotoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(TestServiceInterface::class, TestService::class);
        
        $this->app->bind(PhotoServiceInterface::class, PhotoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
