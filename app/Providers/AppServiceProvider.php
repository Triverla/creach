<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
     
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //URL::forceScheme('https');
        Schema::defaultStringLength(191);
        // Force SSL in production
    //if ($this->app->environment() == 'production') {
       
        //}
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
   
}
