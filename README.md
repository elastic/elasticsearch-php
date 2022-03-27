<img align="right" width="auto" height="auto" src="https://www.elastic.co/static-res/images/elastic-logo-200.png"/>

Elasticsearch PHP client
========================

[![Build status](https://github.com/elastic/elasticsearch-php/workflows/PHP%20test/badge.svg)](https://github.com/elastic/elasticsearch-php/actions) [![Latest Stable Version](https://poser.pugx.org/elasticsearch/elasticsearch/v/stable)](https://packagist.org/packages/elasticsearch/elasticsearch) [![Total Downloads](https://poser.pugx.org/elasticsearch/elasticsearch/downloads)](https://packagist.org/packages/elasticsearch/elasticsearch)

This is the official PHP client for [Elasticsearch](https://www.elastic.co/elasticsearch/).

## Contents

- [Getting started](#getting-started-)
- [Configuration](#configuration)
  - [Use Elastic Cloud](#use-elastic-cloud)
- [Usage](#usage)
  - [Index a document](#index-a-document)
  - [Search a document](#search-a-document)
  - [Delete a document](#delete-a-document)
- [Versioning](#versioning)
- [Backward Incompatible Changes](#backward-incompatible-changes-)
- [FAQ](#faq-)
- [Contribute](#contribute-)
- [License](#license-)

***

## Getting started 🐣

<<<<<<< HEAD
| Elasticsearch-PHP Branch | PHP Version |
| ----------- | ------------------------ |
| >= 7.16.0, < 8.0.0  | >= 7.3.0, <= 8.1.99 |
| >= 7.12.0, < 8.0.0  | >= 7.3.0, <= 8.0.99 |
| >= 7.11.0, < 8.0.0  | >= 7.1.0, <= 8.0.99 |
| >= 7.0.0,  < 7.11.0 | >= 7.1.0, < 8.0.0 |
| 6.x         | >= 7.0.0, < 8.0.0        |
| 5.x         | >= 5.6.6, < 8.0.0        |
| 2.x         | >= 5.4.0, < 7.0.0        |
| 0.4, 1.x    | >= 5.3.9, < 7.0.0        |

 - If you are using Elasticsearch 7.x, you can use Elasticsearch-PHP 7.x branch.
 - If you are using Elasticsearch 6.x, you can use Elasticsearch-PHP 6.x branch.
 - If you are using Elasticsearch 5.x, you can use Elasticsearch-PHP 6.x branch.
 - If you are using Elasticsearch 1.x or 2.x, prefer using the Elasticsearch-PHP 2.0 branch.  The 1.0 branch is compatible however.
 - If you are using a version older than 1.0, you must install the `0.4` Elasticsearch-PHP branch. Since ES 0.90.x and below is now EOL, the corresponding `0.4` branch will not receive any more development or bugfixes.  Please upgrade.
 - You should never use Elasticsearch-PHP Master branch, as it tracks Elasticsearch master and may contain incomplete features or breaks in backwards compatibility. Only use ES-PHP master if you are developing against ES master for some reason.
=======
Using this client assumes that you have an [Elasticsearch](https://www.elastic.co/elasticsearch/)
server installed and running.

You can install the client in your PHP project using [composer](https://getcomposer.org/):
>>>>>>> 8.0

```bash
composer require elasticsearch/elasticsearch
```

After the installation you can connect to Elasticsearch using the `ClientBuilder`
class. For instance, if your Elasticsearch is running on `localhost:9200`
you can use the following code:

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

This means the `$response` is a [PSR-7](https://www.php-fig.org/psr/psr-7/)
object:

```php
echo $response->getStatusCode(); // 200
echo (string) $response->getBody(); // Response body in JSON
```

and also an "array", meaning you can access the response body as an
associative array, as follows:


```php
echo $response['version']['number']; // 8.0.0

var_dump($response->asArray());  // response body content as array
```

Moreover, you can access the response body as object, string or bool:

```php
echo $response->version->number; // 8.0.0

var_dump($response->asObject()); // response body content as object
var_dump($response->asString()); // response body as string (JSON)
var_dump($response->asBool());   // true if HTTP response code between 200 and 300
```

## Configuration

Elasticsearch 8.0 offers [security by default](https://www.elastic.co/blog/introducing-simplified-elastic-stack-security),
that means it uses [TLS](https://en.wikipedia.org/wiki/Transport_Layer_Security)
for protect the communication between client and server.

In order to configure `elasticsearch-php` for connecting to Elasticsearch 8.0 we
need to have the certificate authority file (CA).

You can install Elasticsearch in different ways, for instance using [Docker](https://www.elastic.co/guide/en/elasticsearch/reference/current/docker.html)
you need to execute the followind command:

```bash
docker pull docker.elastic.co/elasticsearch/elasticsearch:8.0.1
```
Once you have the docker image installed you can execute Elasticsearch,
for instance using a single-node cluster configuration, as follows:

```bash
docker network create elastic
docker run --name es01 --net elastic -p 9200:9200 -p 9300:9300 -it docker.elastic.co/elasticsearch/elasticsearch:8.0.1
```

This command creates an `elastic` Docker network and start Elasticsearch
using the port `9200` (default).

When you run the docker imnage a password is generated for the `elastic` user
and it's printed to the terminal (you might need to scroll back a bit in the terminal
to view it). You have to copy it since we will need to connect to Elasticsearch.

Now that Elasticsearch is running we can get the `http_ca.crt` file certificate.
We need to copy it from the docker instance, using the following command:

```bash
docker cp es01:/usr/share/elasticsearch/config/certs/http_ca.crt .
```

Once we have the `http_ca.crt` certificate and the `password`, copied during the
start of Elasticsearch, we can use it to connect with `elasticsearch-php`
as follows:

```php
$client = ClientBuilder::create()
    ->setHosts(['https://localhost:9200'])
    ->setBasicAuthentication('elastic', 'password copied during Elasticsearch start')
    ->setCABundle('path/to/http_ca.crt')
    ->build();
```

For more information about the Docker configuration of Elasticsearch you can
read the official documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/docker.html).

### Use Elastic Cloud

You can use [Elastic Cloud](https://www.elastic.co/cloud/) as server with `elasticsearch-php`.
Elastic Cloud is the PaaS solution offered by [Elastic](https://www.elastic.co).

For connecting to Elastic Cloud you just need the `Cloud ID` and the `API key`.

You can get the `Cloud ID` from the `My deployment` page of your dashboard (see the red
rectangle reported in the screenshot).

![Cloud ID](docs/images/cloud_id.png)

You can generate an `API key` in the `Management` page under the section `Security`.

![Security](docs/images/create_api_key.png)

When you click on `Create API key` button you can choose a name and set the other
options (eg. restrict privileges, expire after time, etc).

![Choose an API name](docs/images/api_key_name.png)

After this step you will get the `API key`in the API keys page. 

![API key](docs/images/cloud_api_key.png)

**IMPORTANT**: you need to copy and store the `API key`in a secure place, since you will not
be able to view it again in Elastic Cloud.

Once you have collected the `Cloud ID` and the `API key` you can use `elasticsearch-php`
to connect to your Elastic Cloud instance, as follows:

```php
$client = ClientBuilder::create()
    ->setElasticCloudId('insert here the Cloud ID')
    ->setApiKey('insert here the API key')
    ->build();
```

## Usage

The `elasticsearch-php` client offers 400+ endpoints for interacting with Elasticsearch.
A list of all these endpoints is available in the [official documentation](https://www.elastic.co/guide/en/elasticsearch/reference/current/rest-apis.html)
of Elasticsearch APIs.

Here we reported the basic operation that you can perform with the client: index, search and delete.

### Index a document

You can store (index) a JSON document in Elasticsearch using the following code:

```php
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;

$params = [
    'index' => 'my_index',
    'body'  => [ 'testField' => 'abc']
];

try {
  $response = $client->index($params);
} catch (ClientResponseException $e) {
  // manage the 4xx error
} catch (ServerResponseException $e) {
  // manage the 5xx error
} catch (Exception $e) {
  // eg. network error like NoNodeAvailableException
}

print_r($response->asArray());  // response body content as array
```
Elasticsearch stores the `{"testField":"abc"}` JSON document in the `my_index` index.
The `ID` of the document is created automatically by Elasticsearch and stored in
`$response['_id']` field value. If you want to specify an `ID` for the document you need
to store it in `$params['id']`.

You can manage errors using `ClientResponseException` and `ServerResponseException`.
The PSR-7 response is available using `$e->getResponse()` and the HTTP status code is
available using `$e->getCode()`.

### Search a document

Elasticsearch provides many different way to search documents. The simplest search
that you can perform is a [match query](https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query.html),
as follows:

```php
$params = [
    'index' => 'my_index',
    'body'  => [
        'query' => [
            'match' => [
                'testField' => 'abc'
            ]
        ]
    ]
];
$response = $client->search($params);

printf("Total docs: %d\n", $response['hits']['total']['value']);
printf("Max score : %.4f\n", $response['hits']['max_score']);
printf("Took      : %d ms\n", $response['took']);

print_r($response['hits']['hits']); // documents
```

Using Elasticsearch you can perform different query search, for more information we suggest to
read the official documention reported [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/search-your-data.html).

### Delete a document

You can delete a document specifing the `index` name and the `ID` of the document,
as follows:

```php
use Elastic\Elasticsearch\Exception\ClientResponseException;

try {
    $response = $client->delete([
        'index' => 'my_index',
        'id' => 'my_id'
    ]);
} catch (ClientResponseException $e) {
    if ($e->getCode() === 404) {
        // the document does not exist
    }
}
if ($response['acknowledge'] === 1) {
    // the document has been delete
}
```

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
