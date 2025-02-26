---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/getting_documents.html
---

# Getting documents [getting_documents]

{{es}} provides realtime GETs of documents. This means that as soon as the document is indexed and your client receives an acknowledgement, you can immediately retrieve the document from any shard. Get operations are performed by requesting a document by its full `index/type/id` path:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

// Get doc at /my_index/_doc/my_id
$response = $client->get($params);
```

​<br>

