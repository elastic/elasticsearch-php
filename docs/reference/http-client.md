---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/http-client.html
---

# Configure the HTTP client [http-client]

Elasticsearch-php uses [elastic-transport-php](https://github.com/elastic/elastic-transport-php) for managing the HTTP tranport. This is an HTTP client provided by Elastic that can be configured to use any [PSR-18](https://www.php-fig.org/psr/psr-18/) client library.

Elasticsearch-php uses Guzzle as default HTTP client but you can specify any other client using the `setHttpClient()` function, as follows:

```php
use Symfony\Component\HttpClient\Psr18Client;

$client = ClientBuilder::create()
    ->setHttpClient(new Psr18Client)
    ->build();
```

For instance, in this example we used the [Symfony HTTP Client](https://symfony.com/doc/current/http_client.html).


## Setting the client options [_setting_the_client_options]

If you want you can set the options for a specific PSR-18 client using the `ClientBuilder::setHttpClientOptions($options)` method. The `$options` is an array of key:value options that are specifics to the HTTP client used.

For instance, if you are using Guzzle (default) and you need to use a [proxy](https://docs.guzzlephp.org/en/stable/request-options.html#proxy) you can use the following settings:

```php
$client = ClientBuilder::create()
    ->setHttpClientOptions([
        'proxy' => 'http://localhost:8125'
    ])
    ->build();
```


## Configuring the HTTP async client [_configuring_the_http_async_client]

Elasticsearch-php can works using an asyncronous HTTP client that implements the [HttpAsyncClient](https://github.com/php-http/httplug/blob/master/src/HttpAsyncClient.php) interface of the [HTTPlug](http://httplug.io/) project.

Unfortunately, there is not yet a PSR standard for HTTP async client. We used the HTTPlug interface that is quite simple, as follows:

```php
namespace Http\Client;

use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface; // PSR-7 response

interface HttpAsyncClient
{
    /**
     * @return Promise
     */
    public function sendAsyncRequest(RequestInterface $request);
}
```

You can enable the HTTP async in elasticsearch-php using the `setAsync()` function, as follows:

```php
$client = ClientBuilder::create()
    ->build();

$client->setAsync(true);

$promise = [];
for ($i=0; $i<10; $i++) {
    $promise[] = $client->index([
        'index' => 'my-index'
        'body' => [
            'foo' => base64_encode(random_bytes(24))
        ]
    ]);
}
```

The previous example stores 10 random documents using the HTTP asyncronous feature. The `$promise` response is an object of [promises/a+](https://github.com/php-http/promise/blob/master/src/Promise.php) interface.

A promise represents a single result of an asynchronous operation. It is not necessarily available at a specific time, but should become in the future.

If you need to know the response you can just call the `wait()` function, as follows:

```php
$promise = $client->index([
    'index' => 'my-index',
    'body' => [
        'foo' => 'bar'
    ]
]);
$result = $promise->wait();
print_r($result->asArray());
```

The `wait()` function block the execution until we will recevie the HTTP response from {{es}}.

Instead of waiting, you can handle things asynchronously using the `then()` function, as follows:

```php
use Psr\Http\Message\ResponseInterface; // PSR-7

$promise = $client->index([
    'index' => 'my-index',
    'body' => [
        'foo' => 'bar'
    ]
]);

$promise->then(
    // The success callback
    function (ResponseInterface $response) {
        // Success
        // insert here the logic for managing the response
        return $response;
    },
    // The failure callback
    function (\Exception $exception) {
        // Error
        throw $exception;
    }
);
```

More information about Promise are available at the [HTTPlug documentation page](https://docs.php-http.org/en/latest/components/promise.html).

