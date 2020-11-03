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

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\Missing404Exception;

class Utility
{
    public static function getHost(): ?string
    {
        $url = getenv('ELASTICSEARCH_URL');
        if (false !== $url) {
            return $url;
        }
        switch (getenv('TEST_SUITE')) {
            case 'oss':
                return 'http://localhost:9200';
            case 'xpack':
                return 'https://elastic:changeme@localhost:9200';
        }
        return null;
    }

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
        if (getenv('TEST_SUITE') === 'xpack') {
            $clientBuilder->setSSLVerification(false);
        }
        return $clientBuilder->build();
    }
 
    /**
     * Clean the YAML OSS test state
     * 
     * @see https://github.com/elastic/elasticsearch/tree/master/rest-api-spec/src/main/resources/rest-api-spec/test
     */
    public static function cleanYamlOssTest(Client $client): void
    {
        // Delete aliases
        $result = $client->indices()->deleteAlias([
            'index' => '_all',
            'name' => '_all',
            'client' => [
                'ignore' => 404
            ]
        ]);

        // Delete indices
        $client->indices()->delete([
            'index' => '*',
            'expand_wildcards' => 'all',
            'client' => [
                'ignore' => 404
            ]
        ]);

        // Delete templates
        $client->indices()->deleteTemplate([
            'name' => '*',
            'client' => [
                'ignore' => 404
            ]
        ]);
        
        self::wipeSnapshots($client);
    }

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
     * Clean the YAML XPack test state
     */
    public static function cleanYamlXpackTest(Client $client): void
    { 
        # Reset cluster configuration
        $client->cluster()->putSettings([
            'body' => [
                'transient' => [
                    'cluster.persistent_tasks.allocation.enable' => 'all',
                    'xpack.ml.max_model_memory_limit' => '2g'
                ]
            ]
        ]);

        # Get all roles
        $roles = $client->security()->getRole();
        # Delete custom roles (metadata._reserved = 0)
        foreach ($roles as $role => $values) {
            if (isset($values['metadata']['_reserved']) && $values['metadata']['_reserved'] === 0) {
                $client->security()->deleteRole([
                    'name' => $role,
                    'client' => [
                        'ignore' => 404
                    ]
                ]);
            }
        }

        # Get all users
        $users = $client->security()->getUser();
        # Delete custom users (metadata._reserved = 0)
        foreach ($users as $user => $values) {
            if (isset($values['metadata']['_reserved']) && $values['metadata']['_reserved'] === 0) {
                $client->security()->deleteUser([
                    'username' => $user,
                    'client' => [
                        'ignore' => 404
                    ]
                ]);
            }
        }

        # Get all privileges
        $privileges = $client->security()->getPrivileges();
        # Delete all the privileges
        foreach ($privileges as $app => $values) {
            foreach ($values as $name => $data) {
                $client->security()->deletePrivileges([
                    'application' => $app,
                    'name' => $name
                ]);
            }
        }

        self::deleteAllDatafeeds($client);
        self::deleteAllJobs($client);
        self::deleteAllDataFrameAnalytics($client);

        self::wipeRollupJobs($client);
        

        # Cancel all tasks
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

        # Remove policies
        $client->ilm()->removePolicy([
            'index' => '*'
        ]); 

        # Refresh index
        $client->indices()->refresh([
            'index' => '_all',
            'expand_wildcards' => 'all',
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
     * Delete all the Datafeeds for XPack test suite
     */
    private static function deleteAllDatafeeds(Client $client): void
    { 
        $client->ml()->stopDatafeed([
            'datafeed_id' => '_all',
            'body' => [
                'force' => true
            ]
        ]);
        $dataFeeds = $client->ml()->getDatafeeds([
            'datafeed_id' => '*'
        ]);
        if (isset($dataFeeds['datafeeds'])) {
            foreach ($dataFeeds['datafeeds'] as $data) {
                $client->ml()->deleteDatafeed([
                    'datafeed_id' => $data['datafeed_id'],
                    'body' => [
                        'force' => true
                    ]
                ]);
            }
        }
    }

    /**
     * Delete all the Jobs for XPack test suite
     */
    private static function deleteAllJobs(Client $client): void
    {
        $client->ml()->closeJob([
            'job_id' => '_all',
            'body' => [
                'force' => true
            ]
        ]);
        $jobs = $client->ml()->getJobs([
            'job_id' => '*'
        ]);
        if (isset($jobs['jobs'])) {
            foreach ($jobs['jobs'] as $job) {
                $client->ml()->deleteJob([
                    'job_id' => $job['job_id'],
                    'body' => [
                        'force' => true
                    ]
                ]);
            }
        }
    }

    /**
     * Delete all the DataFrame Analytics for XPack test suite
     */
    private static function deleteAllDataFrameAnalytics(Client $client): void
    {
        $client->ml()->stopDataFrameAnalytics([
            'id' => '*',
            'body' => [
                'force' => true
            ]
        ]);
        $dataFrame = $client->ml()->getDataFrameAnalytics([
            'size' => 10000
        ]);
        if (isset($dataFrame['data_frame_analytics'])) {
            foreach ($dataFrame['data_frame_analytics'] as $df) {
                $client->ml()->deleteDataFrameAnalytics([
                    'id' => $df['id']
                ]);
            }
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
     * Delete the cluster
     * 
     * @see ESRestTestCase.java:wipeCluster()
     */
    private static function wipeCluster(Client $client): void
    {
        if (getenv('TEST_SUITE') === 'xpack') {
            self::wipeRollupJobs($client);
            self::waitForPendingRollupTasks($client);
        }
        self::deleteAllSLMPolicies($client);  

        self::wipeSnapshots($client);
        self::wipeDataStreams($client);
        self::wipeAllindices($client);

        if (getenv('TEST_SUITE') === 'xpack') {
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

        if (getenv('TEST_SUITE') === 'xpack') {
            self::deleteAllILMPolicies($client);
            self::deleteAllAutoFollowPatterns($client);

            # Cancel all tasks
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
     * @see ESRestTestCase.java:wipeAllindices()
     */
    private static function wipeAllindices(Client $client): void
    {
        $client->indices()->delete([
            'index' => '*',
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
            $client->cluster()->deleteComponentTemplate([
                'name' => $component['name']
            ]);
        }
    }

    /**
     * Delete all the templates
     * 
     * @see ESRestTestCase.java:wipeCluster()
     */
    private static function wipeTemplate(Client $client): void
    {
        $client->indices()->deleteTemplate([
            'name' => '*'
        ]);
        try {
            $client->indices()->deleteIndexTemplate([
                'name' => '*'
            ]);
            $client->cluster()->deleteComponentTemplate([
                'name' => '*'
            ]);
        } catch (Missing404Exception $e) {
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
                return true;
        }
        return false;
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
            $client->ilm()->deleteLifecycle([
                'policy' => $policy
            ]);
        }
    }

    private static function deleteAllAutoFollowPatterns(Client $client): void
    {
        $patterns = $client->ccr()->getAutoFollowPattern();
        foreach ($patterns['patterns'] as $pattern) {
            $client->ccr()->deleteAutoFollowPattern([
                'name' => $pattern['name']
            ]);
        }
    }

    private static function waitForClusterStateUpdatesToFinish(Client $client, int $timeout = 30): void
    {
        $start = time();
        do {
            $result = $client->cluster()->pendingTasks();
            $stillWaiting = ! empty($result['tasks']);
        } while ($stillWaiting && time() < ($start + $timeout));
    }
}