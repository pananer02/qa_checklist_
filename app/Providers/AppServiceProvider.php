<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;


class AppServiceProvider extends ServiceProvider
{
      /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     // ลงทะเบียน 'role' middleware
    //     Route::aliasMiddleware('role', RoleMiddleware::class);
    // }
}
