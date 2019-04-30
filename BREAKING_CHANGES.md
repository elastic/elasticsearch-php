# 6.7

- `{type}` part in `indices.put_mapping` API is not required anymore, see new specification [here](https://github.com/elastic/elasticsearch/blob/v6.7.0/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_mapping.json)

# 6.0

- [Search Templates]: PutTemplate endpoint has been removed (see [Elasticsearch Breaking Changes](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_60_scripting_changes.html#_stored_search_template_apis_removed)),
use PutScript instead.

- [#674](https://github.com/elastic/elasticsearch-php/pull/674) `ClientBuilder::defaultLogger()` method was removed. It is recommended to [create the logger object manually](https://github.com/elastic/elasticsearch-php/blob/master/docs/configuration.asciidoc#enabling-the-logger).
