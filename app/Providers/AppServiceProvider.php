<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\UrlRepositoryInterface', 
            'App\Repositories\UrlRepository'
        );

      
        $this->app->bind(
            'App\Services\Contracts\UrlServiceInterface', 
            'App\Services\UrlService'
        );    

        $this->app->bind(
            'App\Repositories\Contracts\UrlStatusRepositoryInterface', 
            'App\Repositories\UrlStatusRepository'
        );

      
        $this->app->bind(
            'App\Services\Contracts\UrlStatusServiceInterface', 
            'App\Services\UrlStatusService'
        );    

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
