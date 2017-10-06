# Laravel BigQuery

[![Latest Version](https://img.shields.io/github/release/schulzefelix/laravel-bigquery.svg?style=flat-square)](https://github.com/schulzefelix/laravel-bigquery/releases)
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]
[![StyleCI](https://styleci.io/repos/98615788/shield)](https://styleci.io/repos/98615788)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Using this package you can easily interact with the Google BigQuery API.

## Install

This package can be installed through Composer.

``` bash
$ composer require schulzefelix/laravel-bigquery
```

In Laravel 5.5 the package will autoregister the service provider. In Laravel 5.4 you must install this service provider.
```php
// config/app.php
'providers' => [
    ...
    SchulzeFelix\BigQuery\BigQueryServiceProvider::class,
    ...
];
```

In Laravel 5.5 the package will autoregister the facade. In Laravel 5.4 you must install the facade manually.

```php
// config/app.php
'aliases' => [
    ...
    'BigQuery' => SchulzeFelix\BigQuery\BigQueryFacade::class,
    ...
];
```


Optionally, you can publish the config file of this package with this command:

``` bash
php artisan vendor:publish --provider="SchulzeFelix\BigQuery\BigQueryServiceProvider"
```

The following config file will be published in `config/bigquery.php`

```php
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
```




## Usage

This package just initialize the BigQuery connection, you can use every method like in Google's API.
You can use the provided Facade or retrieve the it from the IoC Container.
```php
BigQuery::apiMethod();
 
app('bigquery')->apiMethod();
```


Here are two basic example to create a dataset and check for existence of a table
### Create Dataset

```php
$dataset = BigQuery::createDataset('myNewDataSet');
```

### Check Existence Of A Table

```php
BigQuery::dataset(myNewDataSet)->table('aTable')->exists());
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email githubissues@schulze.co instead of using the issue tracker.

## Credits

- [Felix Schulze][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/schulzefelix/laravel-bigquery.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/schulzefelix/laravel-bigquery/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/schulzefelix/laravel-bigquery.svg?style=flat-square
[ico-code-quality]: https://scrutinizer-ci.com/g/schulzefelix/laravel-bigquery/badges/quality-score.png?b=master
[ico-downloads]: https://img.shields.io/packagist/dt/schulzefelix/laravel-bigquery.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/schulzefelix/laravel-bigquery
[link-travis]: https://travis-ci.org/schulzefelix/laravel-bigquery
[link-scrutinizer]: https://scrutinizer-ci.com/g/schulzefelix/laravel-bigquery/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/schulzefelix/laravel-bigquery
[link-downloads]: https://packagist.org/packages/schulzefelix/laravel-bigquery
[link-author]: https://github.com/schulzefelix
[link-contributors]: ../../contributors
