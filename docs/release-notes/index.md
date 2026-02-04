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

## 9.3.0 [elasticsearch-php-client-930-release-notes]

### Features and enhancements [elasticsearch-php-client-930-features-enhancements]

- New `packDenseVector` helper function [#1499](https://github.com/elastic/elasticsearch-php/pull/1499)

The `packDenseVector` function can be used to pack dense vectors for efficient bulk ingesting.

Example usage:

```php
use Elastic\Elasticsearch\Helper\Vectors;

$params = ['body' => []];
// ...
$params['body'][] = ['index' => ['_index' => $index]];
$params['body'][] = [
    'docid' => $doc['docid'],
    'title' => $doc['title'],
    'text' => $doc['text'],
    'emb' => Vectors::packDenseVector($doc['emb']),
];
// ...
$response = $client->bulk($params);
```

Packed dense vectors can provide significant bulk ingest performance improvements.

### Cat.circuitBreaker (new API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/cat.circuit_breaker.json

### Esql.getView (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/esql.get_view.json

### Esql.putView (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/esql.put_view.json

### Esql.deleteView (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/esql.delete_view.json

### Indices.getSample (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_sample.json

### Indices.getSampleConfiguration (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_sample_configuration.json

### Indices.getAllSampleConfiguration (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_all_sample_configuration.json

### Indices.putSampleConfiguration (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_sample_configuration.json

### Indices.deleteSampleConfiguration (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.delete_sample_configuration.json

### Indices.getSampleStats (new experimental API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_sample_stats.json

### Inference.putGroq (new API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_groq.json

### Inference.putNvidia (new API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_nvidia.json

### Inference.putOpenshiftAi (new API)

- API: https://github.com/elastic/elasticsearch/blob/9.3/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_openshift_ai.json

### Ml.openJob

- Added the `timeout` parameter (int|string)

### Ml.stopDatafeed

- Added the `close_job` parameter (bool)

### knnSearch (removed API)

- This endpoint is not supported since release 9.0 and was inadvertently left in this client.

## 9.2.0 [elasticsearch-php-client-920-release-notes]

### Features and enhancements [elasticsearch-php-client-920-features-enhancements]

- Added the ES|QL query builder [#1462](https://github.com/elastic/elasticsearch-php/pull/1462)

This query builder should simplify the usage of the Elasticsearch Query Language ([ES|QL](https://www.elastic.co/docs/reference/query-languages/esql)) in PHP.

Example usage:

```php
$query = Esql\Query::from("books", "books*")
    ->where('author == "King"', 'year == 1982')
    ->limit(10);
echo $query;
```

Output:

```
FROM books, books*
| WHERE author == "King" AND year == 1982
| LIMIT 10
```

This release includes the following endpoint changes for [Elasticsearch 9.2.0](https://www.elastic.co/docs/release-notes/elasticsearch#elasticsearch-9.2.0-release-notes):

### AsyncSearch.submit

- Added the `project_routing` parameter (string), a Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.

### Cat.aliases

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.componentTemplates

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.count

- Added the `project_routing` parameter (string), a Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.fielddata

- Added the `time` parameter (string), the unit in which to display time values

### Cat.health

- Added the `bytes` parameter (string), the unit in which to display byte values

### Cat.master

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.mlDatafeeds

- Added the `bytes` parameter (string), the unit in which to display byte values

### Cat.nodeattrs

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.pendingTasks

- Added the `bytes` parameter (string), the unit in which to display byte values

### Cat.plugins

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.repositories

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.segments

- Added the `time` parameter (string), the unit in which to display time values
- Added the `ignore_unavailable` parameter (bool), whether specified concrete indices should be ignored when unavailable (missing or closed). Only allowed when providing an index expression.
- Added the `ignore_throttled` (bool), whether specified concrete, expanded or aliased indices should be ignored when throttled. Only allowed when providing an index expression.
- Added the `allow_no_indices` (bool), whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified). Only allowed when providing an index expression.
- Added the `expand_wildcards` parameter (string), whether to expand wildcard expression to concrete indices that are open, closed or both.
- Added the `allow_closed` parameter (bool), if true, allow closed indices to be returned in the response otherwise if false, keep the legacy behaviour of throwing an exception if index pattern matches closed indices

### Cat.snapshots

- Added the `bytes` paremeter (string), the unit in which to display byte values

### Cat.tasks

- Added the `bytes` paremeter (string), the unit in which to display byte values

### Cat.templates

- Added the `bytes` parameter (string), the unit in which to display byte values
- Added the `time` parameter (string), the unit in which to display time values

### Cat.threadPool

- Added the `bytes` parameter (string), the unit in which to display byte values

### Cat.transforms

- Added the `bytes` parameter (string), the unit in which to display byte values

### Cluster.allocationExplain

- Added the `index` parameter (string), specifies the name of the index that you would like an explanation for
- Added the `shard` paremeter (int), specifies the ID of the shard that you would like an explanation for
- Added the `primary` parameter (bool), if true, returns explanation for the primary shard for the given shard ID
- Added the `current_node` parameter (string), specifies the node ID or the name of the node to only explain a shard that is currently located on the specified node

### Connector.lastSync

This experimental endpoint has been removed.

### Eql.search

- Added the `project_routing` parameter (string), a Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.

### Indices.cancelMigrateReindex (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.cancel_migrate_reindex.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-cancel-migrate-reindex

### Indices.createFrom (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.create_from.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-create-from

### Indices.getDataStreamMappings (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_data_stream_mappings.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-stream-mappings

### Indices.getMigrateReindexStatus (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_migrate_reindex_status.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/group/endpoint-migration

### Indices.migrateReindex (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.migrate_reindex.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-migrate-reindex

### Indices.putDataStreamMappings (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_data_stream_mappings.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-data-stream-mappings

### Inference.chatCompletionUnified

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.completion

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.inference

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.put

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putAi21 (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_ai21.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-inference-put-ai21

### Inference.putAmazonbedrock

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putAmazonsagemaker

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putAnthropic

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putAzureaistudio

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putAzureopenai

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putCohere

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putContextualai (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_contextualai.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-inference-put-contextualai

### Inference.putDeepseek

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putElasticsearch

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putElser

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putGoogleaistudio

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putGooglevertexai

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putHuggingFace

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putJinaai

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putLlama (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_llama.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-inference-put-llama

### Inference.putMistral

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putOpenai

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putVoyageai

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.putWatsonx

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.rerank

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.sparseEmbedding

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.streamCompletion

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Inference.textEmbedding

- Added `timeout` parameter (int|string), specifies the amount of time to wait for the inference request to complete.

### Project.tags (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/project.tags.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch-serverless/operation/operation-project-tags

### Security.getStats (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/security.get_stats.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-stats

### Simulate.ingest

- Added the `merge_type` parameter (string), the mapping merge type if mapping overrides are being provided in mapping_addition.The allowed values are one of index or template.The index option merges mappings the way they would be merged into an existing index.The template option merges mappings the way they would be merged into a template.

### Sql.query

- Added the `project_routing` parameter (string), a Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.

### Transform.setUpgradeMode (new API)

- API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/transform.set_upgrade_mode.json
- Documentation: https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-set-upgrade-mode


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
