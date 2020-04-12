<?php

namespace SchulzeFelix\BigQuery;

use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Support\ServiceProvider;
use SchulzeFelix\BigQuery\Exceptions\InvalidConfiguration;

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
}
