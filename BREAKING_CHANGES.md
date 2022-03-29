# 8.0

This major release is a complete new PHP client for Elasticsearch. We build it from scratch!
We tried to reduce the BC breaks as much as possible but there are some (big) differences: 

## Architectural changes:

- we changed the namespace, now everything is under `Elastic\Elasticsearch`
- we used the [elastic-transport-php](https://github.com/elastic/elastic-transport-php) library for HTTP communications;
- we changed the `Exception` model, using the namespace `Elastic\Elasticsearch\Exception`. All the exceptions extends the
  `ElasticsearchException` interface, as in 7.x
- we changed the response type of each endpoints using an [Elasticsearch](src/Response/Elasticsearch.php) response class.
  This class wraps a a [PSR-7](https://www.php-fig.org/psr/psr-7/) response allowing the access of the body response
  as array or object. This means you can access the API response as in 7.x, no BC break here! :angel:
- we changed the `ConnectionPool` in `NodePool`. The `connection` naming was ambigous since the objects are nodes (hosts)

## Specific changes:

The following functions has been removed:

- `ClientBuilder::getEndpoint()`
- `ClientBuilder::getRegisteredNamespacesBuilders()`
- `ClientBuilder::getRegisteredNamespacesBuilders()`
- `ClientBuilder::defaultHandler()`
- `ClientBuilder::multiHandler()`
- `ClientBuilder::singleHandler()`
- `ClientBuilder::setConnectionFactory()`
- `ClientBuilder::setConnectionPool()`, you can use `ClientBuilder::setNodePool` instead
- `ClientBuilder::setEndpoint()`
- `ClientBuilder::registerNamespace()`
- `ClientBuilder::setTransport()`, you can specify an HTTP PSR-18 client using `ClientBuilder::setHttpClient()`
- `ClientBuilder::setHandler()`
- `ClientBuilder::setTracer()`, you can only set a Logger using  `ClientBuilder::setLogger()`
- `ClientBuilder::setSerializer()`
- `ClientBuilder::setConnectionParams()`, you can use `ClientBuilder::setHttpClientOptions()` instead
- `ClientBuilder::setSelector()`, you can set a `Selector` using the `setNodePool`, see [here](https://github.com/elastic/elastic-transport-php/blob/8.x/README.md#use-a-custom-selector) for more information
- `ClientBuilder::setSniffOnStart()`
- `ClientBuilder::includePortInHostHeader()`

We removed the special `client` parameter passed in `$params` endpoints. In details: 

- `$params['client']['never_retry']`
- `$params['client']['verbose']`
- `$params['client']['port_in_header']`
- `$params['client']['future']`, you can set HTTP async using `Client::setAsync(true)`
- `$params['client']['ignore']`, you can disable the Exception using `Client::setResponseException(false)`

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

# 6.8

- Method taskList() renamed to list() in TasksNamespace

# 6.7

- `{type}` part in `indices.put_mapping` API is not required anymore, see new specification [here](https://github.com/elastic/elasticsearch/blob/v6.7.0/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_mapping.json)

# 6.0

- [Search Templates]: PutTemplate endpoint has been removed (see [Elasticsearch Breaking Changes](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_60_scripting_changes.html#_stored_search_template_apis_removed)),
use PutScript instead.

- [#674](https://github.com/elastic/elasticsearch-php/pull/674) `ClientBuilder::defaultLogger()` method was removed. It is recommended to [create the logger object manually](https://github.com/elastic/elasticsearch-php/blob/master/docs/configuration.asciidoc#enabling-the-logger).
