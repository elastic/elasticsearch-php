---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/deleting_documents.html
---

# Deleting documents [deleting_documents]

Finally, you can delete documents by specifying their full `/index/_doc_/id` path:

```php
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

// Delete doc at /my_index/_doc_/my_id
$response = $client->delete($params);
```

​<br>

