# 8.0

This major release is a complete new PHP client for Elasticsearch. We build it from scratch!
We tried to reduce the BC breaks as much as possible but there are some big differences :rage: 

## Architectural changes:

- we changed the namespace, now everything is under `Elastic\Elasticsearch`;
- we used the [elastic-transport-php](https://github.com/elastic/elastic-transport-php) library
  to manage the HTTP requests and responses; This library allows the usage of any [PSR-18](https://www.php-fig.org/psr/psr-18/)
  client.
- we changed the response type of each endpoints using a wrapper class of a [PSR-7](https://www.php-fig.org/psr/psr-7/)
  response. This class allows the access of the body response as array or object. This means
  you can access the API response as in 7.x, no BC break here! :angel:

## Specific changes:

- to be completed 
# 7.17

- We changed the signature of `Elasticsearch\Common\EmptyLogger::log` adding the `void` return type.
  This change has been needed to support psr/log v3.

# 7.4

- Using a deprecated parameter is notified triggering a [E_USER_DEPRECATED](https://www.php.net/manual/en/errorfunc.constants.php)
  error (e.g. using the `type` parameter will generate a `Specifying types in urls has been deprecated`
  deprecation message).
- When `delete` with an empty `id` an `Elasticsearch\Common\Exceptions\RuntimeException\Missing404Exception`
  exception is thrown. Previously it was a `Elasticsearch\Common\Exceptions\RuntimeException\InvalidArgumentException`.

# 7.0

- Requirement of PHP 7.1 instead of 7.0 that is not supported since 1 Jan 2019.
  See [PHP supported version](https://www.php.net/supported-versions.php) for
  more information.

- Elasticsearch 7.0 deprecated APIs that accept types, introduced new typeless
  APIs, and removed support for the _default_ mapping. Read [this](https://www.elastic.co/blog/moving-from-types-to-typeless-apis-in-elasticsearch-7-0)
  blog post for more information.

- Added type hints and return type declarations where possible
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)

# 6.7

- `{type}` part in `indices.put_mapping` API is not required anymore, see new specification [here](https://github.com/elastic/elasticsearch/blob/v6.7.0/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_mapping.json)

# 6.0

- [Search Templates]: PutTemplate endpoint has been removed (see [Elasticsearch Breaking Changes](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_60_scripting_changes.html#_stored_search_template_apis_removed)),
use PutScript instead.

- [#674](https://github.com/elastic/elasticsearch-php/pull/674) `ClientBuilder::defaultLogger()` method was removed. It is recommended to [create the logger object manually](https://github.com/elastic/elasticsearch-php/blob/master/docs/configuration.asciidoc#enabling-the-logger).
