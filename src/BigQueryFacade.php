<?php

namespace SchulzeFelix\BigQuery;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SchulzeFelix\BigQuery\BigQuery
 */
class BigQueryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bigquery';
    }
}
