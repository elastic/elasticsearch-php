---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/updating_documents.html
---

# Updating documents [updating_documents]

Updating a document allows you to either completely replace the contents of the existing document, or perform a partial update to just some fields (either changing an existing field or adding new fields).


## Partial document update [_partial_document_update]

If you want to partially update a document (for example, change an existing field or add a new one) you can do so by specifying the `doc` in the `body` parameter. This merges the fields in `doc` with the existing document.

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id',
    'body'  => [
        'doc' => [
            'new_field' => 'abc'
        ]
    ]
];

// Update doc at /my_index/_doc/my_id
$response = $client->update($params);
```

​<br>


## Scripted document update [_scripted_document_update]

Sometimes you need to perform a scripted update, such as incrementing a counter or appending a new value to an array. To perform a scripted update, you need to provide a script and usually a set of parameters:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id',
    'body'  => [
        'script' => 'ctx._source.counter += count',
        'params' => [
            'count' => 4
        ]
    ]
];

$response = $client->update($params);
```

​<br>


## Upserts [_upserts]

Upserts are "Update or Insert" operations. This means an upsert attempts to run your update script, but if the document does not exist (or the field you are trying to update doesn’t exist), default values are inserted instead.

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id',
    'body'  => [
        'script' => [
            'source' => 'ctx._source.counter += params.count',
            'params' => [
                'count' => 4
            ],
        ],
        'upsert' => [
            'counter' => 1
        ],
    ]
];

$response = $client->update($params);
```

​<br>

