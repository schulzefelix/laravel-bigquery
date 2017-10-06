<?php

namespace SchulzeFelix\BigQuery;

use Illuminate\Support\ServiceProvider;
use Google\Cloud\BigQuery\BigQueryClient;
use Laravel\Lumen\Application as LumenApplication;
use SchulzeFelix\BigQuery\Exceptions\InvalidConfiguration;
use Illuminate\Foundation\Application as LaravelApplication;

class BigQueryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/bigquery.php', 'bigquery');

        $bigQueryConfig = config('bigquery');

        $this->app->bind(BigQueryClient::class, function () use ($bigQueryConfig) {
            $this->guardAgainstInvalidConfiguration($bigQueryConfig);

            return BigQueryClientFactory::createForConfig($bigQueryConfig);
        });

        $this->app->alias(BigQueryClient::class, 'bigquery');
    }

    protected function guardAgainstInvalidConfiguration(array $bigQueryConfig = null)
    {
        if (! file_exists($bigQueryConfig['application_credentials'])) {
            throw InvalidConfiguration::credentialsJsonDoesNotExist($bigQueryConfig['application_credentials']);
        }
    }

    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config/bigquery.php');

        if ($this->app instanceof LaravelApplication) {
            $this->publishes([$source => config_path('bigquery.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('bigquery');
        }

        $this->mergeConfigFrom($source, 'bigquery');
    }
}
