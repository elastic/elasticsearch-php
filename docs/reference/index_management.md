---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index_management.html
---

# Index management operations [index_management]

Index management operations allow you to manage the indices in your {{es}} cluster, such as creating, deleting and updating indices and their mappings/settings.


### Create an index [_create_an_index]

The index operations are all contained under a distinct namespace, separated from other methods that are on the root client object. As an example, let’s create a new index:

```php
$client = ClientBuilder::create()->build();
$params = [
    'index' => 'my_index'
];

// Create the index
$response = $client->indices()->create($params);
```

​<br>

You can specify any parameters that would normally be included in a new index creation API. All parameters that would normally go in the request body are located in the *body* parameter:

```php
$client = ClientBuilder::create()->build();
$params = [
    'index' => 'my_index',
    'body' => [
        'settings' => [
            'number_of_shards' => 3,
            'number_of_replicas' => 2
        ],
        'mappings' => [
            '_source' => [
                'enabled' => true
            ],
            'properties' => [
                'first_name' => [
                    'type' => 'keyword'
                ],
                'age' => [
                    'type' => 'integer'
                ]
            ]
        ]
    ]
];


// Create the index with mappings and settings now
$response = $client->indices()->create($params);
```

​<br>


### Create an index (advanced example) [_create_an_index_advanced_example]

This is a more complicated example of creating an index, showing how to define analyzers, tokenizers, filters and index settings. Although essentially the same as the previous example, the more complicated example can be helpful for "real world" usage of the client since this particular syntax is easy to mess up.

```php
$params = [
    'index' => 'reuters',
    'body' => [
        'settings' => [ <1>
            'number_of_shards' => 1,
            'number_of_replicas' => 0,
            'analysis' => [ <2>
                'filter' => [
                    'shingle' => [
                        'type' => 'shingle'
                    ]
                ],
                'char_filter' => [
                    'pre_negs' => [
                        'type' => 'pattern_replace',
                        'pattern' => '(\\w+)\\s+((?i:never|no|nothing|nowhere|noone|none|not|havent|hasnt|hadnt|cant|couldnt|shouldnt|wont|wouldnt|dont|doesnt|didnt|isnt|arent|aint))\\b',
                        'replacement' => '~$1 $2'
                    ],
                    'post_negs' => [
                        'type' => 'pattern_replace',
                        'pattern' => '\\b((?i:never|no|nothing|nowhere|noone|none|not|havent|hasnt|hadnt|cant|couldnt|shouldnt|wont|wouldnt|dont|doesnt|didnt|isnt|arent|aint))\\s+(\\w+)',
                        'replacement' => '$1 ~$2'
                    ]
                ],
                'analyzer' => [
                    'reuters' => [
                        'type' => 'custom',
                        'tokenizer' => 'standard',
                        'filter' => ['lowercase', 'stop', 'kstem']
                    ]
                ]
            ]
        ],
        'mappings' => [ <3>
            'properties' => [
                'title' => [
                    'type' => 'text',
                    'analyzer' => 'reuters',
                    'copy_to' => 'combined'
                ],
                'body' => [
                    'type' => 'text',
                    'analyzer' => 'reuters',
                    'copy_to' => 'combined'
                ],
                'combined' => [
                    'type' => 'text',
                    'analyzer' => 'reuters'
                ],
                'topics' => [
                    'type' => 'keyword'
                ],
                'places' => [
                    'type' => 'keyword'
                ]
            ]
        ]
    ]
];
$client->indices()->create($params);
```

1. The top level `settings` contains config about the index (# of shards, etc) as well as analyzers.
2. `analysis` is nested inside of `settings`, and contains tokenizers, filters, char filters and analyzers.
3. `mappings` is another element nested inside of `settings`, and contains the mappings for various types.



### Delete an index [_delete_an_index]

Deleting an index is very simple:

```php
$params = ['index' => 'my_index'];
$response = $client->indices()->delete($params);
```

​<br>


## PUT Settings API [_put_settings_api]

The PUT Settings API allows you to modify any index setting that is dynamic:

```php
$params = [
    'index' => 'my_index',
    'body' => [
        'settings' => [
            'number_of_replicas' => 0,
            'refresh_interval' => -1
        ]
    ]
];

$response = $client->indices()->putSettings($params);
```

​<br>


### GET Settings API [_get_settings_api]

The GET Settings API shows you the currently configured settings for one or more indices:

```php
// Get settings for one index
$params = ['index' => 'my_index'];
$response = $client->indices()->getSettings($params);

// Get settings for several indices
$params = [
    'index' => [ 'my_index', 'my_index2' ]
];
$response = $client->indices()->getSettings($params);
```

​<br>


### PUT Mappings API [_put_mappings_api]

The PUT Mappings API allows you to modify or add to an existing index’s mapping.

```php
// Set the index and type
$params = [
    'index' => 'my_index',
    'body' => [
        '_source' => [
            'enabled' => true
        ],
        'properties' => [
            'first_name' => [
                'type' => 'text',
                'analyzer' => 'standard'
            ],
            'age' => [
                'type' => 'integer'
            ]
        ]
    ]
];

// Update the index mapping
$client->indices()->putMapping($params);
```

​<br>


### GET Mappings API [_get_mappings_api]

The GET Mappings API returns the mapping details about your indices. Depending on the mappings that you wish to retrieve, you can specify one of more indices:

```php
// Get mappings for all indices
$response = $client->indices()->getMapping();

// Get mappings in 'my_index'
$params = ['index' => 'my_index'];
$response = $client->indices()->getMapping($params);

// Get mappings for two indices
$params = [
    'index' => [ 'my_index', 'my_index2' ]
];
$response = $client->indices()->getMapping($params);
```

​<br>


### Other APIs in the indices namespace [_other_apis_in_the_indices_namespace]

There are a number of other APIs in the indices namespace that allow you to manage your {{es}} indices (add/remove templates, flush segments, close indices, etc).

If you use an IDE with autocompletion, you should be able to easily explore the indices namespace by typing:

```php
$client->indices()->
```

And perusing the list of available methods. Alternatively, browsing the `\Elasticsearch\Namespaces\Indices.php` file shows you the full list of available method calls (as well as parameter lists in the comments for each method).

