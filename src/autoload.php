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

/**
 * File required for aliasing old classname used by elasticsearch-php 6.7
 * Used by elasticsearch-php 6.8.0+
 * @see https://github.com/elastic/elasticsearch-php/issues/967
 */

$aliasToClass = [
    '\Elasticsearch\Endpoints\Cluster\Nodes\HotThreads'           => '\Elasticsearch\Endpoints\Nodes\HotThreads',
    '\Elasticsearch\Endpoints\Cluster\Nodes\Info'                 => '\Elasticsearch\Endpoints\Nodes\Info' ,
    '\Elasticsearch\Endpoints\Cluster\Nodes\ReloadSecureSettings' => '\Elasticsearch\Endpoints\Nodes\ReloadSecureSettings',
    '\Elasticsearch\Endpoints\Cluster\Nodes\Stats'                => '\Elasticsearch\Endpoints\Nodes\Stats',
    '\Elasticsearch\Endpoints\Cluster\Settings\Get'               => '\Elasticsearch\Endpoints\Cluster\GetSettings',
    '\Elasticsearch\Endpoints\Cluster\Settings\Put'               => '\Elasticsearch\Endpoints\Cluster\PutSettings',
    '\Elasticsearch\Endpoints\Indices\Alias\Delete'               => '\Elasticsearch\Endpoints\Indices\DeleteAlias',
    '\Elasticsearch\Endpoints\Indices\Alias\Exists'               => '\Elasticsearch\Endpoints\Indices\ExistsAlias',
    '\Elasticsearch\Endpoints\Indices\Alias\Get'                  => '\Elasticsearch\Endpoints\Indices\GetAlias',
    '\Elasticsearch\Endpoints\Indices\Alias\Put'                  => '\Elasticsearch\Endpoints\Indices\PutAlias',
    '\Elasticsearch\Endpoints\Indices\Aliases\Update'             => '\Elasticsearch\Endpoints\Indices\UpdateAliases',
    '\Elasticsearch\Endpoints\Indices\Cache\Clear'                => '\Elasticsearch\Endpoints\Indices\ClearCache',
    '\Elasticsearch\Endpoints\Indices\Exists\Types'               => '\Elasticsearch\Endpoints\Indices\ExistsType',
    '\Elasticsearch\Endpoints\Indices\Type\Exists'                => '\Elasticsearch\Endpoints\Indices\ExistsType',
    '\Elasticsearch\Endpoints\Indices\Field\Get'                  => '\Elasticsearch\Endpoints\Indices\GetFieldMapping',
    '\Elasticsearch\Endpoints\Indices\Mapping\GetField'           => '\Elasticsearch\Endpoints\Indices\GetFieldMapping',
    '\Elasticsearch\Endpoints\Indices\Mapping\Get'                => '\Elasticsearch\Endpoints\Indices\GetMapping',
    '\Elasticsearch\Endpoints\Indices\Mapping\Put'                => '\Elasticsearch\Endpoints\Indices\PutMapping',
    '\Elasticsearch\Endpoints\Indices\Settings\Get'               => '\Elasticsearch\Endpoints\Indices\GetSettings',
    '\Elasticsearch\Endpoints\Indices\Settings\Put'               => '\Elasticsearch\Endpoints\Indices\PutSettings',
    '\Elasticsearch\Endpoints\Indices\Template\Get'               => '\Elasticsearch\Endpoints\Indices\GetTemplate',
    '\Elasticsearch\Endpoints\Indices\Template\Put'               => '\Elasticsearch\Endpoints\Indices\PutTemplate',
    '\Elasticsearch\Endpoints\Indices\Template\Exists'            => '\Elasticsearch\Endpoints\Indices\ExistsTemplate',
    '\Elasticsearch\Endpoints\Indices\Template\Delete'            => '\Elasticsearch\Endpoints\Indices\DeleteTemplate',
    '\Elasticsearch\Endpoints\Indices\Upgrade\Get'                => '\Elasticsearch\Endpoints\Indices\GetUpgrade',
    '\Elasticsearch\Endpoints\Indices\Upgrade\Post'               => '\Elasticsearch\Endpoints\Indices\Upgrade',
    '\Elasticsearch\Endpoints\Indices\Validate\Query'             => '\Elasticsearch\Endpoints\Indices\ValidateQuery',
    '\Elasticsearch\Endpoints\Ingest\Pipeline\Delete'             => '\Elasticsearch\Endpoints\Ingest\DeletePipeline',
    '\Elasticsearch\Endpoints\Ingest\Pipeline\Get'                => '\Elasticsearch\Endpoints\Ingest\GetPipeline',
    '\Elasticsearch\Endpoints\Ingest\Pipeline\Put'                => '\Elasticsearch\Endpoints\Ingest\PutPipeline',
    '\Elasticsearch\Endpoints\Ingest\Pipeline\ProcessorGrok'      => '\Elasticsearch\Endpoints\Ingest\ProcessorGrok',
    '\Elasticsearch\Endpoints\Script\Get'                         => '\Elasticsearch\Endpoints\GetScript',
    '\Elasticsearch\Endpoints\Script\Put'                         => '\Elasticsearch\Endpoints\PutScript',
    '\Elasticsearch\Endpoints\Script\Delete'                      => '\Elasticsearch\Endpoints\DeleteScript',
    '\Elasticsearch\Endpoints\Snapshot\Repository\Create'         => '\Elasticsearch\Endpoints\Snapshot\CreateRepository',
    '\Elasticsearch\Endpoints\Snapshot\Repository\Delete'         => '\Elasticsearch\Endpoints\Snapshot\DeleteRepository',
    '\Elasticsearch\Endpoints\Snapshot\Repository\Get'            => '\Elasticsearch\Endpoints\Snapshot\GetRepository',
    '\Elasticsearch\Endpoints\Snapshot\Repository\Verify'         => '\Elasticsearch\Endpoints\Snapshot\VerifyRepository',
    '\Elasticsearch\Endpoints\Source\Get'                         => '\Elasticsearch\Endpoints\GetSource',
    '\Elasticsearch\Endpoints\Tasks\TasksList'                    => '\Elasticsearch\Endpoints\Tasks\ListTasks'
];

foreach ($aliasToClass as $alias => $original) {
    if (!class_exists($alias, false)) {
        class_alias($original, $alias);
    }
}
