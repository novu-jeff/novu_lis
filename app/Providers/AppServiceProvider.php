<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\LiveSession;

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
        View::composer('components.sidebar', function ($view) {
            $hasLiveStream = LiveSession::where('key', 'live_session_url')
                ->whereNotNull('value')
                ->where('value', '!=', '')
                ->exists();

            $view->with('hasLiveStream', $hasLiveStream);
        });
    }
}
