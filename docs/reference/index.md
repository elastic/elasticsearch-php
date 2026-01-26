---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/overview.html
navigation_title: PHP
---

# {{es}} PHP client overview [overview]

The {{es}} PHP client is designed to be a low-level client. All methods closely match the REST API and the method structure of other language clients. This makes it easier to get started with a client and switch from one language to another.

It provides a response-handling layer that makes it easier to access HTTP responses in different formats. The PSR-18 HTTP response can be accessed as a PHP array, object, or a raw string. For more details, refer to [blog post for {{es}} PHP client](https://www.elastic.co/blog/introducing-the-new-php-client-for-elasticsearch-8).
Additionally, the client provides helpers to map an ES|QL result directly to a PHP object. For more information, refer to [map php result to an object](https://www.elastic.co/search-labs/blog/esql-php-map-object-class).

The client allows you to make API calls and read the response in multiple formats: associative array, object, raw string, or [PSR-7](https://www.php-fig.org/psr/psr-7/) response.

For a step-by-step quickstart with the client, refer to the [Getting started guide](/reference/getting-started.md)  .

## PSR 7 standard [psr-7-standard]

The {{es}} PHP client uses the [PSR](https://www.php-fig.org/psr/) 7 standard. This standard is a community effort that contains a set of interfaces defined by the PHP Framework Interop Group. For more information, refer to the [PSR 7 standard documentation](https://www.php-fig.org/psr/psr-7/).


## {{es}} and PHP client version compatibility [version-compatibility]

The {{es}} PHP client is compatible with PHP versions that are currently maintained and supported.

{{es}} language clients are forward compatible. This ensures that the client remains compatible with {{es}} instances running the same or newer minor versions, preventing any breaking changes. However, for all new features in the newer {{es}} versions, the client will support them only after a new client version is released. For example, the `8.12` {{es}} PHP client does not support new features in
{{es}} `8.13`. You must upgrade to the `8.13` version of the {{es}} PHP client to use them. 

{{es}} language clients are backward-compatible only with default distributions and there are no guarantees for customized or modified versions. The following table provides the compatibility information between {{es}} and {{es}} PHP client:

| Elasticsearch Version | Elasticsearch-PHP Branch | Supported |
|-----------------------|--------------------------|-----------|
| main                  | main                     |           |
| 9.x                   | 9.x                      | 9.x       |
| 8.x                   | 8.x                      | 8.x       |

## Changes and compatibility notes for {{es}} PHP client 9.x

The `elasticsearch-php` client version `9.x` follows the same architecture as `8.x`. It continues to support [PSR-7](https://www.php-fig.org/psr/psr-7/) for HTTP messages and [PSR-18](https://www.php-fig.org/psr/psr-18/) for HTTP client communications.

Although we've worked to keep `9.x` backward compatible, the following important changes may impact your setup:
- Compatibility with {{es}} `9.x`: All changes and additions to {{es}} APIs `9.x` release are reflected in the `elasticsearch-php` client release. You must use `elasticsearch-php` client version `9.x` to access all new endpoints in {{es}} `9.x`. Using an older client version will break your code.
- Compatibility with {{es-serverless}}: 
  - The `elastic/elasticsearch-serverless` is deprecated, and all its functionality has been merged into the `elasticsearch-php` client. This doesn't have any impact on the default working of the client.
  - If you use any endpoint available in {{serverless-short}}, you'll see that the corresponding PHP function contains a `@group serverless` phpdoc attribute.
  - If you use any endpoint that is not available in {{serverless-short}}, you'll get a `410` HTTP error with the message: `This endpoint exists but is not available when running in serverless mode`.
  - If you use a URL managed by Elastic, for example `*.elastic.cloud`, the `9.x` client will recognize that it is communicating with a serverless instance.
  - If you are using a proxy, the `9.x` client will recognize that the host is serverless from the first response. Alternatively, you can explicitly specify that the host is serverless using the `Client::setServerless(true)` function. The argument to this function is set to `false` by default.
- New transport library with PSR-18 cURL client as default: We've removed the `Guzzle` dependency from the client. The built-in cURL-based HTTP client will be used by default if no other PSR-18 compatible clients are detected. See release [9.0.0](https://github.com/elastic/elastic-transport-php/releases/tag/v9.0.0) of elastic-transport-php.

For detailed information on all the breaking changes, refer to [breaking changes.](https://github.com/elastic/elasticsearch-php/blob/main/BREAKING_CHANGES.md)
