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
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Tests;

use Exception;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ElasticsearchException;
use Nyholm\Psr7\Factory\Psr17Factory;

class Utility
{
    /**
     * @var string
     */
    private static $version;

    /**
     * @var bool
     */
    private static $hasXPack = false;

    /**
     * @var bool
     */
    private static $hasIlm = false;

    /**
     * @var bool
     */
    private static $hasRollups = false;

    /**
     * @var bool
     */
    private static $hasCcr = false;

    /**
     * @var bool
     */
    private static $hasShutdown = false;

    /**
     * @var bool
     */
    private static $hasMl = false;

    /**
     * Get the host URL based on ENV variables
     */
    public static function getHost(): ?string
    {
        $url = getenv('ELASTICSEARCH_URL');
        if (false !== $url) {
            return $url;
        }
        if (getenv('TEST_SUITE') === 'free') {
            return 'http://localhost:9200';
        }
        return 'https://localhost:9200';
    }

    /**
     * Build a Client based on ENV variables
     */
    public static function getClient(): Client
    {
        if (getenv('ELASTIC_API_KEY') !== false) {
            return ClientBuilder::create()
                ->setHosts([self::getHost()])
                ->setApiKey(getenv('ELASTIC_API_KEY'))
                ->build();
        }
        if (getenv('TEST_SUITE') === 'free') {
            return ClientBuilder::create()
                ->setHosts([self::getHost()])
                ->build();
        }
        return ClientBuilder::create()
            ->setHosts([self::getHost()])
            ->setBasicAuthentication('elastic', 'changeme')
            ->setSSLVerification(false)
            ->build();
    }

    /**
     * Create a "x_pack_rest_user" user, used by some XPack YAML tests
     */
    public static function initYamlXPackUsers(Client $client): void
    {
        $client->security()->putUser([
            'username' => 'x_pack_rest_user',
            'body' => [
                'password' => 'x-pack-test-password',
                'roles' => ['superuser']
            ]
        ]);
    }

    /**
     * Remove the "x_pack_rest_user" user, used by some XPack YAML tests
     */
    public static function removeYamlXPackUsers(Client $client): void
    {
        try {
            $client->security()->deleteUser([
                'username' => 'x_pack_rest_user'
            ]);
        } catch (ClientResponseException $e) {
            if ($e->getCode() !== 404) {
                throw $e;
            }
        }
    }

    public static function getVersion(Client $client): string
    {
        if (!isset(self::$version)) {
            $result = $client->info();
            self::$version = $result['version']['number'];
        }
        return self::$version;
    }

    /**
     * Read the plugins installed in Elasticsearch using the
     * undocumented API GET /_nodes/plugins
     * 
     * @see ESRestTestCase.java:initClient()
     */
    private static function readPlugins(Client $client): void
    {
        $psr17Factory = new Psr17Factory();
        $result = $client->sendRequest($psr17Factory->createRequest('GET', '/_nodes/plugins'));
        foreach ($result['nodes'] as $node) {
            foreach ($node['modules'] as $module) {
                if (substr($module['name'], 0, 6) === 'x-pack') {
                    self::$hasXPack = true;
                }
                if ($module['name'] === 'x-pack-ilm') {
                    self::$hasIlm = true;
                }
                if ($module['name'] === 'x-pack-rollup') {
                    self::$hasRollups = true;
                }
                if ($module['name'] === 'x-pack-ccr') {
                    self::$hasCcr = true;
                }
                if ($module['name'] === 'x-pack-shutdown') {
                    self::$hasShutdown = true;
                }
                if ($module['name'] === 'x-pack-ml') {
                    self::$hasMl = true;
                }
            }
        }
    }

    /**
     * Clean up the cluster after a test
     * 
     * @see ESRestTestCase.java:cleanUpCluster()
     */
    public static function cleanUpCluster(Client $client): void
    {
        self::readPlugins($client);

        self::ensureNoInitializingShards($client);
        self::wipeCluster($client);
        self::waitForClusterStateUpdatesToFinish($client);
    }

    /**
     * Waits until all shard initialization is completed.
     * This is a handy alternative to ensureGreen as it relates to all shards
     * in the cluster and doesn't require to know how many nodes/replica there are.
     * 
     * @see ESRestTestCase.java:ensureNoInitializingShards()
     */
    private static function ensureNoInitializingShards(Client $client): void
    {
        $client->cluster()->health([
            'wait_for_no_initializing_shards' => true,
            'timeout' => '70s',
            'level' => 'shards'
        ]);
    }
    /**
     * Determines whether the system feature reset API should be invoked between tests. The default implementation is to reset
     * all feature states, deleting system indices, system associated indices, and system data streams.
     * 
     * @see https://github.com/elastic/elasticsearch/blob/main/test/framework/src/main/java/org/elasticsearch/test/rest/ESRestTestCase.java#L546
     */

    private static function resetFeaturesStates(Client $client): bool
    {
        return self::$hasMl || version_compare(self::getVersion($client), '8.6.99') > 0;
    }

     /**
     * Delete the cluster
     * 
     * @see ESRestTestCase.java:wipeCluster()
     */
    private static function wipeCluster(Client $client): void
    {
        if (self::$hasRollups) {
            self::wipeRollupJobs($client);
            self::waitForPendingRollupTasks($client);        
        }
        self::deleteAllSLMPolicies($client); 

        // Clean up searchable snapshots indices before deleting snapshots and repositories
        if (self::$hasXPack && version_compare(self::getVersion($client), '7.7.99') > 0) {
            self::wipeSearchableSnapshotsIndices($client);
        }

        self::wipeSnapshots($client);
        if (self::resetFeaturesStates($client)) {
            $client->features()->resetFeatures();
        }
        self::wipeDataStreams($client);
        self::wipeAllIndices($client);

        if (self::$hasXPack) {
            self::wipeTemplateForXpack($client);
        } else {
            self::wipeAllTemplates($client);
        }

        self::wipeClusterSettings($client);

        if (self::$hasIlm) {
            self::deleteAllILMPolicies($client);
        }
        if (self::$hasCcr) {
            self::deleteAllAutoFollowPatterns($client);
        }
        if (self::$hasXPack) {
            self::deleteAllTasks($client);
        }
        if (self::$hasMl) {    
            self::deleteMlJobs($client);
            self::deleteMlDataFrameAnalyticsJobs($client);
            self::deleteMlCalendars($client);
            self::deleteMlTrainingModels($client);
        }
        
        self::deleteTransforms($client);
        self::deleteAllNodeShutdownMetadata($client);
    }

    /**
     * Remove all templates
     */
    private static function wipeAllTemplates(Client $client): void
    {
        // Delete templates
        $client->indices()->deleteTemplate([
            'name' => '*'
        ]);
        try {
            // Delete index template
            $client->indices()->deleteIndexTemplate([
                'name' => '*'
            ]);
            // Delete component template
            $client->cluster()->deleteComponentTemplate([
                'name' => '*'
            ]);
        } catch (ElasticsearchException $e) {
            // We hit a version of ES that doesn't support index templates v2 yet, so it's safe to ignore
        }
    }

    /**
     * Delete all the Roolup Jobs for XPack test suite
     * 
     * @see ESRestTestCase.java:wipeRollupJobs()
     */
    private static function wipeRollupJobs(Client $client): void
    {
        # Stop and delete all rollup
        $rollups = $client->rollup()->getJobs([
            'id' => '_all'
        ]);
        if (isset($rollups['jobs'])) {
            foreach ($rollups['jobs'] as $job) {
                try {
                    $client->rollup()->stopJob([
                        'id' => $job['config']['id'],
                        'wait_for_completion' => true,
                        'timeout' => '10s'
                    ]);
                } catch (ClientResponseException $e) {
                    if ($e->getCode() !== 404) {
                        throw $e;
                    }
                }
            }
            foreach ($rollups['jobs'] as $job) {
                try {
                    $client->rollup()->deleteJob([
                        'id' => $job['config']['id']
                    ]);
                } catch (ClientResponseException $e) {
                    if ($e->getCode() !== 404) {
                        throw $e;
                    }
                }
            }
        }
    }

    /**
     * Delete all the Snapshots 
     * 
     * @see ESRestTestCase.java:wipeSnapshots()
     */
    private static function wipeSnapshots(Client $client): void
    {
        $repos = $client->snapshot()->getRepository([
            'repository' => '_all'
        ]);
        foreach ($repos->asArray() as $repository => $value) {
            if ($value['type'] === 'fs') {
                $client->snapshot()->delete([
                    'repository' => $repository,
                    'snapshot' => '*'
                ]);
            }
            try {
                $client->snapshot()->deleteRepository([
                    'repository' => $repository
                ]);
            } catch (ClientResponseException $e) {
                if ($e->getCode() !== 404) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Wait for pending rollup tasks containing "xpack/rollup/job"
     * 
     * @see ESRestTestCase.java:waitForPendingRollupTasks()
     */
    private static function waitForPendingRollupTasks(Client $client): void
    {
        self::waitForPendingTasks($client, 'xpack/rollup/job');
    }

    /**
     * Wait for pending tasks
     * 
     * @see ESRestTestCase.java:waitForPendingTasks()
     */
    private static function waitForPendingTasks(Client $client, string $filter, int $timeout = 30): void
    {
        $start = time();
        do {
            $result = $client->cat()->tasks([
                'detailed' => true
            ]);
            $tasks = explode("\n", $result->asString());
            $count = 0;
            foreach ($tasks as $task) {
                if (empty($task)) {
                    continue;
                }
                if (strpos($task, $filter) !== false) {
                    $count++;
                }
            }
        } while ($count > 0 && time() < ($start + $timeout));
    }

    /**
     * Delete all the Machine Learning jobs
     */
    private static function deleteMlJobs(Client $client): void
    {
        $result = $client->ml()->getJobs();
        foreach ($result['jobs'] as $job) {
            $client->ml()->deleteJob([
                'job_id' => $job['job_id'],
                'force' => true
            ]);
        }
    }


    /**
     * Delete all the data frame analytics jobs
     */
    private static function deleteMlDataFrameAnalyticsJobs(Client $client): void
    {
        $result = $client->ml()->getDataFrameAnalytics();
        foreach ($result['data_frame_analytics'] as $data) {
            $client->ml()->deleteDataFrameAnalytics([
                'id' => $data['id'],
                'force' => true
            ]);
        }
    }

    /**
     * Delete all the calendars
     */
    private static function deleteMlCalendars(Client $client): void
    {
        $result = $client->ml()->getCalendars();
        foreach ($result['calendars'] as $calendar) {
            $client->ml()->deleteCalendar([
                'calendar_id' => $calendar['calendar_id']
            ]);
        }
    }

    /**
     * Delete all the transforms
     */
    private static function deleteTransforms(Client $client): void
    {
        $result = $client->transform()->getTransform();
        foreach ($result['transforms'] as $transform) {
            $result = $client->transform()->deleteTransform([
                'transform_id' => $transform['id']
            ]);
        }
    }

    /**
     * Delete all the training models, leaving out the ones created by _xpack 
     */
    private static function deleteMlTrainingModels(Client $client): void
    {
        $result = $client->ml()->getTrainedModels();
        foreach ($result['trained_model_configs'] as $model) {
            if ($model['created_by'] === '_xpack') {
                continue;
            }
            $result = $client->ml()->deleteTrainedModel([
                'model_id' => $model['model_id']
            ]);
        }
    }

    /**
     * Delete all SLM policies
     * 
     * @see ESRestTestCase.java:deleteAllSLMPolicies()
     */
    private static function deleteAllSLMPolicies(Client $client): void
    {
        $policies = $client->slm()->getLifecycle();
        foreach ($policies->asArray() as $policy) {
            $client->slm()->deleteLifecycle([
                'policy_id' => $policy['name']
            ]);
        }
    }

    /**
     * Delete all data streams
     * 
     * @see ESRestTestCase.java:wipeDataStreams()
     */
    private static function wipeDataStreams(Client $client): void
    {
        try {
            if (self::$hasXPack) {
                $client->indices()->deleteDataStream([
                    'name' => '*',
                    'expand_wildcards' => 'all'
                ]);
            }
        } catch (ElasticsearchException $e) {
            // We hit a version of ES that doesn't understand expand_wildcards, try again without it
            try {
                if (self::$hasXPack) {
                    $client->indices()->deleteDataStream([
                        'name' => '*'
                    ]);
                }
            } catch (ClientResponseException $e) {
                // We hit a version of ES that doesn't serialize DeleteDataStreamAction.Request#wildcardExpressionsOriginallySpecified
                // field or that doesn't support data streams so it's safe to ignore
                if (!in_array($e->getCode(), [404, 405])) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Delete all indices
     * 
     * @see ESRestTestCase.java:wipeAllIndices()
     */
    private static function wipeAllIndices(Client $client): void
    {
        $expand = 'open,closed';
        if (version_compare(self::getVersion($client), '7.6.99') > 0) {
            $expand .= ',hidden';
        }
        try {
            $client->indices()->delete([
                'index' => '*,-.ds-ilm-history-*,-.ds-.slm-history-*',
                'expand_wildcards' => $expand
            ]);
        } catch (ClientResponseException $e) {
            if ($e->getCode() !== 404) {
                throw $e;
            }
        }
    }

    /**
     * Delete only templates that xpack doesn't automatically
     * recreate. Deleting them doesn't hurt anything, but it
     * slows down the test because xpack will just recreate
     * them.
     * 
     * @see ESRestTestCase.java:wipeCluster()
     */
    private static function wipeTemplateForXpack(Client $client): void
    {
        if (version_compare(self::getVersion($client), '7.6.99') > 0) {
            try {
                $result = $client->indices()->getIndexTemplate();
                $names = [];
                foreach ($result['index_templates'] as $template) {
                    if (self::isXPackTemplate($template['name'])) {
                        continue;
                    }
                    $names[] = $template['name'];
                }
                if (!empty($names)) {
                    if (version_compare(self::getVersion($client), '7.12.99') > 0) {
                        try {
                            $client->indices()->deleteIndexTemplate([
                                'name' => implode(',', $names)
                            ]);
                        } catch (ElasticsearchException $e) {
                            // unable to remove index template
                        }
                    } else {
                        foreach ($names as $name) {
                            try {
                                $client->indices()->deleteIndexTemplate([
                                    'name' => $name
                                ]);
                            } catch (ElasticsearchException $e) {
                                // unable to remove index template
                            }
                        }
                    }
                }
            } catch (ElasticsearchException $e) {
                // We hit a version of ES that doesn't support index templates v2 yet, so it's safe to ignore
            }
            // Delete component template
            $result = $client->cluster()->getComponentTemplate();
            $names = [];
            foreach ($result['component_templates'] as $component) {
                if (self::isXPackTemplate($component['name'])) {
                    continue;
                }
                $names[] = $component['name'];
            }
            if (!empty($names)) {
                if (version_compare(self::getVersion($client), '7.12.99') > 0) {
                    try {
                        $client->cluster()->deleteComponentTemplate([
                            'name' => implode(',', $names)
                        ]);
                    } catch (ElasticsearchException $e) {
                        // We hit a version of ES that doesn't support index templates v2 yet, so it's safe to ignore
                    }
                } else {
                    foreach ($names as $name) {
                        try {
                            $client->cluster()->deleteComponentTemplate([
                                'name' => $name
                            ]);
                        } catch (ElasticsearchException $e) {
                            // We hit a version of ES that doesn't support index templates v2 yet, so it's safe to ignore
                        }
                    }
                }
            }
        }
        // Always check for legacy templates
        $result = $client->indices()->getTemplate();
        foreach ($result->asArray() as $name => $value) {
            if (self::isXPackTemplate($name)) {
                continue;
            }
            try {
                $result = $client->indices()->deleteTemplate([
                    'name' => $name
                ]);
            } catch (ElasticsearchException $e) {
                // unable to remove index template
            }
        }
    }

    /**
     * Reset the cluster settings
     * 
     * @see ESRestTestCase.java:wipeClusterSettings()
     */
    private static function wipeClusterSettings(Client $client): void
    {
        $settings = $client->cluster()->getSettings();
        $newSettings = [];
        foreach ($settings->asArray() as $name => $value) {
            if (!empty($value) && is_array($value)) {
                if (empty($newSettings[$name])) {
                    $newSettings[$name] = [];
                }
                foreach ($value as $key => $data) {
                    $newSettings[$name][$key . '.*'] = null;
                }
            }
        }
        if (!empty($newSettings)) {
            $client->cluster()->putSettings([
                'body' => $newSettings
            ]);
        }
    }

    /**
     * Check if a template name is part of XPack
     * 
     * @see ESRestTestCase.java:isXPackTemplate()
     */
    private static function isXPackTemplate(string $name): bool
    {
        if (strpos($name, '@') !== false) {
            return true;
        }
        if (strpos($name, '.monitoring-') !== false) {
            return true;
        }
        if (strpos($name, '.watch') !== false || strpos($name, '.triggered_watches') !== false) {
            return true;
        }
        if (strpos($name, '.data-frame-') !== false) {
            return true;
        }
        if (strpos($name, '.ml-') !== false) {
            return true;
        }
        if (strpos($name, '.transform-') !== false) {
            return true;
        }
        if (strpos($name, '.deprecation-') !== false) {
            return true;
        }
        if (strpos($name, '.fleet-') !== false) {
            return true;
        }
        if (strpos($name, 'behavioral_analytics-') !== false) {
            return true;
        }
        if (strpos($name, 'profiling-') !== false) {
            return true;
        }
        if (strpos($name, 'elastic-connectors') !== false) {
            return true;
        }
        if (strpos($name, 'apm-') === 0 || strpos($name, 'traces-apm') === 0 ||
            strpos($name, 'metrics-apm') === 0 || strpos($name, 'logs-apm') === 0) {
            return true;
        }
        switch ($name) {
            case ".watches":
            case "security_audit_log":
            case ".slm-history":
            case ".async-search":
            case ".profiling-ilm-lock":
            case "saml-service-provider":
            case "logs":
            case "logs-settings":
            case "logs-mappings":
            case "metrics":
            case "metrics-settings":
            case "metrics-mappings":
            case "synthetics":
            case "synthetics-settings":
            case "synthetics-mappings":
            case ".snapshot-blob-cache":
            case "ilm-history":
            case "logstash-index-template":
            case "security-index-template":
            case "data-streams-mappings":
            case "search-acl-filter":
            case ".kibana-reporting":
                return true;
            default:
                return false;
        }
    }

    /**
     * A set of ILM policies that should be preserved between runs.
     * 
     * @see ESRestTestCase.java:preserveILMPolicyIds
     */
    private static function preserveILMPolicyIds(): array
    {
        return [
            "ilm-history-ilm-policy", 
            "slm-history-ilm-policy",
            "watch-history-ilm-policy", 
            "watch-history-ilm-policy-16",
            "ml-size-based-ilm-policy", 
            "logs",
            "logs@lifecycle", 
            "metrics",
            "metrics@lifecycle",
            "profiling",
            "profiling@lifecycle",
            "synthetics",
            "synthetics@lifecycle",
            "7-days-default",
            "7-days@lifecycle",
            "30-days-default",
            "30-days@lifecycle",
            "90-days-default",
            "90-days@lifecycle",
            "180-days-default",
            "180-days@lifecycle",
            "365-days-default",
            "365-days@lifecycle",
            ".fleet-files-ilm-policy",
            ".fleet-file-data-ilm-policy",
            ".fleet-actions-results-ilm-policy",
            ".fleet-file-fromhost-data-ilm-policy",
            ".fleet-file-fromhost-meta-ilm-policy",
            ".fleet-file-tohost-data-ilm-policy",
            ".fleet-file-tohost-meta-ilm-policy",
            ".deprecation-indexing-ilm-policy",
            ".monitoring-8-ilm-policy",
            "behavioral_analytics-events-default_policy"
        ];
    }

    /**
     * Delete all ILM policies
     * 
     * @see ESRestTestCase.java:deleteAllILMPolicies()
     */
    private static function deleteAllILMPolicies(Client $client): void
    {
        $policies = $client->ilm()->getLifecycle();
        foreach ($policies->asArray() as $policy => $value) {
            if (!in_array($policy, self::preserveILMPolicyIds())) {
                $client->ilm()->deleteLifecycle([
                    'policy' => $policy
                ]);
            }
        }
    }

    /**
     * Delete all CCR Auto Follow Patterns
     * 
     * @see ESRestTestCase.java:deleteAllAutoFollowPatterns()
     */
    private static function deleteAllAutoFollowPatterns(Client $client): void
    {
        $patterns = $client->ccr()->getAutoFollowPattern();
        foreach ($patterns['patterns'] as $pattern) {
            $client->ccr()->deleteAutoFollowPattern([
                'name' => $pattern['name']
            ]);
        }
    }

    /**
     * Delete all tasks
     */
    private static function deleteAllTasks(Client $client): void
    {
        $tasks = $client->tasks()->list();
        if (isset($tasks['nodes'])) {
            foreach ($tasks['nodes'] as $node => $value) {
                foreach ($value['tasks'] as $id => $data) {
                    $client->tasks()->cancel([
                        'task_id' => $id
                    ]);
                }
            }
        }
    }

    /**
     * If any nodes are registered for shutdown, removes their metadata
     * 
     * @see https://github.com/elastic/elasticsearch/commit/cea054f7dae215475ea0499bc7060ca7ec05382f
     */
    private static function deleteAllNodeShutdownMetadata(Client $client)
    {
        if (!self::$hasShutdown || version_compare(self::getVersion($client), '7.15.0') < 0) {
            // Node shutdown APIs are only present in xpack 
            return;
        }
        $nodes = $client->shutdown()->getNode();
        foreach ($nodes['nodes'] as $node) {
            $client->shutdown()->deleteNode($node['node_id']);
        }
    }

    /**
     * Delete searchable snapshots index
     * 
     * @see https://github.com/elastic/elasticsearch/commit/4927b6917deca6793776cf0c839eadf5ea512b4a
     */
    private static function wipeSearchableSnapshotsIndices(Client $client)
    {
        $indices = $client->cluster()->state([
            'metric' => 'metadata',
            'filter_path' => 'metadata.indices.*.settings.index.store.snapshot'
        ]);
        if (!isset($indices['metadata']['indices'])) {
            return;
        }
        foreach ($indices['metadata']['indices'] as $index => $value) {
            try {
                $client->indices()->delete([
                    'index' => $index
                ]);
            } catch (ClientResponseException $e) {
                if ($e->getCode() !== 404) {
                    throw $e;
                }
            }
        }
    }

    /**
     * Wait for Cluster state updates to finish
     * 
     * @see ESRestTestCase.java:waitForClusterStateUpdatesToFinish()
     */
    private static function waitForClusterStateUpdatesToFinish(Client $client, int $timeout = 30): void
    {
        $start = time();
        do {
            $result = $client->cluster()->pendingTasks();
            $stillWaiting = ! empty($result['tasks']);
        } while ($stillWaiting && time() < ($start + $timeout));
    }
}
