---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/search_operations.html
---

# Search operations [search_operations]

Well…​it isn’t called {{es}} for nothing! Let’s talk about search operations in the client.

The client gives you full access to every query and parameter exposed by the REST API, following the naming scheme as much as possible. Let’s look at a few examples so you can become familiar with the syntax.


## Match query [_match_query]

Here is a standard curl for a match query:

```shell
curl -XGET 'localhost:9200/my_index/_search' -d '{
    "query" : {
        "match" : {
            "testField" : "abc"
        }
    }
}'
```

​<br>

And here is the same query constructed in the client:

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

$results = $client->search($params);
```

​<br>

Notice how the structure and layout of the PHP array is identical to that of the JSON request body. This makes it very simple to convert JSON examples into PHP. A quick method to check your PHP array (for more complex examples) is to encode it back to JSON and check it:

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

print_r(json_encode($params['body']));


{"query":{"match":{"testField":"abc"}}}
```

​<br>

::::{admonition} Using Raw JSON
Sometimes it is convenient to use raw JSON for testing purposes, or when migrating from a different system. You can use raw JSON as a string in the body, and the client detects this automatically:

```php
$json = '{
    "query" : {
        "match" : {
            "testField" : "abc"
        }
    }
}';

$params = [
    'index' => 'my_index',
    'body'  => $json
];

$results = $client->search($params);
```

::::


​<br>

Search results follow the same format as {{es}} search response, the only difference is that the JSON response is serialized back into PHP arrays. Working with the search results is as simple as iterating over the array values:

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

$results = $client->search($params);

$milliseconds = $results['took'];
$maxScore     = $results['hits']['max_score'];

$score = $results['hits']['hits'][0]['_score'];
$doc   = $results['hits']['hits'][0]['_source'];
```

​<br>


## Bool Queries [_bool_queries]

Bool queries can be easily constructed using the client. For example, this query:

```shell
curl -XGET 'localhost:9200/my_index/_search' -d '{
    "query" : {
        "bool" : {
            "must": [
                {
                    "match" : { "testField" : "abc" }
                },
                {
                    "match" : { "testField2" : "xyz" }
                }
            ]
        }
    }
}'
```

​<br>

Would be structured like this (note the position of the square brackets):

```php
$params = [
    'index' => 'my_index',
    'body'  => [
        'query' => [
            'bool' => [
                'must' => [
                    [ 'match' => [ 'testField' => 'abc' ] ],
                    [ 'match' => [ 'testField2' => 'xyz' ] ],
                ]
            ]
        ]
    ]
];

$results = $client->search($params);
```

​<br>

Notice that the `must` clause accepts an array of arrays. This is serialized into an array of JSON objects internally, so the final resulting output is identical to the curl example. For more details about arrays and objects in PHP, see [Dealing with JSON Arrays and Objects in PHP](/reference/php_json_objects.md).


## A more complicated example [_a_more_complicated_example]

Let’s construct a slightly more complicated example: a boolean query that contains both a filter and a query. This is a very common activity in {{es}} queries, so it will be a good demonstration.

The curl version of the query:

```shell
curl -XGET 'localhost:9200/my_index/_search' -d '{
    "query" : {
        "bool" : {
            "filter" : {
                "term" : { "my_field" : "abc" }
            },
            "should" : {
                "match" : { "my_other_field" : "xyz" }
            }
        }
    }
}'
```

​<br>

And in PHP:

```php
$params = [
    'index' => 'my_index',
    'body'  => [
        'query' => [
            'bool' => [
                'filter' => [
                    'term' => [ 'my_field' => 'abc' ]
                ],
                'should' => [
                    'match' => [ 'my_other_field' => 'xyz' ]
                ]
            ]
        ]
    ]
];


$results = $client->search($params);
```

​<br>


## Scrolling [_scrolling]

The scrolling functionality of {{es}} is used to paginate over many documents in a bulk manner, such as exporting all the documents belonging to a single user. It is more efficient than regular search because it doesn’t need to maintain an expensive priority queue ordering the documents.

Scrolling works by maintaining a "point in time" snapshot of the index which is then used to page over. This window allows consistent paging even if there is background indexing/updating/deleting. First, you execute a search request with `scroll` enabled. This returns a "page" of documents, and a `scroll_id` which is used to continue paginating through the hits.

More details about scrolling can be found in the [reference documentation](elasticsearch://reference/elasticsearch/rest-apis/paginate-search-results.md#scroll-search-results).

This is an example which can be used as a template for more advanced operations:

```php
$client = ClientBuilder::create()->build();
$params = [
    'scroll' => '30s',          // how long between scroll requests. should be small!
    'size'   => 50,             // how many results *per shard* you want back
    'index'  => 'my_index',
    'body'   => [
        'query' => [
            'match_all' => new \stdClass()
        ]
    ]
];

// Execute the search
// The response will contain the first batch of documents
// and a scroll_id
$response = $client->search($params);

// Now we loop until the scroll "cursors" are exhausted
while (isset($response['hits']['hits']) && count($response['hits']['hits']) > 0) {

    // **
    // Do your work here, on the $response['hits']['hits'] array
    // **

    // When done, get the new scroll_id
    // You must always refresh your _scroll_id!  It can change sometimes
    $scroll_id = $response['_scroll_id'];

    // Execute a Scroll request and repeat
    $response = $client->scroll([
        'body' => [
            'scroll_id' => $scroll_id,  //...using our previously obtained _scroll_id
            'scroll'    => '30s'        // and the same timeout window
        ]
    ]);
}
```

