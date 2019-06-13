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
