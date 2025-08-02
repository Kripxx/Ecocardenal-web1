<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
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
        URL::forceScheme('https');
        if (env('APP_ENV') !== 'local') {
        
        URL::forceRootUrl(config('app.url'));
    }
        // Ruta personalizada para tus juegos
        Route::middleware('api')
            ->prefix('APIjuego') // Este es el prefijo que estás usando
            ->group(base_path('routes/APIjuego.php'));
    }
}
