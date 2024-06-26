<p align="center">
    <img src="https://github.com/elastic/elasticsearch-py/raw/main/docs/logo-elastic-glyph-color.svg" width="20%" alt="Elastic logo" />
</p>

# Elasticsearch PHP client

[![Build status](https://github.com/elastic/elasticsearch-php/workflows/PHP%20test/badge.svg)](https://github.com/elastic/elasticsearch-php/actions) [![Latest Stable Version](https://poser.pugx.org/elasticsearch/elasticsearch/v/stable)](https://packagist.org/packages/elasticsearch/elasticsearch) [![Total Downloads](https://poser.pugx.org/elasticsearch/elasticsearch/downloads)](https://packagist.org/packages/elasticsearch/elasticsearch)

This is the official PHP client for
[Elasticsearch](https://www.elastic.co/elasticsearch/).

**[Download the latest version of Elasticsearch](https://www.elastic.co/downloads/elasticsearch)**
or
**[sign-up](https://cloud.elastic.co/registration?elektra=en-ess-sign-up-page)**
**for a free trial of Elastic Cloud**.

## Contents

- [Installation](#installation)
- [Connecting](#connecting)
- [Usage](#usage)
- [Versioning](#versioning)
- [Backward Incompatible Changes](#backward-incompatible-changes-boom)
- [Mock the Elasticsearch client](#mock-the-elasticsearch-client)
- [FAQ](#faq-)
- [Contribute](#contribute-)
- [License](#license-)

***

## Installation

Refer to the [Installation section](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_installation)
of the getting started documentation.

## Connecting

Refer to the [Connecting section](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_connecting)
of the getting started documentation.

## Usage

The `elasticsearch-php` client offers 400+ endpoints for interacting with
Elasticsearch. A list of all these endpoints is available in the
[official documentation](https://www.elastic.co/guide/en/elasticsearch/reference/current/rest-apis.html)
of Elasticsearch APIs.

Here we reported the basic operation that you can perform with the client:
index, search and delete.

- [Creating an index](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_creating_an_index)
- [Indexing a document](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_indexing_documents)
- [Getting documents](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_getting_documents)
- [Searching documents](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_searching_documents)
- [Updating documents](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_updating_documents)
- [Deleting documents](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_deleting_documents)
- [Deleting an index](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting-started-php.html#_deleting_an_index)

### Versioning

This client is versioned and released alongside Elasticsearch server.

To guarantee compatibility, use the most recent version of this library within
the major version of the corresponding Enterprise Search implementation.

For example, for Elasticsearch `7.16`, use `7.16` of this library or above, but
not `8.0`.

## Compatibility

The Elasticsearch client is compatible with currently maintained PHP versions.

Language clients are forward compatible; meaning that clients support
communicating with greater or equal minor versions of Elasticsearch without
breaking. It does not mean that the client automatically supports new features
of newer Elasticsearch versions; it is only possible after a release of a new
client version. For example, a 8.12 client version won't automatically support
the new features of the 8.13 version of Elasticsearch, the 8.13 client version
is required for that. Elasticsearch language clients are only backwards
compatible with default distributions and without guarantees made.

| Elasticsearch Version | Elasticsearch-PHP Branch | Supported |
| --------------------- | ------------------------ | --------- |
| main                  | main                     |           |
| 8.x                   | 8.x                      | 8.x       |
| 7.x                   | 7.x                      | 7.17      |

## Backward Incompatible Changes :boom:

The 8.0.0 version of `elasticsearch-php` contains a new implementation compared
with 7.x. It supports [PSR-7](https://www.php-fig.org/psr/psr-7/) for HTTP
messages and [PSR-18](https://www.php-fig.org/psr/psr-18/) for HTTP client
communications.

We tried to reduce the BC breaks as much as possible with `7.x` but there are
some (big) differences:

- we changed the namespace, now everything is under `Elastic\Elasticsearch`
- we used the
  [elastic-transport-php](https://github.com/elastic/elastic-transport-php)
  library for HTTP communications;
- we changed the `Exception` model, using the namespace
  `Elastic\Elasticsearch\Exception`. All the exceptions extends the
  `ElasticsearchException` interface, as in 7.x
- we changed the response type of each endpoints using an
  [Elasticsearch](src/Response/Elasticsearch.php) response class. This class
  wraps a a [PSR-7](https://www.php-fig.org/psr/psr-7/) response allowing the
  access of the body response as array or object. This means you can access the
  API response as in 7.x, no BC break here! :angel:
- we changed the `ConnectionPool` in `NodePool`. The `connection` naming was
  ambigous since the objects are nodes (hosts)

You can have a look at the [BREAKING_CHANGES](BREAKING_CHANGES.md) file for more
information.

## Mock the Elasticsearch client

If you need to mock the Elasticsearch client you just need to mock a
[PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP Client.

For instance, you can use the
[php-http/mock-client](https://github.com/php-http/mock-client) as follows:

```php
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Http\Mock\Client;
use Nyholm\Psr7\Response;

$mock = new Client(); // This is the mock client

$client = ClientBuilder::create()
    ->setHttpClient($mock)
    ->build();

// This is a PSR-7 response
$response = new Response(
    200, 
    [Elasticsearch::HEADER_CHECK => Elasticsearch::PRODUCT_NAME],
    'This is the body!'
);
$mock->addResponse($response);

$result = $client->info(); // Just calling an Elasticsearch endpoint

echo $result->asString(); // This is the body!
```

We are using the `ClientBuilder::setHttpClient()` to set the mock client.
You can specify the response that you want to have using the
`addResponse($response)` function. As you can see the `$response` is a PSR-7
response object. In this example we used the `Nyholm\Psr7\Response` object from
the [nyholm/psr7](https://github.com/Nyholm/psr7) project. If you are using
[PHPUnit](https://phpunit.de/) you can even mock the `ResponseInterface` as
follows:

```php
$response = $this->createMock('Psr\Http\Message\ResponseInterface');
```

**Notice**: we added a special header in the HTTP response. This is the product
check header, and it is required for guarantee that `elasticsearch-php` is
communicating with an Elasticsearch server 8.0+.

For more information you can read the
[Mock client](https://docs.php-http.org/en/latest/clients/mock-client.html)
section of PHP-HTTP documentation.

## FAQ 🔮

### Where do I report issues with the client?

If something is not working as expected, please open an
[issue](https://github.com/elastic/elasticsearch-php/issues/new).

### Where else can I go to get help?

You can checkout the
[Elastic community discuss forums](https://discuss.elastic.co/).

## Contribute 🚀

We welcome contributors to the project. Before you begin, some useful info...

- If you want to contribute to this project you need to subscribe to a
  [Contributor Agreement](https://www.elastic.co/contributor-agreement).
- Before opening a pull request, please create an issue to
  [discuss the scope of your proposal](https://github.com/elastic/elasticsearch-php/issues).
- If you want to send a PR for version `8.0` please use the `8.0` branch, for
  `8.1` use the `8.1` branch and so on.
- Never send PR to `master` unless you want to contribute to the development
  version of the client (`master` represents the next major version).
- Each PR should include a **unit test** using [PHPUnit](https://phpunit.de/).
  If you are not familiar with PHPUnit you can have a look at the
  [reference](https://phpunit.readthedocs.io/en/9.5/).

Thanks in advance for your contribution! :heart:

## License 📗

[MIT](LICENSE) © [Elastic](https://www.elastic.co/)
