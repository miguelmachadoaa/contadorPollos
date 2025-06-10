<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CartRepository;
use App\Models\Destinos;
use App\Models\Paquete;
use Illuminate\Support\Facades\Session;

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

        
    }
}
