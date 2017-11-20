<?php

namespace BinaryCabin\LaravelReporting\Providers;

use Illuminate\Support\ServiceProvider;
use BinaryCabin\LaravelReporting\Reporting;

class LaravelReportingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*$this->publishes([
            __DIR__.'/../Configuration/reporting.php' => config_path('reporting.php')
        ], 'config');*/
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'reporting');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/reporting'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerReporting();
    }

    public function registerReporting(){
        $this->app->bind('reporting',function() {
            return new Reporting();
        });
    }

    public function provides()
    {
        return array('reporting', Reporting::class);
    }



}