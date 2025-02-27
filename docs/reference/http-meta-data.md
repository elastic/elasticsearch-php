---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/http-meta-data.html
---

# HTTP Meta Data [http-meta-data]

By default, the client sends some meta data about the HTTP connection using custom headers.

You can disable or enable it using the following methods:

## Elastic Meta Header [_elastic_meta_header]

The client sends a `x-elastic-client-meta` header by default. This header is used to collect meta data about the versions of the components used by the client. For instance, a value of `x-elastic-client-meta` can be `es=8.0.0-s,php=8.0.0,t=8.0.0-s,a=0,gu=7.4.2, where each value is the version of `es=Elasticsearch`, `t` is the transport version (same of client), `a` is asyncronouts (`0=false` by default) and `gu=Guzzle`.

If you would like to disable it you can use the `setElasticMetaHeader()` method, as follows:

```php
$client = Elasticsearch\ClientBuilder::create()
    ->setElasticMetaHeader(false)
    ->build();
```


