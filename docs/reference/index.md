---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/overview.html
---

# PHP [overview]

This is the official PHP client for {{es}}. It is designed to be a low-level client that does not stray from the REST API.

All methods closely match the REST API, and furthermore, match the method structure of other language clients (Ruby, Python, and so on). We hope that this consistency makes it easy to get started with a client and to seamlessly switch from one language to the next with minimal effort.

The client is designed to facilitate the API call using different way to read the results using associative array, object, string or [PSR-7](https://www.php-fig.org/psr/psr-7/).

Refer to the [*Getting started*](/reference/getting-started.md) page for a step-by-step quick start with the PHP client.


## PSR 7 standard [psr-7-standard]

The {{es}} PHP client uses the [PSR](https://www.php-fig.org/psr/) 7 standard. This standard is a community effort that contains a set of interfaces defined by the PHP Framework Interop Group. For more information, refer to the [PSR 7 standard documentation](https://www.php-fig.org/psr/psr-7/).


## {{es}} and PHP version Compatibility [version-compatibility]

The {{es}} client is compatible with currently maintained PHP versions.

Language clients are forward compatible; meaning that clients support communicating with greater or equal minor versions of {{es}} without breaking. It does not mean that the client automatically supports new features of newer {{es}} versions; it is only possible after a release of a new client version. For example, a 8.12 client version won’t automatically support the new features of the 8.13 version of {{es}}, the 8.13 client version is required for that. {{es}} language clients are only backwards compatible with default distributions and without guarantees made.

| Elasticsearch Version | Elasticsearch-PHP Branch | Supported |
| --- | --- | --- |
| main | main |  |
| 8.x | 8.x | 8.x |
| 7.x | 7.x | 7.17 |

* [Breaking changes from 7.x](https://www.elastic.co/guide/en/elasticsearch/client/php-api/7.17/breaking_changes.html)


