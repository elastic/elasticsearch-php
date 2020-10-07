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
        
        // Delete snapshosts and repositories
        $repos = $client->snapshot()->getRepository();
        foreach ($repos as $name => $value) {
            $client->snapshot()->delete([
                'repository' => $name,
                'snapshot' => '*',
                'client' => [
                    'ignore' => 404
                ]
            ]);
            $client->snapshot()->deleteRepository([
                'repository' => $name,
                'client' => [
                    'ignore' => 404
                ]
            ]);
        }
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

        # Delete all Datafeeds
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

        # Delete all jobs
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

        # Stop and delete all rollup
        $rollups = $client->rollup()->getJobs([
            'id' => '_all'
        ]);
        if (isset($rollups['jobs'])) {
            foreach ($rollups['jobs'] as $job) {
                $client->rollup()->stopJob([
                    'id' => $job['config']['id']
                ]);
                $client->rollup()->deleteJob([
                    'id' => $job['config']['id']
                ]);
            }
        }

        # Cancel all tasks
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
}
