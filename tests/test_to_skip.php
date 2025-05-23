<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */

// A list of tests in elasticsearch-clients-tests to be skipped
return [
    'cat/aliases.yml',
    'cat/count.yml',
    'cat/fielddata.yml',
    'cat/ml.yml',
    'cat/shards.yml',
    'cluster/delete_voting_config_exclusions.yml',
    'cluster/pending_tasks.yml',
    'cluster/voting_config_exclusions.yml',
    'dangling_indices/10_basic.yml',
    'enrich/20_stats.yml',
    'entsearch/10_basic.yml',
    'entsearch/20_connector.yml',
    'entsearch/30_sync_jobs_stack.yml',
    'indices/alias.yml',
    'indices/10_data_lifecycle.yml',
    'indices/20_data_lifecycle.yml',
    'indices/disk_usage.yml',
    'indices/exists_template.yml',
    'indices/exists.yml',
    'indices/forcemerge.yml',
    'indices/get.yml',
    'indices/index_template.yml',
    'indices/settings.yml',
    'indices/simulate_index_template.yml',
    'indices/simulate_template.yml',
    'indices/stats.yml',
    'indices/template.yml',
    'ingest/20_geoip.yml',
    'ingest/30_ip_location_database.yml',
    'license/10_stack.yml',
    'machine_learning/buckets_stack.yml',
    'machine_learning/datafeed_crud.yml',
    'machine_learning/explain_data_frame_analytics.yml',
    'machine_learning/get_memory_stats.yml',
    'machine_learning/jobs_crud.yml',
    'machine_learning/model_snapshots.yml',
    'machine_learning/post_data.yml',
    'machine_learning/preview_datafeed.yml',
    'machine_learning/revert_model_snapshot.yml',
    'machine_learning/set_upgrade_mode.yml',
    'machine_learning/10_trained_model.yml',
    'machine_learning/update_model_snapshot.yml',
    'migration/30_create_from.yml',
    'migration/20_reindex.yml',
    'query_rules/30_test.yml',
    'search_application/10_basic.yml',
    'search_mvt/10_basic.yml',
    'searchable_snapshots/10_basic.yml',
    'search_template/10_basic.yml',
    'security/10_api_key_basic.yml',
    'security/30_privileges_stack.yml',
    'security/40_roles.yml',
    'security/60_api_key_update.yml',
    'security/100_tokens.yml',
    'security/120_get_settings.yml',
    'snapshot/10_basic.yml',
    'ssl.yml',
    'tasks.yml',
    'transform/10_basic.yml'
];