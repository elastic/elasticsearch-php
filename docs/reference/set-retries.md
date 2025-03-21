---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/set-retries.html
---

# Set retries [set-retries]

By default, the client will retry `n` times, where `n = number of nodes` in your cluster. A retry is only performed if the operation results in a "hard" exception: connection refusal, connection timeout, DNS lookup timeout, etc. 4xx and 5xx errors are not considered retriable events, since the node returns an operational response.

If you would like to disable retries, or change the number, you can do so with the `setRetries()` method:

```php
$client = ClientBuilder::create()
    ->setRetries(2)
    ->build();
```

When the client runs out of retries, it will throw the last exception that it received. For example, if you have ten alive nodes, and `setRetries(5)`, the client attempts to execute the command up to five times. If all five nodes result in a connection timeout (for example), the client will throw an `NoNodeAvailableException`.

```php
use Elastic\Transport\Exception\NoNodeAvailableException;

$client = ClientBuilder::create()
    ->build();

try {
    $reponse = $client->info();
} catch (NoNodeAvailableException $e) {
    printf("No nodes alive: %s", $e->getMessage());
}
```

