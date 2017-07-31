<?php

namespace SchulzeFelix\BigQuery\Tests\Integration;

use SchulzeFelix\BigQuery\BigQueryFacade;
use SchulzeFelix\BigQuery\BigQueryServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp()
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