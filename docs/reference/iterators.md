---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/iterators.html
---

# Iterators [iterators]

The PHP client includes helpers for iterating through results by page or by hits.

## Search response iterator [search-response-iterator]

Use the `SearchResponseIterator` to iterate page by page in a search result using [pagination](elasticsearch://reference/elasticsearch/rest-apis/paginate-search-results.md).

Here’s an example:

```php
use Elastic\Elasticsearch\Helper\Iterators\SearchResponseIterator;

$search_params = [
    'scroll'      => '5m', // period to retain the search context
    'index'       => '<name of index>', // here the index name
    'size'        => 100, // 100 results per page
    'body'        => [
        'query' => [
            'match_all' => new StdClass // {} in JSON
        ]
    ]
];
// $client is Elasticsearch\Client instance
$pages = new SearchResponseIterator($client, $search_params);

// Sample usage of iterating over page results
foreach($pages as $page) {
    // do something with hit e.g. copy its data to another index
    // e.g. prints the number of document per page (100)
    echo count($page['hits']['hits']), PHP_EOL;
}
```


### Search hit iterator [search-hit-iterator]

Use the `SearchHitIterator` to iterate in a `SearchResponseIterator` without worrying about [pagination](elasticsearch://reference/elasticsearch/rest-apis/paginate-search-results.md).

Here’s an example:

```php
use Elastic\Elasticsearch\Helper\Iterators\SearchHitIterator;
use Elastic\Elasticsearch\Helper\Iterators\SearchResponseIterator;

$search_params = [
    'scroll'      => '5m', // period to retain the search context
    'index'       => '<name of index>', // here the index name
    'size'        => 100, // 100 results per page
    'body'        => [
        'query' => [
            'match_all' => new StdClass // {} in JSON
        ]
    ]
];
// $client is Elasticsearch\Client instance
$pages = new SearchResponseIterator($client, $search_params);
$hits = new SearchHitIterator($pages);

// Sample usage of iterating over hits
foreach($hits as $hit) {
    // do something with hit e.g. write to CSV, update a database, etc
    // e.g. prints the document id
    echo $hit['_id'], PHP_EOL;
}
```


