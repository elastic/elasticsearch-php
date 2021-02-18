<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Tests;

class Utility
{
    public static function getHost(): ?string
    {
        $url = getenv('ELASTICSEARCH_URL');
        if (false !== $url) {
            return $url;
        }
        switch (getenv('TEST_SUITE')) {
            case 'free':
                return 'http://localhost:9200';
            case 'platinum':
                return 'https://elastic:changeme@localhost:9200';
        }
        return null;
    }

    /**
     * Build a Client based on ENV variables
     */
    public static function getClient(): Client
    {
        $clientBuilder = ClientBuilder::create()
            ->setHosts([self::getHost()]);
        $clientBuilder->setConnectionParams([
            'client' => [
                'headers' => [
                    'Accept' => []
                ]
            ]
        ]);
        if (getenv('TEST_SUITE') === 'platinum') {
            $clientBuilder->setSSLVerification(false);
        }
        return $clientBuilder->build();
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
        $client->security()->deleteUser([
            'username' => 'x_pack_rest_user',
            'client' => [
                'ignore' => 404
            ]
        ]);
    }

    /**
     * Clean up the cluster after a test
     * 
     * @see ESRestTestCase.java:cleanUpCluster()
     */
    public static function cleanUpCluster(Client $client): void
    {
        self::wipeCluster($client);
        self::waitForClusterStateUpdatesToFinish($client);
    }

     /**
     * Delete the cluster
     * 
     * @see ESRestTestCase.java:wipeCluster()
     */
    private static function wipeCluster(Client $client): void
    {
        if (getenv('TEST_SUITE') === 'platinum') {
            self::wipeRollupJobs($client);
            self::waitForPendingRollupTasks($client);
            self::deleteAllSLMPolicies($client);  
        }

        self::wipeSnapshots($client);

        if (getenv('TEST_SUITE') === 'platinum') {
            self::wipeDataStreams($client);
        }
        
        self::wipeAllIndices($client);

        if (getenv('TEST_SUITE') === 'platinum') {
            self::wipeTemplateForXpack($client);
        } else {
            // Delete templates
            $client->indices()->deleteTemplate([
                'name' => '*'
            ]);
            // Delete index template
            $client->indices()->deleteIndexTemplate([
                'name' => '*'
            ]);
            // Delete component template
            $client->cluster()->deleteComponentTemplate([
                'name' => '*'
            ]);
        }

        self::wipeClusterSettings($client);

        if (getenv('TEST_SUITE') === 'platinum') {
            self::deleteAllILMPolicies($client);
            self::deleteAllAutoFollowPatterns($client);
            self::deleteAllTasks($client);
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
                $client->rollup()->stopJob([
                    'id' => $job['config']['id'],
                    'wait_for_completion' => true,
                    'client' => [
                        'ignore' => 404
                    ]
                ]);
                $client->rollup()->deleteJob([
                    'id' => $job['config']['id'],
                    'client' => [
                        'ignore' => 404
                    ]
                ]);
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
        $repos = $client->snapshot()->getRepository();
        foreach ($repos as $name => $value) {
            if ($value['type'] === 'fs') {
                $client->snapshot()->delete([
                    'repository' => $name,
                    'snapshot' => '*',
                    'client' => [
                        'ignore' => 404
                    ]
                ]);
            }         
            $client->snapshot()->deleteRepository([
                'repository' => $name,
                'client' => [
                    'ignore' => 404
                ]
            ]);
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
            $tasks = explode("\n", $result);
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
     * Delete all SLM policies
     * 
     * @see ESRestTestCase.java:deleteAllSLMPolicies()
     */
    private static function deleteAllSLMPolicies(Client $client): void
    {
        $policies = $client->slm()->getLifecycle();
        foreach ($policies as $policy) {
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
        $client->indices()->deleteDataStream([
            'name' => '*'
        ]);
    }

    /**
     * Delete all indices
     * 
     * @see ESRestTestCase.java:wipeAllIndices()
     */
    private static function wipeAllIndices(Client $client): void
    {
        $client->indices()->delete([
            'index' => '*,-.ds-ilm-history-*',
            'expand_wildcards' => 'all',
            'client' => [
                'ignore' => 404
            ]
        ]);
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
        $result = $client->cat()->templates([
            'h' => 'name'
        ]);
        $templates = explode("\n", $result);
        foreach ($templates as $template) {
            if (empty($template) || self::isXPackTemplate($template)) {
                continue;
            }
            try {
                $client->indices()->deleteTemplate([
                    'name' => $template
                ]);
            } catch (Missing404Exception $e) {
                $msg = sprintf("index_template [%s] missing", $template);
                if (strpos($e->getMessage(), $msg) !== false) {
                    $client->indices()->deleteIndexTemplate([
                        'name' => $template
                    ]);
                }
            }
        }
        // Delete component template
        $result = $client->cluster()->getComponentTemplate();
        foreach ($result['component_templates'] as $component) {
            if (self::isXPackTemplate($component['name'])) {
                continue;
            }
            try {
                $client->cluster()->deleteComponentTemplate([
                    'name' => $component['name']
                ]);
            } catch (ElasticsearchException $e) {
                // We hit a version of ES that doesn't support index templates v2 yet, so it's safe to ignore
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
        foreach ($settings as $name => $value) {
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
        switch ($name) {
            case ".watches":
            case "logstash-index-template":
            case ".logstash-management":
            case "security_audit_log":
            case ".slm-history":
            case ".async-search":
            case "saml-service-provider":
            case "ilm-history":
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
            case ".deprecation-indexing-template":
                return true;
        }
        return false;
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
            "ml-size-based-ilm-policy", 
            "logs", 
            "metrics"
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
        foreach ($policies as $policy => $value) {
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
                        'task_id' => $id,
                        'wait_for_completion' => true
                    ]);
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
