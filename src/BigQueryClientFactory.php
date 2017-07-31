<?php

namespace SchulzeFelix\BigQuery;

use Google\Cloud\BigQuery\BigQueryClient;
use Madewithlove\IlluminatePsrCacheBridge\Laravel\CacheItemPool;

class BigQueryClientFactory
{
    public static function createForConfig(array $bigQueryConfig): BigQueryClient
    {
        $clientConfig = array_merge([
            'projectId' => $bigQueryConfig['project_id'],
            'keyFilePath' => $bigQueryConfig['application_credentials'],
            'authCache' => self::configureCache($bigQueryConfig['auth_cache_store']),
        ], array_get($bigQueryConfig, 'client_options', []));

        return new BigQueryClient($clientConfig);
    }

    protected static function configureCache($cacheStore)
    {
        $store = \Cache::store($cacheStore);

        $cache = new CacheItemPool($store);

        return $cache;
    }
}
