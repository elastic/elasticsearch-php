# Bulk ingest [bulk-ingest]

The PHP client includes a helper for the Bulk API, which can be cumbersome
to use directly due to its payload formatting requirements.

With the bulk helper, the application has to provide a generator or iterable
that yields the individual bulk actions. The helper then formats and submits
the bulk request, optionally splitting the data into chunks based on maximum
number of actions or payload size.

The following example submits a bulk request that indexes three new documents:

```php
use Elastic\Elasticsearch\Helper\Bulk;

function get_next_document()
{
    yield Bulk::indexAction([
        'title' => 'document 1 title',
        'body' => 'document 1 body',
    ]);
    yield Bulk::indexAction([
        'title' => 'document 2 title',
        'body' => 'document 2 body',
    ]);
    yield Bulk::indexAction([
        'title' => 'document 3 title',
        'body' => 'document 3 body',
    ]);
}

Bulk::bulk($client, 'my-index', get_next_document())
```

## The bulk helper

The bulk helper can be called as follows:

```php
$count = bulk($client, $index, $actions, $chunk_size = 500, $max_chunk_bytes = 100 * 1024 * 1024);
```

The `$client` argument is the client to use to submit Bulk API requests. The
`$index` argument is the default index that actions will be assigned to.
Actions can override this default by passing `['_index' => 'another-index']` in
their `$other_metadata` argument. The `$actions` argument is the iterable that
yields the bulk actions, normally implemented as a generator.

To avoid high resource utilization, the helper uses the `$chunk_size` and
`$max_chunk_bytes` arguments to decide when it has accumulated sufficient data
to submit in a Bulk API request. The application can override this logic and
trigger more frequent updates by sending a `flush` action.

## Bulk actions

A bulk operation includes a list of operations, called *actions*. The Bulk API
supports four different actions, `index`, `create`, `update`, and `delete`, all
of which are supported when working with this helper, which adds support for an
additional action, `flush`.

### Index

The `index` action indexes the specified document. If the document exists, it
replaces the document and increments the version.

```php
yield Bulk::indexAction($document, $id = null, $other_metadata = null);
```

The `$document` argument is an array with the document to index. The `$id`
argument is the document's umique ID. When `$id` is not provided, the server
generates a document ID. Any other attributes of the index action can be passed
in the `$other_metadata` argument.

### Create

The `create` action indexes the specified document if it does not already
exist.

```php
yield Bulk::createAction($document, $id = null, $other_metadata = null);
```

The `$document` argument is an array with the document to create. The `$id`
argument is the document's umique ID. When `$id` is not provided, the server
generates a document ID. Any other attributes of the index action can be passed
in the `$other_metadata` argument.

### Update

The `update` action performs a partial document update.

```php
yield Bulk::updateAction($document_updates, $id, $other_metadata = null);
```

The `$document_updates` argument is an array with the desired updates to the
document, formatted as required by the Bulk API update action. The `$id`
argument is the document's ID, which is required for this action. Any other
attributes of the index action can be passed in the `$other_metadata` argument.

### Delete

The `delete` action removes the specified document from the index.

```php
yield Bulk::deleteAction($id, $other_metadata = null);
```

The `$id` argument is the document ID to delete. Any other attributes of the
index action can be passed in the `$other_metadata` argument.

### Flush

The `flush` action instructs the bulk helper to submit a Bulk API request with
all the actions accumulated up to that point. This allows the application to
override the logic in the helper that decides when sufficient data has been
accumulated to submit in a Bulk API request.

```php
yield Bulk::flushAction();
```
