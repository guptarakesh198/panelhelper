<?php

namespace Guptarakesh198\Panelhelper;

use Illuminate\Support\ServiceProvider;
use Guptarakesh198\Panelhelper\Console\Commands\PanelHelperGenerateScreen;
use Guptarakesh198\Panelhelper\Http\Middleware\PanelHelperMiddleware;

class PanelHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->loadViewsFrom(__DIR__.'/../views', 'panelhelper');

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    PanelHelperGenerateScreen::class,
                ],
            );
        }

        app('router')->pushMiddlewareToGroup('checkpanellogin', PanelHelperMiddleware::class);

    }
}
