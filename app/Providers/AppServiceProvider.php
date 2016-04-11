<?php

namespace App\Providers;

use Illuminate\Validation\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Factory $validator)
    {
        require app_path() . '/Http/validators.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
