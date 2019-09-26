Laravel request accept json middleware
=====

[![Latest Version](https://img.shields.io/github/release/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](https://github.com/softonic/laravel-request-accept-json-middleware/releases)
[![Software License](https://img.shields.io/badge/license-Apache%202.0-blue.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/softonic/laravel-request-accept-json-middleware/master.svg?style=flat-square)](https://travis-ci.org/softonic/laravel-request-accept-json-middleware)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-request-accept-json-middleware/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](https://scrutinizer-ci.com/g/softonic/laravel-request-accept-json-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](https://packagist.org/packages/softonic/laravel-request-accept-json-middleware)
[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](http://isitmaintained.com/project/softonic/guzzle-oauth2-middleware "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/softonic/laravel-request-accept-json-middleware.svg?style=flat-square)](http://isitmaintained.com/project/softonic/guzzle-oauth2-middleware "Percentage of issues still open")

This middleware adds the ability to automatically add the Accept application/json header to every request if it was not provided.

Installation
-------

Via composer:
```
composer require softonic/laravel-request-accept-json-middleware
```

Documentation
-------

To use the middleware register it in `app/Http/Kernel.php`

```
    protected $middleware
        = [
            ...
            RequestAcceptJson::class,
            ...
        ];
```

From now on the header `Accept: application/json` will be automatically added to every request.

Testing
-------

`softonic/laravel-request-accept-json-middleware` has a [PHPUnit](https://phpunit.de) test suite and a coding style compliance test suite using [PHP CS Fixer](http://cs.sensiolabs.org/).

To run the tests, run the following command from the project folder.

``` bash
$ docker-compose run tests
```

To run interactively using [PsySH](http://psysh.org/):
``` bash
$ docker-compose run psysh
```

License
-------

The Apache 2.0 license. Please see [LICENSE](LICENSE) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/
