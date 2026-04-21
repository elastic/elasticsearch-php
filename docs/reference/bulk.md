# Bulk ingest [bulk-ingest]

The Bulk API can be cumbersome to use directly, due to its payload formatting
requirements. The PHP client includes a bulk helper function with a simplified
interface.

With the bulk helper, the application has to provide a generator or iterable
that yields the individual bulk actions. The helper then formats and submits
the bulk request, optionally splitting the data into chunks based on maximum
number of actions or payload size.

The following example submits a bulk request that indexes three documents:

```php
use Elastic\Elasticsearch\Helper\Bulk;

function get_next_document()
{
    yield Bulk::index_action([
        'title' => 'document 1 title',
        'body' => 'document 1 body',
    ]);
    yield Bulk::index_action([
        'title' => 'document 2 title',
        'body' => 'document 2 body',
    ]);
    yield Bulk::index_action([
        'title' => 'document 3 title',
        'body' => 'document 3 body',
    ]);
}

Bulk::bulk($client, 'my_index', get_next_document())
```

## The bulk helper function

The bulk helper can be called as follows:

```php
use Elastic\Elasticsearch\Helper\Bulk;

$response = Bulk::bulk($client, $index, $actions, $stats_only = false, $chunk_size = 500, $max_chunk_bytes = 100 * 1024 * 1024);
```

This function has three required arguments:

- `$client` is the client to use to submit Bulk API requests,
- `$index` is the default index that actions will be applied to,
- `$actions` is the iterable that yields the bulk actions, normally implemented
   as a generator.

The `$stats_only` optional argument controls whether details of each individual
operation are included in the response. A value of `true` can be passed to only
return total amount of operations processed and count of errors.

The two optional arguments, `$chunk_size` and`$max_chunk_bytes`, determine when
a Bulk API request is issued. The helper accumulates actions and submits a Bulk
API request when the action count reaches `$chunk_size` or the payload size
reaches `$max_chunk_bytes`, whichever happens first. The application can
trigger a Bulk API request to be sent at specific times by yielding a `flush`
action from its generator.

The return value of the `bulk()` function is an array with three elements:

- The total number of actions successfully processed
- The count of errors
- An array with the details of each operation, as returned by the bulk API. Note that
  this array is omitted when the `$stats_only` argument is set to `true`.

## Bulk actions

A Bulk API request includes a list of operations, called *actions*. The Bulk
API supports four different actions: `index`, `create`, `update` and`delete`.
A `flush` action that is specific to this helper is also available.

### Index

The `index` action indexes the specified document. If the document already
exists, it replaces it and increments the version.

```php
yield Bulk::index_action($document, $id = null, $other_metadata = null);
```

The `$document` argument is an array with the document to index. The document's
unique ID can be passed in the `$id` argument, if desired. When `$id` is not
provided, the server generates a unique document ID. Any other attributes of
the index action can be passed in the `$other_metadata` argument.

The following example indexes a document with ID `123`:

```php
yield Bulk::index_action([
    'field1' => 'value1',
], '123');
```

The next example explicitly names the index that the action applies to:

```php
yield Bulk::index_action([
    'field1' => 'value1',
], '123', ['_index' => 'some-other-index']);
```

### Create

The `create` action indexes the specified document if it does not already
exist.

```php
yield Bulk::create_action($document, $id = null, $other_metadata = null);
```

The `$document` argument is an array with the document to create. The
document's unique ID can be passed in the `$id` argument, if desired. When
`$id` is not provided, the server generates a unique document ID. Any other
attributes of the index action can be passed in the `$other_metadata` argument.

The following example creates a document:

```php
yield Bulk::create_action([
    'field1' => 'value1',
]);
```

### Update

The `update` action performs a partial document update.

```php
yield Bulk::update_action($document_updates, $id, $other_metadata = null);
```

The `$document_updates` argument is an array with the desired updates to the
document, formatted as required by the Bulk API
[update action](https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-bulk#operation-bulk-body-application-json-updateaction-object).
The `$id` argument is the ID of the document to update. Any other attributes of
the index action can be passed in the `$other_metadata` argument.

The following example updates the value of field `field2` in the document with
ID `123`:

```php
yield Bulk::update_action([
    'doc' => [
        'field2' => 'value2',
    ],
], '123');
```

### Delete

The `delete` action removes the specified document from the index.

```php
yield Bulk::delete_action($id, $other_metadata = null);
```

The `$id` argument is the ID of the document delete. Any other attributes of
the index action can be passed in the `$other_metadata` argument.

The following example deletes the document with ID `123`:

```php
yield Bulk::delete_action('123');
```

### Flush

The `flush` action instructs the bulk helper to submit a Bulk API request with
all the actions accumulated up to that point. This allows the application to
override the logic that decides when to submit in a Bulk API request based on
count of actions or payload size.

```php
yield Bulk::flush_action();
```
