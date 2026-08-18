<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind public_path to public_html on cPanel if detected
        $cpanelPublic = realpath(base_path('../../public_html'));
        if ($cpanelPublic && is_dir($cpanelPublic)) {
            $this->app->usePublicPath($cpanelPublic);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale(session('locale', config('app.locale')));
    }
}
