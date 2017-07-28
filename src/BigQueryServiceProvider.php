<?php

namespace SchulzeFelix\Package;

use Illuminate\Support\ServiceProvider;
use SchulzeFelix\SearchConsole\Exceptions\InvalidConfiguration;

class BigQueryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/bigquery.php' => config_path('bigquery.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/bigquery.php', 'bigquery');

        $bigqueryConfig = config('bigquery');

    }

}
