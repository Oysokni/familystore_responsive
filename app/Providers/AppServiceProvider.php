<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        //composer
        View::composer(
            'layouts.front', 'App\Composers\FrontComposer'
        );
        
        if (config('app.redirect_https')) {
            $url->forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //menu facade
        $this->app->bind('lixil-menu', '\App\Facades\Menu');

        if(config('app.redirect_https')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
}
