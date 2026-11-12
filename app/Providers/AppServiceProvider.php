<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        /*
         * Do not use request() during artisan commands.
         * Artisan has no HTTP request, so cache:clear/config:clear fails.
         */
        if ($this->app->runningInConsole()) {
            return;
        }

        $request = request();

        if ($request) {
            $assetUrl = $request->getSchemeAndHttpHost();
            config(['app.asset_url' => $assetUrl]);
        }
    }
}