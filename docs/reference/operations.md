---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/operations.html
---

# Operations [operations]

This page contains the information you need to perform various {{es}} operations by using the Client.

This section is a crash-course overview of the client and its syntax. If you are familiar with {{es}}, you’ll notice that the methods are named just like REST endpoints.

You may also notice that the client is configured in a manner that facilitates easy discovery via your IDE. All core actions are available under the `$client` object (indexing, searching, getting, etc). Index and cluster management are located under the `$client->indices()` and `$client->cluster()` objects, respectively.

* [Index management operations](/reference/index_management.md)
* [Search operations](/reference/search_operations.md)
* [Indexing documents](/reference/indexing_documents.md)
* [Getting documents](/reference/getting_documents.md)
* [Updating documents](/reference/updating_documents.md)
* [Deleting documents](/reference/deleting_documents.md)







