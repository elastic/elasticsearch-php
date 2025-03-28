---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/namespaces.html
---

# Namespaces [namespaces]

The client has a number of "namespaces", which generally expose administrative functionality. The namespaces correspond to the various administrative endpoints in {{es}}. This is a complete list of namespaces:

| Namespace | Functionality |
| --- | --- |
| `asyncSearch()` | Provide asyncronous search |
| `autoscaling()` | Autoscaling features |
| `cat()` | Compact and aligned text (CAT), mainly for terminal |
| `ccr()` | Cross-cluster replication operations |
| `cluster()` | Cluster-centric stats and info |
| `danglingIndices()` | Dangling indices management |
| `enrich()` | Enrich policy management |
| `eql()` | Event Query Language |
| `features()` | Manage features provided by Elasticsearch and plugins |
| `fleet()` | Fleet’s use of Elasticsearch (experimental) |
| `graph()` | Graph explore for documents and terms |
| `ilm()` | Index lifecycle management (ILM) |
| `indices()` | Index-centric stats and info |
| `ingest()` | Ingest pipelines and processors |
| `license()` | License management |
| `logStash()` | Manage pipelines used by Logstash Central Management |
| `migration()` | Designed for indirect use by Kibana’s Upgrade Assistant |
| `ml()` | Machine learning features |
| `monitoring()` | Monitoring features |
| `monitoring()` | Monitoring features |
| `nodes()` | Node-centric stats and info |
| `rollup()` | Rollup features |
| `searchableSnapshots()` | Searchable snapshots operations |
| `security()` | Security features |
| `shutdown()` | Prepare nodes for temporary or permanent shutdown |
| `slm()` | Snapshot lifecycle management (SLM) |
| `snapshot()` | Methods to snapshot/restore your cluster and indices |
| `sql()` | Run SQL queries on Elasticsearch indices and data streams |
| `ssl()` | SSL certificate management |
| `tasks()` | Task management |
| `textStructure()` | Finds the structure of text |
| `transform()` | Transform features |
| `watcher()` | Watcher create actions based on conditions |
| `xpack()` | Retrieves information about the installed X-Pack features |

Some methods are available in several different namespaces, which give you the same information but grouped into different contexts. To see how these namespaces work, let’s look at the `_stats` output:

```php
$client = ClientBuilder::create()->build();

// Index Stats
// Corresponds to curl -XGET localhost:9200/_stats
$response = $client->indices()->stats();

// Node Stats
// Corresponds to curl -XGET localhost:9200/_nodes/stats
$response = $client->nodes()->stats();

// Cluster Stats
// Corresponds to curl -XGET localhost:9200/_cluster/stats
$response = $client->cluster()->stats();
```

​<br>

As you can see, the same `stats()` call is made through three different namespaces. Sometimes the methods require parameters. These parameters work just like any other method in the library.

For example, we can requests index stats about a specific index, or multiple indices:

```php
$client = ClientBuilder::create()->build();

// Corresponds to curl -XGET localhost:9200/my_index/_stats
$params['index'] = 'my_index';
$response = $client->indices()->stats($params);

// Corresponds to curl -XGET localhost:9200/my_index1,my_index2/_stats
$params['index'] = ['my_index1', 'my_index2'];
$response = $client->indices()->stats($params);
```

​<br>

The following example shows how you can add an alias to an existing index:

```php
$params['body'] = [
    'actions' => [
        [
            'add' => [
                'index' => 'myindex',
                'alias' => 'myalias'
            ]
        ]
    ]
];
$client->indices()->updateAliases($params);
```

Notice how both the `stats` calls and the `updateAliases` took a variety of parameters, each according to what the particular API requires. The `stats` API only requires an index name(s), while the `updateAliases` requires a body of actions.

