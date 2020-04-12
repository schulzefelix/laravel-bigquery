<?php

namespace SchulzeFelix\BigQuery\Tests\Integration;

use Orchestra\Testbench\TestCase as Orchestra;
use SchulzeFelix\BigQuery\BigQueryFacade;
use SchulzeFelix\BigQuery\BigQueryServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            BigQueryServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'BigQuery' => BigQueryFacade::class,
        ];
    }
}
