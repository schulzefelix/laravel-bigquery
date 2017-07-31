<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Credentials
    |--------------------------------------------------------------------------
    |
    | Path to the Service Account Credentials JSON File
    |
    | https://googlecloudplatform.github.io/google-cloud-php/#/docs/google-cloud/v0.35.0/guides/authentication
    |
    */

    'application_credentials' => env('GOOGLE_CLOUD_APPLICATION_CREDENTIALS'),

    /*
    |--------------------------------------------------------------------------
    | Project ID
    |--------------------------------------------------------------------------
    |
    | The Project Name is a user-friendly name,
    | while the Project ID is required by the Google Cloud client libraries to authenticate API requests.
    |
    */

    'project_id' => env('GOOGLE_CLOUD_PROJECT_ID'),

    /*
    |--------------------------------------------------------------------------
    | Client Auth Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the auth cache connection that gets used.
    |
    | Supported: "apc", "array", "database", "file", "memcached", "redis"
    |
    */

    'auth_cache_store' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Client Options
    |--------------------------------------------------------------------------
    |
    | Here you may configure additional parameters that
    | the underlying BigQueryClient will use.
    |
    | Optional parameters: "authCacheOptions", "authHttpHandler", "httpHandler", "retries", "scopes", "returnInt64AsObject"
    */

    'client_options' => [
        'retries' => 3, // Default
    ],
];
