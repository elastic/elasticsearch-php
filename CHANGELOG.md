## Release 9.0.0

- **Use of PHP 8.1+:** Starting from 9.0.0 the `elasticsearch-php` client requires PHP 8.1+.
- **Compatibility with Elasticsearch 9.0:** All changes and additions to Elasticsearch APIs for its 9.0 release are reflected in this release.
- **Serverless client merged in:** the `elastic/elasticsearch-serverless` client is being deprecated, and its functionality has been merged back into this client. This should have zero impact on the way the client works by default. If an endpoint is available in serverless, the PHP function will contains a `@group serverless` phpdoc attribute.
If you try to use an endpoint that is not available in serverless you will get a `410` HTTP error with a message as follows:
"this endpoint exists but is not available when running in serverless mode".
The 9.0.0 client can recognize that it is communicating with a serverless instance if you are using a URL managed by Elastic (e.g. `*.elastic.cloud`).
If you are using a proxy, the client will be able to recognize that the host is serverless from the first response. Alternatively, you can explicitly indicate that the host is serverless using the `Client::setServerless(true)` function (`false` by default).
- **New transport library with PSR-18 cURL client as default:** we've removed the Guzzle dependency from the client. By default, the built-in cURL-based HTTP client will be used if no other PSR-18 compatible clients are detected. See release [9.0.0](https://github.com/elastic/elastic-transport-php/releases/tag/v9.0.0) of elastic-transport-php.

## Release 8.17.1

- Fix and improvements for PHPStan (rule level 5) #1442 (thanks @AJenbo)

## Release 8.17.0

- Updated the APIs to Elasticsearch [8.17.0](https://www.elastic.co/guide/en/elasticsearch/reference/current/release-notes-8.17.0.html)

## Release 8.16.0

- Updated the APIs to Elasticsearch [8.16.0](https://www.elastic.co/guide/en/elasticsearch/reference/current/release-notes-8.16.0.html)
- Added the support of PHP 8.4 #1415 (thanks @ruudk)

## Release 8.15.0

Updated the APIs to Elasticsearch [8.15.0](https://www.elastic.co/guide/en/elasticsearch/reference/current/release-notes-8.15.0.html) and added the support of OpenTelemetry.
Read the elastic-transport-php [README](https://github.com/elastic/elastic-transport-php?tab=readme-ov-file#opentelemetry)
for more information about OpenTelemetry support.

## Release 8.14.0

This release introduces 3 new APIs and 10 EXPERIMENTAL APIs.

- Specific changes per endpoints
  - `Ccr.deleteAutoFollowPattern`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.follow`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.followInfo`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.followStats`
    - Added the `timeout` parameter (time), explicit operation timeout.
  - `Ccr.forgetFollower`
    - Added the `timeout` parameter (time), explicit operation timeout.
  - `Ccr.getAutoFollowPattern`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.pauseFollow`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.putAutoFollowPattern`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.resumeAutoFollowPattern`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.resumeFollow`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.stats`
    - Added the `timeout` parameter (time), explicit operation timeout.
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `Ccr.unfollow`
    - Added the `master_timeout` parameter (time), explicit operation timeout for connection to master node.
  - `ConnectorSyncJob`
    - The APIs of `ConnectorSyncJob` has been removed and merged in `Connector` namespace.
  - `Connector.delete`
    - Added the `delete_sync_jobs` parameter (boolean), determines whether associated sync jobs are also deleted.
  - `Connector.syncJobCancel` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_cancel.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/cancel-connector-sync-job-api.html
  - `Connector.syncJobCheckIn` (new EXPERIMENTAL API) 
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_check_in.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/check-in-connector-sync-job-api.html
  - `Connector.syncJobDelete` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_delete.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-connector-sync-job-api.html
  - `Connector.syncJobError` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_error.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/set-connector-sync-job-error-api.html
  - `Connector.syncJobGet` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-connector-sync-job-api.html
  - `Connector.syncJobList` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_list.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-connector-sync-jobs-api.html
  - `Connector.syncJobPost` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_post.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/create-connector-sync-job-api.html
  - `Connector.syncJobUpdateStats` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.sync_job_update_stats.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/set-connector-sync-job-stats-api.html
  - `Connector.updateActiveFiltering` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_active_filtering.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-filtering-api.html
  - `Connector.updateFilteringValidation` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_filtering_validation.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-filtering-api.html
  - `Esql.asyncQuery`
    - This API is now stable.
  - `Esql.query`
    - This API is now stable.
  - `Indices.rollover`
    - Added the `target_failure_store` parameter (boolean), if set to true, the rollover action will be applied on the failure store of the data stream.
  - `Inference.getModel`
    - The `inference_id` is not anymore a required parameter.
  - `Profiling.topnFunctions` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/profiling.topn_functions.json
    - Documentation: https://www.elastic.co/guide/en/observability/current/universal-profiling.html
  - `SearchApplication.search`
    - Added the `typed_keys` parameter (boolean), specify whether aggregation and suggester names should be prefixed by their respective types in the response.
  - `Security.getApiKey`
    - Added the `with_profile_uid` parameter (boolean), flag to also retrieve the API Key's owner profile uid, if it exists.
  - `Security.queryApiKeys`
    - Added the `with_profile_uid` parameter (boolean), flag to also retrieve the API Key's owner profile uid, if it exists.
    - Added the `typed_keys` paremeter (boolean), flag to prefix aggregation names by their respective types in the response.
  - `TextStructure.findFieldStructure` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/text_structure.find_field_structure.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/find-field-structure.html
  - `TextStructure.findMessageStructure` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/text_structure.find_message_structure.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/find-message-structure.html

## Release 8.13.0

- Added the `mapTo($class)` function to Elasticsearch response for mapping the result
 of [ES|QL](https://www.elastic.co/guide/en/elasticsearch/reference/current/esql.html)
 query to an object of stdClass or of a specific class
 [#1398](https://github.com/elastic/elasticsearch-php/issues/1398)

This release introduces 6 new APIs and 6 EXPERIMENTAL APIs.

- Specific changes per endpoints
  - `AsyncSearch.status`
    - Added the `keep_alive` parameter (time), specify the time interval in which the results (partial or final) for this search will be available.
  - `Connector.list`
    - Added the following parameters:
      - `index_name`: list, a comma-separated list of connector index names to fetch connector documents for;
      - `connector_name`: list, a comma-separated list of connector names to fetch connector documents for;
      - `service_type`: list, a comma-separated list of connector service types to fetch connector documents for;
      - `query`: string, a search string for querying connectors, filtering results by matching against connector names, descriptions, and index names;
  - `Connector.updateApiKeyId` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_api_key_id.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-api-key-id-api.html
  - `Connector.updateIndexName` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_index_name.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-index-name-api.html
  - `Connector.updateNative` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_native.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/connector-apis.html
  - `Connector.updateServiceType` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_service_type.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-service-type-api.html
  - `Connector.updateStatus` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_status.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/update-connector-status-api.html
  - `ConnectorSyncJob.list`
    - Added the `job_type` parameter (list), a comma-separated list of job types.
  - `Esql.asyncQuery` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/esql.async_query.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/esql-async-query-api.html
  - `Esql.asyncQueryGet` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/esql.async_query_get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/esql-async-query-get-api.html
  - `Esql.query`
    - Added the `drop_null_columns` parameter (boolean) to sepcify if null columns should be removed from the results. If yes, their name and type will be returned in a new `all_columns` section.
  - `Indices.resolveCluster` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/get_script.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-cluster-api.html
  - `Indices.rollover`
    - Added the `lazy` parameter (boolean), if set to true, the rollover action will only mark a data stream to signal that it needs to be rolled over at the next write. Only allowed on data streams.
  - `Inference.deleteModel`
    - The `model_id` parameter has been renamed to `inference_id`.
  - `Inference.getModel`
    - The `model_id` parameter has been renamed in `inference_id`.
  - `Inference.inference`
    - The `model_id` parameter has been renamed in `inference_id`.
  - `Inference.putModel`
    - The `model_id` parameter has been renamed in `inference_id`.
  - `Profiling.flamegraph` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/profiling.flamegraph.json
    - Documentation: https://www.elastic.co/guide/en/observability/current/universal-profiling.html
  - `Profiling.stacktraces` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/profiling.stacktraces.json
    - Documentation: https://www.elastic.co/guide/en/observability/current/universal-profiling.html
  - `Security.queryUser` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/security.query_user.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-query-user.html
  - `Synonyms.deleteSynonym`
    - This API is now stable.
  - `Synonyms.deleteSynonymRule`
    - This API is now stable.
  - `Synonyms.getSynonym`
    - This API is now stable.
  - `Synonyms.getSynonymRule`
    - This API is now stable.
  - `Synonyms.getSynonymsSets`
    - This API is now stable.
  - `Synonyms.putSynonym`
    - This API is now stable.
  - `Synonyms.putSynonymRule`
    - This API is now stable.
  - `TextStructure.testGrokPattern` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/text_structure.test_grok_pattern.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/test-grok-pattern.html

## Release 8.12.0

- Added 22 new EXPERIMENTAL APIs and 1 new stable API:
  - `bulk`
    - Adds `list_executed_pipelines` boolean parameter. Sets `list_executed_pipelines` for all incoming documents. Defaults to unset (false).
  - `indices.put_settings`
    - Adds `reopen` boolean parameter. Whether to close and reopen the index to apply non-dynamic settings. If set to `true` the indices to which the settings are being applied will be closed temporarily and then reopened in order to apply the changes. The default is `false`.
  - `open_point_in_time`
    - Adds `body` object/Hash parameter. An index_filter specified with the Query DSL.
  - `security.get_api_key`
    - Adds `active_only` boolean parameter. Flag to limit response to only active (not invalidated or expired) API keys.
  - `profiling.status` (new API)
    - Returns basic information about the status of Universal Profiling.
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/profiling.status.json
    - Documentation: https://www.elastic.co/guide/en/observability/current/universal-profiling.html
  - `simulate.ingest` (new EXPERIMENTAL API)
    - Simulates running ingest with example documents. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/simulate-ingest-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/simulate.ingest.json
  - `connector.post` (new EXPERIMENTAL API)
    - Creates a connector. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/create-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.post.json
  - `connector.put` (new EXPERIMENTAL API)
    - Creates or updates a connector. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/create-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.put.json
  - `connector.delete` (new EXPERIMENTAL API)
    - Deletes a connector.
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/delete-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.delete.json
  - `connector.get` (new EXPERIMENTAL API)
    - Returns the details about a connector. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/get-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.get.json
  - `connector.list` (new EXPERIMENTAL API)
    - Lists all connectors.
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/list-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.list.json
  - `connector.check_in` (new EXPERIMENTAL API)
    - Updates the last_seen timestamp in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/check-in-connector-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.check_in.json
  - `connector.update_configuration` (new EXPERIMENTAL API)
    - Updates the connector configuration. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-configuration-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_configuration.json
  - `connector.update_error` (new EXPERIMENTAL API)
    - Updates the error field in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-error-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_error.json
  - `connector.update_filtering` (new EXPERIMENTAL API)
    - Updates the filtering field in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-filtering-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_filtering.json
  - `connector.last_sync` (new EXPERIMENTAL API)
    - Updates the stats of last sync in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-last-sync-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.last_sync.json
  - `connector.update_name` (new EXPERIMENTAL API)
    - Updates the name and/or description fields in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-name-description-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_name.json
  - `connector.update_pipeline` (new EXPERIMENTAL API)
    - Updates the pipeline field in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-pipeline-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_pipeline.json
  - `connector.update_scheduling` (new EXPERIMENTAL API)
    - Updates the scheduling field in the connector document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/update-connector-scheduling-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector.update_scheduling.json
  - `connector_sync_job.cancel` (new EXPERIMENTAL API)
    - Cancels a connector sync job. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/cancel-connector-sync-job-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.cancel.json
  - `connector_sync_job.check_in` (new EXPERIMENTAL API)
    - Checks in a connector sync job (refreshes 'last_seen'). 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/check-in-connector-sync-job-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.check_in.json
  - `connector_sync_job.delete` (new EXPERIMENTAL API)
    - Deletes a connector sync job.
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/delete-connector-sync-job-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.delete.json
  - `connector_sync_job.error` (new EXPERIMENTAL API)
    - Sets an error for a connector sync job. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/set-connector-sync-job-error-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.error.json
  - `connector_sync_job.get` (new EXPERIMENTAL API)
    - Returns the details about a connector sync job. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/get-connector-sync-job-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.get.json
  - `connector_sync_job.list` (new EXPERIMENTAL API)
    - Lists all connector sync jobs. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/list-connector-sync-jobs-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.list.json
  - `connector_sync_job.post` (new EXPERIMENTAL API)
    - Creates a connector sync job. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/create-connector-sync-job-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.post.json
  - `connector_sync_job.update_stats` (new EXPERIMENTAL API)
    - Updates the stats fields in the connector sync job document. 
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/8.12/set-connector-sync-job-stats-api.html
    - API: https://github.com/elastic/elasticsearch/blob/8.12/rest-api-spec/src/main/resources/rest-api-spec/api/connector_sync_job.update_stats.json

## Release 8.11.0

- Added 5 new EXPERIMENTAL APIs:
  - `Esql.query `
    - API: https://github.com/elastic/elasticsearch/blob/v8.11.0/rest-api-spec/src/main/resources/rest-api-spec/api/esql.query.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/esql-query-api.html
  - `Inference.deleteModel`
    - API: https://github.com/elastic/elasticsearch/blob/v8.11.0/rest-api-spec/src/main/resources/rest-api-spec/api/inference.delete_model.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-inference-api.html
  - `Inference.getModel`
    - API: https://github.com/elastic/elasticsearch/blob/v8.11.0/rest-api-spec/src/main/resources/rest-api-spec/api/inference.get_model.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-inference-api.html
  - `Inference.inference`
    - API: https://github.com/elastic/elasticsearch/blob/v8.11.0/rest-api-spec/src/main/resources/rest-api-spec/api/inference.inference.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
  - `Inference.putModel`
    - API: https://github.com/elastic/elasticsearch/blob/v8.11.0/rest-api-spec/src/main/resources/rest-api-spec/api/inference.put_model.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-inference-api.html

## Release 8.10.0

- Added 10 new APIs: 8 EXPERIMENTAL and 2 stable:
  - `QueryRuleset.list` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/query_ruleset.list.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-query-rulesets.html
  - `Security.getSettings` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/security.get_settings.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-get-settings.html
  - `Security.updateSettings` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/security.update_settings.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-update-settings.html
  - `Synonyms.delete`
    - Removed this API in favor of `deleteSynonym`.
  - `Synonyms.deleteSynonym` (new EXPERIMENTAL API)
    - This API replaces `Synonyms.delete`. Removed `synonyms_set` in favor of `id`
parameter (string). The id of the synonyms set to be deleted.
  - `Synonyms.deleteSynonymRule` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.delete_synonym_rule.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonym-rule.html
  - `Synonyms.get`
    - Removed this function in favor of `getSynonym`. 
  - `Synonyms.getSynonym` (new EXPERIMENTAL API)
    - This API replaces `Synonyms.getSynonym`. Removed `synonyms_set` in favor of `id`
required parameter (string). The name of the synonyms set to be retrieved.
  - `Synonyms.getSynonymRule` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.get_synonym_rule.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonym-rule.html
  - `Synonyms.getSynonymsSets` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.get_synonyms_sets.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-synonyms-sets.html
  - `Synonyms.put`
    - Removed this function in favor of `putSynonym`.
  - `Synonyms.putSynonym` (new EXPERIMENTAL API)
    - This API replaces `Synonyms.put`. Removed `synonyms_set` in favor of `id`
required parameter (string). The id of the synonyms set to be created or updated.
  - `Synonyms.putSynonymRule` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.put_synonym_rule.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonym-rule.html


## Release 8.9.0

- Fixed issue with psr/http-message, changed PSR-7 versions to 1.1 and 2.0
  [#1344](https://github.com/elastic/elasticsearch-php/pull/1344)
- Added 12 new APIs: 11 EXPERIMENTAL and 1 stable:
  - `Cluster.info` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/cluster.info.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-info.html
  - `QueryRuleset.delete` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/query_ruleset.delete.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-query-ruleset.html
  - `QueryRuleset.get` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/query_ruleset.get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-query-ruleset.html
  - `QueryRuleset.put` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/query_ruleset.put.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-query-ruleset.html
  - `SearchApplication.renderQuery` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.render_query.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/search-application-render-query.html
  - `Security.createCrossClusterApiKey` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/security.create_cross_cluster_api_key.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-create-cross-cluster-api-key.html
  - `Security.updateCrossClusterApiKey` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/security.update_cross_cluster_api_key.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-update-cross-cluster-api-key.html
  - `SynonymRule.put` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/synonym_rule.put.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonym-rule.html
  - `Synonyms.delete` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.delete.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonyms.html
  - `Synonyms.get` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonyms.html
  - `Synonyms.put` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms.put.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonyms.html
  - `SynonymsSets.get` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/8.9/rest-api-spec/src/main/resources/rest-api-spec/api/synonyms_sets.get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-synonyms.html

## Release 8.8.0

- Added SearchHitIterators and SearchResponseIterator helpers revised with new version 
  [#1302](https://github.com/elastic/elasticsearch-php/pull/1302)
- Added 15 new APIs: 13 EXPERIMENTAL and 2 stable:
  - `Indices.deleteDataLifecycle` (new EXPERIMENTAL API)
      - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.delete_data_lifecycle.json
      - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-delete-lifecycle.html
  - `Indices.explainDataLifecycle` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.explain_data_lifecycle.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/dlm-explain-lifecycle.html
  - `Indices.getDataLifecycle` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.get_data_lifecycle.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-get-lifecycle.html
  - `Indices.putDataLifecycle` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_data_lifecycle.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/dlm-put-lifecycle.html
  - `SearchApplication.delete` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.delete.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-search-application.html
  - `SearchApplication.deleteBehavioralAnalytics` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.delete_behavioral_analytics.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-analytics-collection.html
  - `SearchApplication.get` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.get.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/get-search-application.html
  - `SearchApplication.getBehavioralAnalytics` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.get_behavioral_analytics.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-analytics-collection.html
  - `SearchApplication.list` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.list.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/list-search-applications.html
  - `SearchApplication.postBehavioralAnalyticsEvent` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.post_behavioral_analytics_event.json
    - Documentation: TBD
  - `SearchApplication.put` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.put.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-search-application.html
  - `SearchApplication.putBehavioralAnalytics` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.put_behavioral_analytics.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/put-analytics-collection.html
  - `SearchApplication.search` (new EXPERIMENTAL API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/search_application.search.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/master/search-application-search.html
  - `Watcher.getSettings` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/watcher.get_settings.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-get-settings.html
  - `Watcher.updateSettings` (new API)
    - API: https://github.com/elastic/elasticsearch/blob/main/rest-api-spec/src/main/resources/rest-api-spec/api/watcher.update_settings.json
    - Documentation: https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-update-settings.html
- ES 8.8.0 updates some API:
  - `search`: Added the `include_named_queries_score` boolean parameter. Indicates whether hit.matched_queries should be rendered as a map that includes the name of the matched query associated with its score (true) or as an array containing the name of the matched queries (false)
  - `Cluster.getComponentTemplate`: Added `include_defaults` boolean parameters. Return all default configurations for the component template (default: false)
  - `Indices.getDataStream`: Added `include_defaults` boolean parameter. Return all relevant default configurations for the data stream (default: false)
  - `Indices.getIndexTemplate`: Added `include_defaults` boolean parameter. Return all relevant default configurations for the index template (default: false)
  - `Indices.simulateIndexTemplate`: Added `include_defaults` boolean parameter. Return all relevant default configurations for this index template simulation (default: false)
  - `Indices.simulateTemplate`: Added `include_defaults` boolean parameter. Return all relevant default configurations for this template simulation (default: false)
  - `Logstash.getPipeline`: Make `id` parameter optional.
  - `Ml.putTrainedModel`: Added `wait_for_completion` boolean parameter. Whether to wait for all child operations
(e.g. model download) to complete, before returning or not. Default to false
  - `Ml.startTrainedModelDeployment`: Added `deployment_id` string parameter. The Id of the new deployment. Defaults to the model_id if not set.
  - `Transform.deleteTransform`: Added `delete_dest_index` boolean parameter. When `true`, the destination index is deleted together with the transform. The default value is `false`, meaning that the destination index will not be deleted.

## Release 8.7.0

- Added 2 new endpoints:
  - [healthReport](https://github.com/elastic/elasticsearch-php/blob/8.7/src/Traits/ClientEndpointsTrait.php#L839),
    documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/health-api.html)
  - [Transform.scheduleNowTransform](https://github.com/elastic/elasticsearch-php/blob/8.7/src/Endpoints/Transform.php#L286),
    documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/schedule-now-transform.html)
- Added the `delete_user_annotations` boolean parameter in `Ml.deleteJob`.
  Should annotations added by the user be deleted
- Added the `delete_user_annotations` boolean parameter in `Ml.resetJob`.
  Should annotations added by the user be deleted
- Added the `timeout` time parameter in `Transform.getTransformStats`.
  Controls the time to wait for the stats
- Added the `from` string parameter in `Transform.startTransform`.
  Restricts the set of transformed entities to those changed after this time
- Allow plugin for `php-http/discovery` library
  [#1294](https://github.com/elastic/elasticsearch-php/pull/1294)

## Release 8.6.1

- Added a new endpoint [Ml.updateTrainedModelDeployment](https://github.com/elastic/elasticsearch-php/blob/v8.6.1/src/Endpoints/Ml.php#L2743), documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/update-trained-model-deployment.html) 
- Added the `priority` string parameter for `Ml.startTrainedModelDeployment`.
  The deployment priority.

## Release 8.5.0

- Added 2 new endpoints:
  - [Ml.clearTrainedModelDeploymentCache](https://github.com/elastic/elasticsearch-php/blob/v8.5.0/src/Endpoints/Ml.php#L52),    documentation [here](https://www.elastic.co/guide/en/
elasticsearch/reference/master/clear-trained-model-deployment-cache.html)
  - [Security.bulkUpdateApiKeys](https://github.com/elastic/elasticsearch-php/blob/v8.5.0/src/Endpoints/Security.php#L118), documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-bulk-update-api-keys.html)
- Added 1 new experimental endpoint:
  - [Indices.downsample](), documentation [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/xpack-rolluphtml)
- Added the `with_limited_by` boolean parameter in the endpoint `Security.getApiKey`.
  Flag to show the limited-by role descriptors of API Keys.
- Added the `with_profile_uid` boolean parameter in the endpoint `Security.getUser`.
  Flag to retrieve profile uid (if exists) associated to the user.
- Changed the description of `uid` parameter in the endpoint `Security.getUserProfile`.
  A comma-separated list of unique identifier for user profiles.
- Added the `with_limited_by` boolean parameter in the endpoint `Security.queryApiKeys`.
  Flag to show the limited-by role descriptors of API Keys.
- Added the `ecs_compatibility` string parameter in the endpoint `TextStructure.findStructure`.
  Optional parameter to specify the compatibility mode with ECS Grok patterns -
  may be either 'v1' or 'disabled'.

## Release 8.4.0

- Added a `ClientInterface` to simplify the mock of the Client,
  this is a fix for [#1227](https://github.com/elastic/elasticsearch-php/issues/1227)
  [#1249](https://github.com/elastic/elasticsearch-php/pull/1249)
- Added the support of Symfony HTTP client, fixing the issue [#1241](https://github.com/elastic/elasticsearch-php/issues/1241)
  [#1243](https://github.com/elastic/elasticsearch-php/pull/1243)
- Added the API compatibility header
  [#1233](https://github.com/elastic/elasticsearch-php/pull/1233)
- Updated APIs for [Elasticsearch 8.4](https://github.com/elastic/elasticsearch/releases/tag/v8.4.0)
  [7815caa](https://github.com/elastic/elasticsearch-php/commit/7815caac3d9342f13555481bd03ceb8d9c49a881)

## Release 8.3.0

- Updated APIs for [Elasticsearch 8.3](https://github.com/elastic/elasticsearch/releases/tag/v8.3.0)
  [fb117a8](https://github.com/elastic/elasticsearch-php/commit/fb117a813cd28e8c0b9f4350896b66c068bfd072)

## Release 8.2.0

- Updated APIs for [Elasticsearch 8.2](https://github.com/elastic/elasticsearch/releases/tag/v8.2.0)
  [630cb0b](https://github.com/elastic/elasticsearch-php/commit/630cb0bdcd4b864d2ed8cef380665cdb90429eec)
- Added the array support for `text/plain`
  [#1220](https://github.com/elastic/elasticsearch-php/pull/1220) 

## Release 8.1.0

- Updated APIs for [Elasticsearch 8.1](https://github.com/elastic/elasticsearch/releases/tag/v8.1.0)
  [e4c2ac9](https://github.com/elastic/elasticsearch-php/commit/e4c2ac9b2c71e06c99b7a43712ccd83711fe6510)

## Release 8.0.1

- Fixed `NoNodeAvailableException` exception in endpoints
  [e7d448d](https://github.com/elastic/elasticsearch-php/commit/e7d448d540f120eb3a3e3fe0d5866bf62fb67f3a)

## Release 8.0.0

- Finally released 8.0.0 GA.

## Release 8.0.0-rc2

- Added the common parameters in all the endpoints
  [6427f8c](https://github.com/elastic/elasticsearch-php/commit/6427f8c42ba2afbe82c00adffdf93dd60b439432)

## Release 8.0.0-rc1

- Fixed query string in API endpoints + added a first integration test
  [e404235](https://github.com/elastic/elasticsearch-php/commit/e404235890b53a99242f7fc5ddea6ee6b2459e8f)
- Added AdapterOptions class and setNodePool() in ClientBuilder
  [9150f71](https://github.com/elastic/elasticsearch-php/commit/9150f717488ddb74d83a119d215c0584aa98c95a)
- Fixed urlencode in params, Exception in test code generation
  [142327b](https://github.com/elastic/elasticsearch-php/commit/142327b3cb730042ec0b21b7c6076164bb0721ed)
- Improved client/server response exception messages
  [50de3e6](https://github.com/elastic/elasticsearch-php/commit/50de3e60fc9b0167a948a992fda78bc5e1a42152)

## Release 8.0.0-alpha

First alpha release of elasticsearch-php 8.0.0.

This major release is a complete new PHP client for Elasticsearch. We build it from scratch!
We tried to reduce the BC breaks as much as possible but there are some (big) differences: 

### Architectural changes:

- we changed the namespace, now everything is under `Elastic\Elasticsearch`
- we used the [elastic-transport-php](https://github.com/elastic/elastic-transport-php) library for HTTP communications;
- we changed the `Exception` model, using the namespace `Elastic\Elasticsearch\Exception`. All the exceptions extends the
  `ElasticsearchException` interface, as in 7.x
- we changed the response type of each endpoints using an [Elasticsearch](src/Response/Elasticsearch.php) response class.
  This class wraps a a [PSR-7](https://www.php-fig.org/psr/psr-7/) response allowing the access of the body response
  as array or object. This means you can access the API response as in 7.x, no BC break here! :angel:
- we changed the `ConnectionPool` in `NodePool`. The `connection` naming was ambigous since the objects are nodes (hosts)

You can have a look at the [BREAKING_CHANGES](BREAKING_CHANGES.md) file for more information.

## Release 7.17.0

- Allow psr/log v3
  [#1184](https://github.com/elastic/elasticsearch-php/pull/1184)

## Release 7.16.0

- Added support of includePortInHostHeader in ClientBuilder::fromConfig
  [#1181](https://github.com/elastic/elasticsearch-php/pull/1181)
- Fixed UTF-16 issue in SmartSerializer with single unpaired surrogate in unicode escape
  [#1179](https://github.com/elastic/elasticsearch-php/pull/1179)
- Replace trait with abstract class to avoid Deprecated Functionality issue in PHP 8.1
  [#1175](https://github.com/elastic/elasticsearch-php/pull/1175)

## Release 7.15.0

- Updated endpoints for Elasticsearch 7.15.0
  [995f6d4](https://github.com/elastic/elasticsearch-php/commit/995f6d4bde7de76004e95d7a434b1d59da7a7e75)

## Release 7.14.0

- Usage of psr/log version 2
  [#1154](https://github.com/elastic/elasticsearch-php/pull/1154)
- Update search iterators to send `scroll_id` inside the request body
  [#1134](https://github.com/elastic/elasticsearch-php/pull/1134)
- Added the `ingest.geoip.downloader.enabled=false` setting for ES
  [5867351](https://github.com/elastic/elasticsearch-php/commit/586735109dc18f22bfdf3b73ab0621b37e857be1)
- Removed phpcs for autogenerated files (endpoints)
  [651c57b](https://github.com/elastic/elasticsearch-php/commit/651c57b2e6bf98a0fd48220949966e630e5a804a)

## Release 7.13.1

- Added port in url for trace and logger messages
  [#1126](https://github.com/elastic/elasticsearch-php/pull/1126) 
## Release 7.13.0

- (DOCS) Added the HTTP meta data section
  [#1143](https://github.com/elastic/elasticsearch-php/pull/1143)
- Added support for API Compatibility Header
  [#1142](https://github.com/elastic/elasticsearch-php/pull/1142)
- (DOCS) Added Helpers section to PHP book
  [#1129](https://github.com/elastic/elasticsearch-php/pull/1129)
- Added the API description in phpdoc section for each endpoint
  [9e05c81](https://github.com/elastic/elasticsearch-php/commit/9e05c8108b638b60cc676b6a4f4be97c7df9eb64)
- Usage of PHPUnit 9 only + migrated xml configurations
  [038b5dd](https://github.com/elastic/elasticsearch-php/commit/038b5dd043dc76b20b9f5f265ea914a38d33568d)

## Release 7.12.0

- Updated the endpoints for ES 7.12 + removed cpliakas/git-wrapper
  in favor of symplify/git-wrapper
  [136d5b9](https://github.com/elastic/elasticsearch-php/commit/136d5b9717b3806c6b34ef8a5076bfe7cee8b46e)
- Fixed warning header as array in YAML tests generator
  [0d81be1](https://github.com/elastic/elasticsearch-php/commit/0d81be131bfc7eff6ef82468e61c16077a892aab)
- Refactored TEST_SUITE with free, platinum + removed old YamlRunnerTest
  [f69d96f](https://github.com/elastic/elasticsearch-php/commit/f69d96fc283580177002b4088c279c3d0c07befe)
  
## Release 7.11.0

- Added the `X-Elastic-Client-Meta` header which is used by Elastic Cloud
  and can be disabled with `ClientBuilder::setElasticMetaHeader(false)`
  [#1089](https://github.com/elastic/elasticsearch-php/pull/1089)
- Replaced `array_walk` with `array_map` in `Connection::getURI` for PHP 8
  compatibility
  [#1075](https://github.com/elastic/elasticsearch-php/pull/1075)
- Remove unnecessary `InvalidArgumentExceptions`
  [#1069](https://github.com/elastic/elasticsearch-php/pull/1069)
- Introducing PHP 8 compatibility
  [#1063](https://github.com/elastic/elasticsearch-php/pull/1063) 
- Replace Sami by Doctum and fix `.gitignore`
  [#1062](https://github.com/elastic/elasticsearch-php/pull/1062)

## Release 7.10.0

- Updated endpoints and namespaces for Elasticsearch 7.10
  [3ceb748](https://github.com/elastic/elasticsearch-php/commit/3ceb7484a111aa20126168460c79f098c4fe0792)
- Fixed ClientBuilder::fromConfig allowing multiple function
  parameters (e.g. setApiKey)
  [#1076](https://github.com/elastic/elasticsearch-php/pull/1076)
- Refactored the YAML tests using generated PHPUnit code
  [85fadc2](https://github.com/elastic/elasticsearch-php/commit/85fadc2bd4b2b309b19761a50ff13010d43a524d)

## Release 7.9.1

- Fixed using object instead of array in onFailure transport event
  [#1066](https://github.com/elastic/elasticsearch-php/pull/1066)
- Fixed reset custom header after endpoint call
  [#1065](https://github.com/elastic/elasticsearch-php/pull/1065)
- Show generic error messages when server returns no response
  [#1056](https://github.com/elastic/elasticsearch-php/pull/1056)

## Release 7.9.0

- Updated endpoints and namespaces for Elasticsearch 7.9
  [28bf0ed](https://github.com/elastic/elasticsearch-php/commit/28bf0ed6df6bc95f83f369509431d97907bfdeb0)
- Moved `scroll_id` into `body` for search operations in the documentation
  [#1052](https://github.com/elastic/elasticsearch-php/pull/1052)
- Fixed PHP 7.4 preloading feature for autoload.php
  [#1051](https://github.com/elastic/elasticsearch-php/pull/1051)
- Improved message of JSON errors using `json_last_error_msg()`
  [#1045](https://github.com/elastic/elasticsearch-php/pull/1045)

## Release 7.8.0

- Updated endpoints and namespaces for Elasticsearch 7.8
  [f2a0828](https://github.com/elastic/elasticsearch-php/commit/f2a0828d5ee9d126ad63e2a1d43f70b4013845e2)
- Improved documentation
  [#1038](https://github.com/elastic/elasticsearch-php/pull/1038)
  [#1027](https://github.com/elastic/elasticsearch-php/pull/1027)
  [#1025](https://github.com/elastic/elasticsearch-php/pull/1025)

## Release 7.7.0

- Removed setId() into endpoints, fixed `util/GenerateEndpoints.php`
  [#1026](https://github.com/elastic/elasticsearch-php/pull/1026)
- Fixes JsonErrorException with code instead of message
  [#1022](https://github.com/elastic/elasticsearch-php/pull/1022)
- Better exception message for Could not parse URI
  [#1016](https://github.com/elastic/elasticsearch-php/pull/1016)
- Added JUnit log for PHPUnit
  [88b7e1c](https://github.com/elastic/elasticsearch-php/commit/88b7e1ce80a5a52c1d64d00c55fef77097bbd8a9)
- Added the XPack endpoints
  [763d91a](https://github.com/elastic/elasticsearch-php/commit/763d91a3d506075316b84a38b2bed7a098da5028)

## Release 7.6.1

- Fixed issue with `guzzlehttp/ringphp` and `guzzle/streams`
  using forks `ezimuel/ringphp` and `ezimuel/guzzlestreams`
  [92a6a4a](https://github.com/elastic/elasticsearch-php/commit/92a6a4adda5eafd1823c7c9c386e2c7e5e75cd08)

## Release 7.6.0

- Generated the new endpoints for Elasticsearch 7.6.0
  [be31f31](https://github.com/elastic/elasticsearch-php/commit/be31f317af704f333b43bbcc7c01ddc7c91ec6f8)

## Release 7.5.1

- Fixes port missing in log [#925](https://github.com/elastic/elasticsearch-php/issues/925)
  [75e0888](https://github.com/elastic/elasticsearch-php/commit/125594b40d167ef1509b3ee49a3f93426390c426)
- Added `ClientBuilder::includePortInHostHeader()` to add the
  `port` in the `Host` header. This fixes [#993](https://github.com/elastic/elasticsearch-php/issues/993).
  By default the `port` is not included in the `Host` header.
  [#997](https://github.com/elastic/elasticsearch-php/pull/997)
- Replace abandoned packages: ringphp, streams and phpstan-shim 
  [#996](https://github.com/elastic/elasticsearch-php/pull/996)
- Fixed gzip compression when setting Cloud Id
  [#986](https://github.com/elastic/elasticsearch-php/pull/986)

## Release 7.5.0

- Fixed `Client::extractArgument` iterable casting to array;
  this allows passing a `Traversable` body for some endpoints
  (e.g. Bulk, Msearch, MsearchTemplate)
  [#983](https://github.com/elastic/elasticsearch-php/pull/983)
- Fixed the Response Exception if the `reason` field is null
  [#980](https://github.com/elastic/elasticsearch-php/pull/980)
- Added support for PHP 7.4
  [#976](https://github.com/elastic/elasticsearch-php/pull/976)

## Release 7.4.1

- We added the suppress operator `@` for the deprecation messages `@trigger_error()`.
  With this approach we don't break existing application that convert PHP errors in Exception
  (e.g. using Laravel with issue https://github.com/babenkoivan/scout-elasticsearch-driver/issues/297)
  Using the `@` operator is still possible to intercept the deprecation message using
  a custom error handler.
  [#973](https://github.com/elastic/elasticsearch-php/pull/973)
- Add missing leading slash in the URL of put mapping endpoint
  [#970](https://github.com/elastic/elasticsearch-php/pull/970)
- Fix pre 7.2 endpoint class name with aliases + reapply fix #947.
  This PR solved the unexpected BC break introduce in 7.4.0 with the code
  generation tool
  [#968](https://github.com/elastic/elasticsearch-php/pull/968)

## Release 7.4.0

- Added the code generation for endpoints and namespaces based on
  the [REST API specification](https://github.com/elastic/elasticsearch/tree/v7.4.2/rest-api-spec/src/main/resources/rest-api-spec/api)
  of Elasticsearch. This tool is available in `util/GenerateEndpoints.php`.
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- Fixed the asciidoc [endpoints documentation](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/ElasticsearchPHP_Endpoints.html) based on the code generation 
  using [Sami](https://github.com/FriendsOfPHP/Sami) project
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- All the `experimental` and `beta` APIs are now signed with
  a `@note` tag in the phpdoc section (e.g. [$client->rankEval()](https://github.com/elastic/elasticsearch-php/blob/master/src/Elasticsearch/Client.php)). For more information read the [experimental and beta APIs](docs/experimental-beta-apis.asciidoc)
  section in the documentation.
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- Removed `AlreadyExpiredException` since it has been removed
  from Elasticsearch with https://github.com/elastic/elasticsearch/pull/24857
  [#954](https://github.com/elastic/elasticsearch-php/pull/954)

## Release 7.3.0

- Added support for simplified access to the `X-Opaque-Id` header
  [#952](https://github.com/elastic/elasticsearch-php/pull/952)
- Added the HTTP port in the log messages
  [#950](https://github.com/elastic/elasticsearch-php/pull/950)
- Fixed hostname with underscore (ClientBuilder::prependMissingScheme)
  [#949](https://github.com/elastic/elasticsearch-php/pull/949)
- Removed unused Monolog in ClientBuilder
  [#948](https://github.com/elastic/elasticsearch-php/pull/948)
  
## Release 7.2.2

- Reintroduced the optional parameter in `Elasticsearch\Namespaces\IndicesNamespace::getAliases()`.
  This fixes the BC break introduced in 7.2.0 and 7.2.1.
  [#947](https://github.com/elastic/elasticsearch-php/pull/)

## Release 7.2.1

- Reintroduced `Elasticsearch\Namespaces\IndicesNamespace::getAliases()` as proxy
  to `IndicesNamespace::getAlias()` to prevent BC breaks. The `getAliases()` is
  marked as deprecated and it will be removed from `elasticsearch-php 8.0`
  [#943](https://github.com/elastic/elasticsearch-php/pull/943)

### Docs

- Fixed missing put mapping code snippet in code examples
  [#938](https://github.com/elastic/elasticsearch-php/pull/938)

# Release 7.2.0

- Updated the API endpoints for working with Elasticsearch 7.2.0:
    - added `wait_for_active_shards` parameter to `indices.close` API;
    - added `expand_wildcards` parameter to `cluster.health` API;
    - added include_unloaded_segments`, `expand_wildcards`, `forbid_closed_indices`
      parameters to `indices.stats` API.
  [[27d721b]](https://github.com/elastic/elasticsearch-php/pull/933/commits/27d721ba44b8c199388650c5a1c8bd69757229aa)
- Updated the phpdoc parameters for all the API endpoints
  [[27d721b]](https://github.com/elastic/elasticsearch-php/pull/933/commits/27d721ba44b8c199388650c5a1c8bd69757229aa)  
- Improved the Travis CI speed using cache feature with composer
  [#929](https://github.com/elastic/elasticsearch-php/pull/929)
- Fixed `php_uname()` usage checking if it is disabled
  [#927](https://github.com/elastic/elasticsearch-php/pull/927)
- Added support of Elastic Cloud ID and API key authentication
  [#923](https://github.com/elastic/elasticsearch-php/pull/923)

## Release 7.1.1

- Fixed `ClientBuilder::setSSLVerification()` to accept string or boolean
  [#917](https://github.com/elastic/elasticsearch-php/pull/917)
- Fix type hinting for `setBody` in `Elasticsearch\Endpoints\Ingest\Pipeline\Put`
  [#913](https://github.com/elastic/elasticsearch-php/pull/913)

## Release 7.1.0

- Added warning log for Elasticsearch response containing the `Warning` header
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)
- Fixed #838 hosting company is blocking ports because of `YamlRunnerTest.php`
  [#844](https://github.com/elastic/elasticsearch-php/pull/844)
- Specialized inheritance of `NoNodesAvailableException` to extend `ServerErrorResponseException`
  instead of the generic `\Exception`
  [#607](https://github.com/elastic/elasticsearch-php/pull/607)
- Fixed scroll TTL is extracted but not set as a body param
  [#907](https://github.com/elastic/elasticsearch-php/pull/907)

### Testing

- Improved the speed of integration tests removing snapshots delete from `YamlRunnerTest::clean`
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)
- Reduced the number of skipping YAML integration tests from 20 to 6
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)

### Docs

- Documentation updated for Elasticsearch 7
  [#904](https://github.com/elastic/elasticsearch-php/pull/904)

## Release 7.0.2

- Fixed incorrect return type hint when using async requests/futures
  [#905](https://github.com/elastic/elasticsearch-php/pull/905)

## Release 7.0.1

- Fixed SniffingConnectionPool removing the return type of Connection::sniff()
  [#899](https://github.com/elastic/elasticsearch-php/pull/899)

## Release 7.0.0

- Requirement of PHP 7.1 instead of 7.0 that is not supported since 1 Jan 2019.
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Code refactoring using type hints and return type declarations where possible
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Update vendor libraries (PHPUnit 7.5, Symfony YAML 4.3, etc)
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Updated all the API endpoints using the [latest 7.0.0 specs](https://github.com/elastic/elasticsearch/tree/v7.0.0/rest-api-spec/src/main/resources/rest-api-spec/api) of Elasticsearch [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Added the `User-Agent` in each HTTP request [#898](https://github.com/elastic/elasticsearch-php/pull/898)
- Simplified the logging methods `logRequestFail($request, $response, $exception)`
  and `logRequestSuccess($request, $response)` in `Elasticsearch\Connections\Connection`
  [#876](https://github.com/elastic/elasticsearch-php/pull/876)
- Fix `json_encode` for unicode(emoji) characters [856](https://github.com/elastic/elasticsearch-php/pull/856)
- Fix HTTP port specification using CURLOPT_PORT, not anymore in the host [782](https://github.com/elastic/elasticsearch-php/pull/782)

## Release 6.7.1

- Added `track_total_hits` in `search` endpoint [0c9ff47](https://github.com/elastic/elasticsearch-php/commit/9f4f0dfa331c4f50d2c88c0068afd3062e6ea353)

## Release 6.7.0

- Removed requirement of `{type}` part in `indices.put_mapping`, see new API specification [here](https://github.com/elastic/elasticsearch/blob/v6.7.0/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_mapping.json)
- Added `seq_no_primary_term` parameter in `bulk` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `include_type_name`, `if_primary_term`, `if_seq_no` in `delete` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `include_type_name` in `get`, `index`, `indices.create`, `indices.field.get`, `indices.get`, `indices.mapping.get`, `indices.mapping.getfield`, `indices.mapping.put`, `indices.rollover`, `indices.template.get`, `indices.template.put` endpoints [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `seq_no_primary_term` in `search` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `if_primary_term', 'if_seq_no`in `update` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)

### Testing

- Fix tests for PHP 7 with ES 6.7 [[5401479](https://github.com/elastic/elasticsearch-php/pull/884/commits/5401479)

### Docs

- [DOCS] Fix doc links in README [[5a1782d]](https://github.com/elastic/elasticsearch-php/pull/884/commits/5a1782d)

## Release 6.5.0

- Remove `_suggest` endpoint, which has disappeared from ES6 [#763](https://github.com/elastic/elasticsearch-php/pull/763)
- Fix `SearchHitIterator` key duplicates [#872](https://github.com/elastic/elasticsearch-php/pull/872)
- Fixing script get and delete by removing `lang` from endpoint url [#814](https://github.com/elastic/elasticsearch-php/pull/814)
- Fix `SearchResponseIterator` is scrolling the first page twice [#871](https://github.com/elastic/elasticsearch-php/pull/871), issue [#595](https://github.com/elastic/elasticsearch-php/issues/595)

### Docs

- [DOCS] Add reference to `parse_url()` for Extended Host Configuration [#778](https://github.com/elastic/elasticsearch-php/pull/778)
- [DOCS] Update php version requirement [#757](https://github.com/elastic/elasticsearch-php/pull/757)
- [DOCS] Update `community.asciidoc`, added `ElasticSearchQueryDSL` project [#749](https://github.com/elastic/elasticsearch-php/pull/749)
- [DOCS] Proper return type array for get method for `IndicesNamespace` [#651](https://github.com/elastic/elasticsearch-php/pull/651)
- [DOCS] Fix full docs link [#862](https://github.com/elastic/elasticsearch-php/pull/862)
- [DOCS] Update breaking-changes.asciidoc, removal of ClientBuilder::defaultLogger() [879](https://github.com/elastic/elasticsearch-php/pull/879)

### Testing

- Fix integration tests using docker [#867](https://github.com/elastic/elasticsearch-php/pull/867)

## Release 6.1.0

- Add 'wait_for_no_initializing_shards' to Cluster\Health whitelist [[98a372c]](http://github.com/elasticsearch/elasticsearch-php/commit/98a372c)
- Add 'wait_for_active_shards' to Indices\Open whitelist [[0275fe5]](http://github.com/elasticsearch/elasticsearch-php/commit/0275fe5)
- Add 'max_concurrent_searches' to msearch whitelist [[5624123]](http://github.com/elasticsearch/elasticsearch-php/commit/5624123)
- Add 'max_concurrent_shard_requests' param to MSearch endpoint [[00800c1]](http://github.com/elasticsearch/elasticsearch-php/commit/00800c1)
- Add ReloadSecureSettings endpoint [[75b32b2]](http://github.com/elasticsearch/elasticsearch-php/commit/75b32b2)
- Remove obsolete Shutdown API [[c75d690]](http://github.com/elasticsearch/elasticsearch-php/commit/c75d690)
- Fix: Restore::setBody() does not throw exceptions (#828) [[a96bb9c]](http://github.com/elasticsearch/elasticsearch-php/commit/a96bb9c)
- Fixed php 7.3 compatibility for elasticsearch 6 (#827) [[77916b2]](http://github.com/elasticsearch/elasticsearch-php/commit/77916b2)
- Fix issue with getting status of respository and snapshots. (#719) [[2d11682]](http://github.com/elasticsearch/elasticsearch-php/commit/2d11682)
- fix DeleteByQuery param white list (#748) [[8d963c6]](http://github.com/elasticsearch/elasticsearch-php/commit/8d963c6)

### Docs
- [Docs] Update elasticsearch version (#743) [[043ad4f]](http://github.com/elasticsearch/elasticsearch-php/commit/043ad4f)
- [DOCS] reuqest → request typo fix (#728) [[68db9f0]](http://github.com/elasticsearch/elasticsearch-php/commit/68db9f0)
- [DOCS] Fix documentation example of upsert (#730) [[805329b]](http://github.com/elasticsearch/elasticsearch-php/commit/805329b)
- [DOCS] Replace deprecated string type with keyword type for index operations (#736) [[a550507]](http://github.com/elasticsearch/elasticsearch-php/commit/a550507)

### Testing

- [TEST] Fix travis untarring [[0106351]](http://github.com/elasticsearch/elasticsearch-php/commit/0106351)
- [TEST] Download artifacts directly, migrate off esvm [[1e9f06c]](http://github.com/elasticsearch/elasticsearch-php/commit/1e9f06c)
- Update Travis Matrix [[aa32b12]](http://github.com/elasticsearch/elasticsearch-php/commit/aa32b12)
- [TEST] Fix teardown in yaml runner [[098030e]](http://github.com/elasticsearch/elasticsearch-php/commit/098030e)
- Add Indices/Split endpoint [[46d5a7a]](http://github.com/elasticsearch/elasticsearch-php/commit/46d5a7a)
- [TEST] Blacklist some bad yml tests [[d5edab7]](http://github.com/elasticsearch/elasticsearch-php/commit/d5edab7)

## Release 6.0.1

- Fix imports [[0106351]](http://github.com/elasticsearch/elasticsearch-php/commit/0106351)
- ClientBuilder: setLogger() and setTracer() only accept \Psr\Log\LoggerInterface (#673) [[0270c4f]](http://github.com/elasticsearch/elasticsearch-php/commit/0270c4f)
- fix for invalid GET /_aliases route. (#663) [[6d467fa]](http://github.com/elasticsearch/elasticsearch-php/commit/6d467fa)
- Remove PutTemplate endpoint, lang param of PutScript no longer used [[a13544f]](http://github.com/elasticsearch/elasticsearch-php/commit/a13544f)
  Note: I'm considering PutTemplate removal a bugfix, since the API doesn't exist in ES Core anymore. Using the endpoint throws an error,
  so the removal is just fixing an existing bug, hence `6.0.1` instead of `6.1.0`

### Docs
- [DOCS] Add note about separate X-Pack library to README (#694) [[6ffdef8]](http://github.com/elasticsearch/elasticsearch-php/commit/6ffdef8)
- [DOCS] add link to community index helper (#681) [[644f7f7]](http://github.com/elasticsearch/elasticsearch-php/commit/644f7f7)
- [DOCS] Add missing content for breaking changes page [[5a515ac]](http://github.com/elasticsearch/elasticsearch-php/commit/5a515ac)
- [DOCS] update autogenerated api docs [[7f2cd0b]](http://github.com/elasticsearch/elasticsearch-php/commit/7f2cd0b)
- [DOCS] Update version tables [[b824bb7]](http://github.com/elasticsearch/elasticsearch-php/commit/b824bb7)

## Release 6.0.0


- Add Ingest\ProcessorGrok endpoint [[800b1ec]](http://github.com/elasticsearch/elasticsearch-php/commit/800b1ec)
- Add Cluster\RemoteInfo endoint [[dfd8c3c]](http://github.com/elasticsearch/elasticsearch-php/commit/dfd8c3c)
- Add Unauthorized401Exception [[cc68efd]](http://github.com/elasticsearch/elasticsearch-php/commit/cc68efd)
- Add verify as acceptable query string parameter for createRepository (#665) [[885bfea]](http://github.com/elasticsearch/elasticsearch-php/commit/885bfea)
- Fix parsing of NodesInfo for Sniffing [[e22f67f]](http://github.com/elasticsearch/elasticsearch-php/commit/e22f67f)
- Do not schedule connection pool checks on 4xx level errors [[fd75e99]](http://github.com/elasticsearch/elasticsearch-php/commit/fd75e99)
- Add 'terminate_after' to Count endpoint whitelist (#634) [[c3cacd7]](http://github.com/elasticsearch/elasticsearch-php/commit/c3cacd7)

### Docs
- [DOCS] Flip Branch / PHP Version table (#656) [[fa7bfb3]](http://github.com/elasticsearch/elasticsearch-php/commit/fa7bfb3)

### Testing
- [TEST] use proper TestCase parent clsas [[766b440]](http://github.com/elasticsearch/elasticsearch-php/commit/766b440)
- [TEST] add PHPStan to build (#628) [[946cd65]](http://github.com/elasticsearch/elasticsearch-php/commit/946cd65)
- [TEST] Fix some PHPCS violations in tests [[18a38dd]](http://github.com/elasticsearch/elasticsearch-php/commit/18a38dd)
- [src] add PHP_CodeSniffer (#647) [[24900ef]](http://github.com/elasticsearch/elasticsearch-php/commit/24900ef)
- [TEST] add PHP_CodeSniffer to build (#638) [[088a509]](http://github.com/elasticsearch/elasticsearch-php/commit/088a509)
- [TEST] Use tests from corresponding ES version (#649) [[75c6680]](http://github.com/elasticsearch/elasticsearch-php/commit/75c6680)
- [TEST] Add support for `bad_request` in yaml runner [[ad86f91]](http://github.com/elasticsearch/elasticsearch-php/commit/ad86f91)
- [TEST] `max_compilations_per_minute` is now `max_compilations_rate` [[ebdba06]](http://github.com/elasticsearch/elasticsearch-php/commit/ebdba06)
- [TEST] print elasticsearch.log if cluster fails to start [[fe796aa]](http://github.com/elasticsearch/elasticsearch-php/commit/fe796aa)
- [TEST] move integration test to dedicated test file [[71ccfc1]](http://github.com/elasticsearch/elasticsearch-php/commit/71ccfc1)
- [TEST] Client does not support accepting Yaml format responses [[fc9a9f9]](http://github.com/elasticsearch/elasticsearch-php/commit/fc9a9f9)



## Release 6.0.0-beta1

Woo!

- Use upper-case "Host" header [[045aac4]](http://github.com/elasticsearch/elasticsearch-php/commit/045aac4)
- Add 'allow_no_indices' param to Indices\Delete whitelist [[3a3a5ab]](http://github.com/elasticsearch/elasticsearch-php/commit/3a3a5ab)
- Add 'verbose' param to Snapshot\Get whitelist [[b70b933]](http://github.com/elasticsearch/elasticsearch-php/commit/b70b933)
- Add 'pre_filter_shard_size' param to Search whitelist [[f708d9d]](http://github.com/elasticsearch/elasticsearch-php/commit/f708d9d)
- Add 'ignore_unavailable' param to Indices\Delete whitelist [[8133021]](http://github.com/elasticsearch/elasticsearch-php/commit/8133021)
- Add 'include_defaults' param to Cluster\Settings\Get whitelist [[8e5ab38]](http://github.com/elasticsearch/elasticsearch-php/commit/8e5ab38)

### Docs
- [DOCS] Remove Sami from composer.json and update docs (#619) [[fcd5ff1]](http://github.com/elasticsearch/elasticsearch-php/commit/fcd5ff1)
- [Docs] recommend composer/ca-bundle instead of Kdyby/CurlCaBundle (#613) [[7f43b2e]](http://github.com/elasticsearch/elasticsearch-php/commit/7f43b2e)


### Testing

- [TEST] Fix content-type assertions in test to match case [[5b37117]](http://github.com/elasticsearch/elasticsearch-php/commit/5b37117)
- Capitalize 'Content-Type' for maximum compatibility [[b8ad96c]](http://github.com/elasticsearch/elasticsearch-php/commit/b8ad96c)
- [TEST] Use percentage watermarks to be compatible with default flood [[95d2f89]](http://github.com/elasticsearch/elasticsearch-php/commit/95d2f89)
- [TEST] remove watermark flood from static config [[9b71940]](http://github.com/elasticsearch/elasticsearch-php/commit/9b71940)
- Shrink API was not setting body correctly [[e0f0985]](http://github.com/elasticsearch/elasticsearch-php/commit/e0f0985)
- [TEST] Add some missing and required static configs [[38febbe]](http://github.com/elasticsearch/elasticsearch-php/commit/38febbe)
- [TEST] Allow skipping individual tests inside of test file [[51b9b9b]](http://github.com/elasticsearch/elasticsearch-php/commit/51b9b9b)
- Travis: add PHP 7.2 + ES 6.0 to build matrix (#622) [[061f100]](http://github.com/elasticsearch/elasticsearch-php/commit/061f100)
- [TEST] tests code cleanup (#618) [[dc5d18c]](http://github.com/elasticsearch/elasticsearch-php/commit/dc5d18c)
- [TEST] Fix RoundRobinSelector Tests (#617) [[23a0ba8]](http://github.com/elasticsearch/elasticsearch-php/commit/23a0ba8)
- [TEST] skip new percentile tests for now [[b5d9613]](http://github.com/elasticsearch/elasticsearch-php/commit/b5d9613)
- [TEST] drop HHVM from build [#611] (#616) [[21a2d24]](http://github.com/elasticsearch/elasticsearch-php/commit/21a2d24)
- [TEST] Skip cat.aliases/20_headers.yml [[c83ca74]](http://github.com/elasticsearch/elasticsearch-php/commit/c83ca74)
- [TEST] YamlRunnerTest should run both .yml and .yaml files [[98c2646]](http://github.com/elasticsearch/elasticsearch-php/commit/98c2646)
- [TEST] build against ES 6 on Travis [[b5886a8]](http://github.com/elasticsearch/elasticsearch-php/commit/b5886a8)
- [TEST] drop HHVM from build [#611] [[0a7b402]](http://github.com/elasticsearch/elasticsearch-php/commit/0a7b402)
- [TEST] test tweaks to appease stricter types [[51f189e]](http://github.com/elasticsearch/elasticsearch-php/commit/51f189e)
- Fix ClientBuilder - pass correct argument for Elasticsearch\Endpoints\MsearchTemplate::__construct. (#605) [[5f83b52]](http://github.com/elasticsearch/elasticsearch-php/commit/5f83b52)
- [TEST] improve code quality of tests (#610) [[9ea2156]](http://github.com/elasticsearch/elasticsearch-php/commit/9ea2156)
- [TEST] Support headers in yaml runner, do some bad-comment cleaning [[57b5489]](http://github.com/elasticsearch/elasticsearch-php/commit/57b5489)
- [TEST] fix handling of format for Cat tests [[a24b7d1]](http://github.com/elasticsearch/elasticsearch-php/commit/a24b7d1)
- [TEST] test files are now .yml instead of .yaml [[ceac5bd]](http://github.com/elasticsearch/elasticsearch-php/commit/ceac5bd)
