<img align="right" width="auto" height="auto" src="https://www.elastic.co/static-res/images/elastic-logo-200.png"/>

Elasticsearch PHP client
========================

[![Build status](https://github.com/elastic/elasticsearch-php/workflows/PHP%20test/badge.svg)](https://github.com/elastic/elasticsearch-php/actions) [![Latest Stable Version](https://poser.pugx.org/elasticsearch/elasticsearch/v/stable)](https://packagist.org/packages/elasticsearch/elasticsearch) [![Total Downloads](https://poser.pugx.org/elasticsearch/elasticsearch/downloads)](https://packagist.org/packages/elasticsearch/elasticsearch)

This is the official PHP client for connecting to [Elasticsearch](https://www.elastic.co/elasticsearch/).

## Contents

- [Getting started](#getting-started-)
- [Usage](#usage)
- [Backward Incompatible Changes](#backward-incompatible-changes-)
- [FAQ](#faq-)
- [Contribute](#contribute-)
- [License](#license-)

***

## Getting started 🐣

Using this client assumes that you have an [Elasticsearch](https://www.elastic.co/elasticsearch/) server installed and running.

You can install the client in your project by using composer:

```bash
composer require elasticsearch/elasticsearch
```

After the installation you can use the client as follows:

```php

use Elastic\Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()
    ->setHosts(['localhost:9200'])
    ->build();

// Info API
$response = $client->info();

echo $response['version']['number']; // 8.0.0
```

The `$response` is an object of `Elastic\Elasticsearch\Response\Elasticsearch`
class that implements `ElasticsearchInterface`, PSR-7 [ResponseInterface](https://www.php-fig.org/psr/psr-7/#33-psrhttpmessageresponseinterface)
and [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php).

You can manage the response as PSR-7, as follows:

```php
echo $response->getStatusCode(); // 200
echo (string) $response->getBody(); // Response body in JSON
```

You can access the result of each endpoints using object or array interface,
as follows:

```php
// Access body value as object
echo $response->version->number; // 8.0.0
// Access body value as array
echo $response['version']['number']; // 8.0.0

var_dump($response->asArray());  // response body content as array
var_dump($response->asObject()); // response body content as object
var_dump($response->asString()); // response body as string (JSON)
```

## Usage

To be completed


For more information about the Elasticsearch REST API you can read the official documentation
[here](https://www.elastic.co/guide/en/elasticsearch/reference/current/rest-apis.html).

### Versioning

 This client is versioned and released alongside Elasticsearch server.

 To guarantee compatibility, use the most recent version of this library within the major version of the corresponding Enterprise Search implementation.

 For example, for Elasticsearch `7.16`, use `7.16` of this library or above, but not `8.0`.

## Backward Incompatible Changes :boom:

The 8.0.0 version of `elasticsearch-php` contains a new implementation compared with 7.x.
It supports [PSR-7](https://www.php-fig.org/psr/psr-7/) for HTTP messages and [PSR-18](https://www.php-fig.org/psr/psr-18/)
for HTTP client communications. 

We tried to reduce the BC breaks as much as possible with `7.x` but there are some (big) differences:

- we changed the namespace, now everything is under `Elastic\Elasticsearch`
- we used the [elastic-transport-php](https://github.com/elastic/elastic-transport-php) library for HTTP communications;
- we changed the `Exception` model, using the namespace `Elastic\Elasticsearch\Exception`. All the exceptions extends the
  `ElasticsearchException` interface, as in 7.x
- we changed the response type of each endpoints using an [Elasticsearch](src/Response/Elasticsearch.php) response class.
  This class wraps a a [PSR-7](https://www.php-fig.org/psr/psr-7/) response allowing the access of the body response
  as array or object. This means you can access the API response as in 7.x, no BC break here! :angel:
- we changed the `ConnectionPool` in `NodePool`. The `connection` naming was ambigous since the objects are nodes (hosts)

You can have a look at the [BREAKING_CHANGES](BREAKING_CHANGES.md) file for more information.

## Specific changes:

## FAQ 🔮

### Where do I report issues with the client?

If something is not working as expected, please open an [issue](https://github.com/elastic/elasticsearh-php/issues/new).

### Where else can I go to get help?

You can checkout the [Elastic community discuss forums](https://discuss.elastic.co/).

## Contribute 🚀

We welcome contributors to the project. Before you begin, a couple notes...

+ If you want to contribute to this project you need to subscribe to a [Contributor Agreement](https://www.elastic.co/contributor-agreement).
+ Before opening a pull request, please create an issue to [discuss the scope of your proposal](https://github.com/elastic/elasticsearch-php/issues).
+ If you want to send a PR for version `8.0` please use the `8.0` branch. 
+ Never send PR to `master` unless you want to contribute to the development version of the client (`master` represents the next major version).
+ Each PR should include a **unit test** using [PHPUnit](https://phpunit.de/). If you are not familiar with PHPUnit you can have a look at the [reference](https://phpunit.readthedocs.io/en/9.5/). 

Thanks in advance for your contribution! :heart:

## License 📗

[MIT](LICENSE) © [Elastic](https://www.elastic.co/)
