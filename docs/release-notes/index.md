---
navigation_title: "Elasticsearch PHP Client"
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/release-notes.html
---

# Elasticsearch PHP Client release notes [elasticsearch-php-client-release-notes]

Review the changes, fixes, and more in each version of Elasticsearch PHP Client.

To check for security updates, go to [Security announcements for the Elastic stack](https://discuss.elastic.co/c/announcements/security-announcements/31).

% Release notes include only features, enhancements, and fixes. Add breaking changes, deprecations, and known issues to the applicable release notes sections.

% ## version.next [felasticsearch-php-client-next-release-notes]

% ### Features and enhancements [elasticsearch-php-client-next-features-enhancements]
% *

% ### Fixes [elasticsearch-php-client-next-fixes]
% *

## 9.1.0 [elasticsearch-php-client-910-release-notes]

This release includes the following endpoint changes for [Elasticsearch 9.1.0](https://www.elastic.co/docs/release-notes/elasticsearch#elasticsearch-9.1.0-release-notes):

### Cluster.getComponentTemplate

- Added `flat_settings` parameter (bool), return settings in flat format (default: false)
- Added `settings_filter` parameter (string), filter out results, for example to filter out sensitive information. Supports wildcards or full settings keys

### Cluster.putComponentTemplate

- Removed `timeout` parameter
- Added `cause` parameter (string), user defined reason for create the component template

### Eql.search

- Added `ccs_minimize_roundtrips` parameter (bool), indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
- Added `ignore_unavailable` parameter (bool), whether specified concrete indices should be ignored when unavailable (missing or closed)
- Added `allow_no_indices` parameter (bool), whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
- Added `expand_wildcards` parameter (string), whether to expand wildcard expression to concrete indices that are open, closed or both.

### Esql.asyncQuery

- Added `allow_partial_results` parameter (bool), if `true`, partial results will be returned if there are shard failures, but the query can continue to execute on other clusters and shards. If `false`, the entire query will fail if there are any failures.

### Esql.asyncQueryGet

- Added `format` parameter (string), a short version of the Accept header, e.g. json, yaml

### Esql.getQuery (new EXPERIMENTAL API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-esql-get-query

### Esql.listQueries  (new EXPERIMENTAL API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-esql-list-queries

### Esql.query

- Added `allow_partial_results` parameter (bool), if `true`, partial results will be returned if there are shard failures, but the query can continue to execute on other clusters and shards. If `false`, the entire query will fail if there are any failures.

### Indices.deleteDataStreamOptions (new API)

- Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.delete_data_stream_options.json

### Indices.getDataStreamOptions (new API, available on serverless)

- Docuemntation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-indices-get-data-stream-options

### Indices.getDataStreamSettings (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-indices-get-data-stream-settings

### Indices.getFieldMapping

- Removed the `local` parameter.

### Indices.putDataStreamOptions (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-indices-put-data-stream-options

### Indices.putDataStreamSettings (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-indices-put-data-stream-settings

### Indices.recovery

- Added `ignore_unavailable` parameter (bool), whether specified concrete indices should be ignored when unavailable (missing or closed)
- Added `allow_no_indices` parameter (bool), whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
- Added `expand_wildcards` parameter (string), whether to expand wildcard expression to concrete indices that are open, closed or both.

### Indices.removeBlock (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-indices-remove-block

### Inference.putAmazonsagemaker (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-inference-put-amazonsagemaker

### Inference.putCustom (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-inference-put-custom

### Inference.putDeepseek (new API, available on serverless)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-inference-put-deepseek

### Snapshot.get

- Added `state` parameter (string|array<string>), filter snapshots by a comma-separated list of states. Valid state values are 'SUCCESS', 'IN_PROGRESS', 'FAILED', 'PARTIAL', or 'INCOMPATIBLE'.

### Snapshot.repositoryAnalyze

- Added `register_operation_count` parameter (int), the minimum number of linearizable register operations to perform in total. Defaults to 10.

### Snapshot.repositoryVerifyIntegrity (new EXPERIMENTAL API)

- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-verify-repository

### Streams.logsDisable (new API)

- Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-logs-disable.html
- API: https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-logs-disable.html

### Streams.logsEnable (new API)

- Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-logs-enable.html
- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/streams.logs_enable.json

### Streams.status (new API)

- Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-status.html
- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/streams.status.json

### Synonyms.deleteSynonymRule

- Added `refresh` parameter (bool), refresh search analyzers to update synonyms

### Synonyms.putSynonym

- Added `refresh` parameter (bool), refresh search analyzers to update synonyms

### Synonyms.putSynonymRule

- Added `refresh` parameter (bool), refresh search analyzers to update synonyms

### create

- Added `require_alias` parameter (bool), when true, requires destination to be an alias. Default is false
- Added `require_data_stream` parameter (bool), when true, requires destination to be a data stream (existing or to be created). Default is false

### msearch

- Added `ignore_unavailable` parameter (bool), whether specified concrete indices should be ignored when unavailable (missing or closed)
- Added `ignore_throttled` parameter (bool), whether specified concrete, expanded or aliased indices should be ignored when throttled
- Added `allow_no_indices` parameter (bool), whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
- Added `expand_wildcards` parameter (string), whether to expand wildcard expression to concrete indices that are open, closed or both.
- Added `routing` parameter (string|array<string>), a comma-separated list of specific routing values
- Added `include_named_queries_score` parameter (bool), indicates whether hit.matched_queries should be rendered as a map that includes the name of the matched query associated with its score (true) or as an array containing the name of the matched queries (false)

### openPointInTime

- Added `max_concurrent_shard_requests` parameter (int), the number of concurrent shard requests per node executed concurrently when opening this point-in-time. This value should be used to limit the impact of opening the point-in-time on the cluster

### reindex

- Added `require_alias` parameter (bool), when true, requires destination to be an alias.

### searchMvt

- Added `grid_agg` parameter (string), aggregation used to create a grid for `field`.

## 9.0.0 [elasticsearch-php-client-900-release-notes]

### Features and enhancements [elasticsearch-php-client-900-features-enhancements]

- **Compatibility with Elasticsearch 9.0:** All changes and additions to Elasticsearch APIs for its 9.0 release are reflected in this release.
- **Serverless client merged in:** the `elastic/elasticsearch-serverless` client is being deprecated, and its functionality has been merged back into this client. This should have zero impact on the way the client works by default. If an endpoint is available in serverless, the PHP function will contains a `@group serverless` phpdoc attribute.
If you try to use an endpoint that is not available in serverless you will get a `410` HTTP error with a message as follows:
"this endpoint exists but is not available when running in serverless mode".
The 9.0.0 client can recognize that it is communicating with a serverless instance if you are using a URL managed by Elastic (e.g. `*.elastic.cloud`).
If you are using a proxy, the client will be able to recognize that the host is serverless from the first response. Alternatively, you can explicitly indicate that the host is serverless using the `Client::setServerless(true)` function (`false` by default).
- **New transport library with PSR-18 cURL client as default:** we've removed the Guzzle dependency from the client. By default, the built-in cURL-based HTTP client will be used if no other PSR-18 compatible clients are detected. See release [9.0.0](https://github.com/elastic/elastic-transport-php/releases/tag/v9.0.0) of elastic-transport-php.

### Fixes [elasticsearch-php-client-900-fixes]

- **Fixed PHPStan array shape:** we fixed the array shape definition for all the endpoints, upgrading PHPStan to verion 2.1. See PR [#1439](https://github.com/elastic/elasticsearch-php/pull/1439)