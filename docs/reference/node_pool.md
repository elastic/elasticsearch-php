---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/node_pool.html
---

# Node Pool [node_pool]

The node pool is a component of [elastic-transport-php](https://github.com/elastic/elastic-transport-php) library used by elasticsearch-php.

This component is responsible for maintaining the current list of nodes. Theoretically, nodes are either dead or alive. However, in the real world, things are never so clear. Nodes are sometimes in a gray-zone of *"probably dead but not confirmed"*, *"timed-out but unclear why"* or *"recently dead but now alive"*. The job of the node pool is to manage this set of unruly connections and try to provide the best behavior to the client.

If a node pool is unable to find an alive node to query against, it returns a `NoNodeAvailableException`.

By default, the number of retries is equal to the number of nodes in your cluster. For example, your cluster may have 10 nodes. You execute a request and 9 out of the 10 nodes fail due to connection timeouts. The tenth node succeeds and the query executes. The first nine nodes are marked dead and their "dead" timers begin ticking.

When the next request is sent to the client, nodes 1-9 are still considered "dead", so they are skipped. The request is sent to the only known alive node (#10), if this node fails, a `NoNodesAvailableException` is returned.

The `SimpleNodePool` is the default node pool algorithm. It uses the following default values: RoundRobin as `SelectorInterface` and NoResurrect as `ResurrectInterface`.

The Round-robin algorithm select the nodes in order, from the first node in the array to the latest. When arrived to the latest nodes, it will start again from the first.

::::{note}
The order of the nodes is randomized at runtime to maximize the usage of all the hosts.
::::


The `NoResurrect` option does not try to resurrect the node that has been marked as dead. If you want, you can specify the `ElasticsearchResurrect` class to check if a node that was dead is online again (resurrected).

You can use the following configuration to enable the `ElasticsearchResurrect` class:

```php
use Elastic\Transport\NodePool\Resurrect\ElasticsearchResurrect;
use Elastic\Transport\NodePool\Selector\RoundRobin;
use Elastic\Transport\NodePool\SimpleNodePool;

$nodePool = new SimpleNodePool(
    new RoundRobin(),
    new ElasticsearchResurrect()
);

$transport = TransportBuilder::create()
    ->setHosts(['localhost:9200'])
    ->setNodePool($nodePool)
    ->build();
```


### Using a custom NodePool, Selector and Resurrect [_using_a_custom_nodepool_selector_and_resurrect]

If you want you can implement your custom node pool algorithm. We provided a [NodePoolInterface](https://github.com/elastic/elastic-transport-php/blob/master/src/NodePool/NodePoolInterface.php)

You can also customize the Selector and the Resurrect components of the node pool. You can use the following interfaces for the implementation:

* [SelectorInterface](https://github.com/elastic/elastic-transport-php/blob/master/src/NodePool/Selector/SelectorInterface.php)
* [ResurrectInterface](https://github.com/elastic/elastic-transport-php/blob/master/src/NodePool/Resurrect/ResurrectInterface.php)

For more information about the Node Pool you can read the [elastic-transport-php documentation](https://github.com/elastic/elastic-transport-php/blob/master/README.md).


## Building the client from a configuration hash [config-hash]

To help ease automated building of the client, all configurations can be provided in a setting hash instead of calling the individual methods directly. This functionality is exposed through the `ClientBuilder::fromConfig()` static method, which accepts an array of configurations and returns a fully built client.

Array keys correspond to the method name, for example `retries` key corresponds to `setRetries()` method.

```php
$params = [
    'hosts' => [
        'localhost:9200'
    ],
    'retries' => 2
];
$client = ClientBuilder::fromConfig($params);
```

Unknown parameters throw an exception, to help the user find potential problems. If this behavior is not desired (for example, you are using the hash for other purposes), you can set `$quiet = true` in fromConfig() to silence the exceptions.

```php
$params = [
    'hosts' => [
        'localhost:9200'
    ],
    'retries' => 2,
    'imNotReal' => 5
];

// Set $quiet to true to ignore the unknown `imNotReal` key
$client = ClientBuilder::fromConfig($params, true);
```

