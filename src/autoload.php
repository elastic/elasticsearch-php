<?php
/**
 * File required since elasticsearch-php 7.4.1 for aliasing
 * to the previous endpoint class names.
 *
 * @see https://github.com/elastic/elasticsearch-php/issues/967
 *
 * NOTE: This file will be removed with elasticsearch-php 8.0.0
 */

class_alias('\Elasticsearch\Endpoints\Nodes\HotThreads', '\Elasticsearch\Endpoints\Cluster\Nodes\HotThreads');
class_alias('\Elasticsearch\Endpoints\Nodes\Info', '\Elasticsearch\Endpoints\Cluster\Nodes\Info');
class_alias('\Elasticsearch\Endpoints\Nodes\ReloadSecureSettings', '\Elasticsearch\Endpoints\Cluster\Nodes\ReloadSecureSettings');
class_alias('\Elasticsearch\Endpoints\Nodes\Stats', '\Elasticsearch\Endpoints\Cluster\Nodes\Stats');
class_alias('\Elasticsearch\Endpoints\Nodes\Usage', '\Elasticsearch\Endpoints\Cluster\Nodes\Usage');
class_alias('\Elasticsearch\Endpoints\Cluster\GetSettings', '\Elasticsearch\Endpoints\Cluster\Settings\Get');
class_alias('\Elasticsearch\Endpoints\Cluster\PutSettings', '\Elasticsearch\Endpoints\Cluster\Settings\Put');
class_alias('\Elasticsearch\Endpoints\Indices\DeleteAlias', '\Elasticsearch\Endpoints\Indices\Alias\Delete');
class_alias('\Elasticsearch\Endpoints\Indices\ExistsAlias', '\Elasticsearch\Endpoints\Indices\Alias\Exists');
class_alias('\Elasticsearch\Endpoints\Indices\GetAlias', '\Elasticsearch\Endpoints\Indices\Alias\Get');
class_alias('\Elasticsearch\Endpoints\Indices\PutAlias', '\Elasticsearch\Endpoints\Indices\Alias\Put');
class_alias('\Elasticsearch\Endpoints\Indices\UpdateAliases', '\Elasticsearch\Endpoints\Indices\Aliases\Update');
class_alias('\Elasticsearch\Endpoints\Indices\ClearCache', '\Elasticsearch\Endpoints\Indices\Cache\Clear');
class_alias('\Elasticsearch\Endpoints\Indices\GetMapping', '\Elasticsearch\Endpoints\Indices\Mapping\Get');
class_alias('\Elasticsearch\Endpoints\Indices\GetFieldMapping', '\Elasticsearch\Endpoints\Indices\Mapping\GetField');
class_alias('\Elasticsearch\Endpoints\Indices\PutMapping', '\Elasticsearch\Endpoints\Indices\Mapping\Put');
class_alias('\Elasticsearch\Endpoints\Indices\GetSettings', '\Elasticsearch\Endpoints\Indices\Settings\Get');
class_alias('\Elasticsearch\Endpoints\Indices\PutSettings', '\Elasticsearch\Endpoints\Indices\Settings\Put');
class_alias('\Elasticsearch\Endpoints\Indices\GetTemplate', '\Elasticsearch\Endpoints\Indices\Template\Get');
class_alias('\Elasticsearch\Endpoints\Indices\PutTemplate', '\Elasticsearch\Endpoints\Indices\Template\Put');
class_alias('\Elasticsearch\Endpoints\Indices\ExistsTemplate', '\Elasticsearch\Endpoints\Indices\Template\Exists');
class_alias('\Elasticsearch\Endpoints\Indices\DeleteTemplate', '\Elasticsearch\Endpoints\Indices\Template\Delete');
class_alias('\Elasticsearch\Endpoints\Indices\ExistsType', '\Elasticsearch\Endpoints\Indices\Type\Exists');
class_alias('\Elasticsearch\Endpoints\Indices\GetUpgrade', '\Elasticsearch\Endpoints\Indices\Upgrade\Get');
class_alias('\Elasticsearch\Endpoints\Indices\Upgrade', '\Elasticsearch\Endpoints\Indices\Upgrade\Post');
class_alias('\Elasticsearch\Endpoints\Indices\ValidateQuery', '\Elasticsearch\Endpoints\Indices\Validate\Query');
class_alias('\Elasticsearch\Endpoints\Ingest\DeletePipeline', '\Elasticsearch\Endpoints\Ingest\Pipeline\Delete');
class_alias('\Elasticsearch\Endpoints\Ingest\GetPipeline', '\Elasticsearch\Endpoints\Ingest\Pipeline\Get');
class_alias('\Elasticsearch\Endpoints\Ingest\PutPipeline', '\Elasticsearch\Endpoints\Ingest\Pipeline\Put');
class_alias('\Elasticsearch\Endpoints\Ingest\ProcessorGrok', '\Elasticsearch\Endpoints\Ingest\Pipeline\ProcessorGrok');
class_alias('\Elasticsearch\Endpoints\GetScript', '\Elasticsearch\Endpoints\Script\Get');
class_alias('\Elasticsearch\Endpoints\PutScript', '\Elasticsearch\Endpoints\Script\Put');
class_alias('\Elasticsearch\Endpoints\DeleteScript', '\Elasticsearch\Endpoints\Script\Delete');
class_alias('\Elasticsearch\Endpoints\Snapshot\CreateRepository', '\Elasticsearch\Endpoints\Snapshot\Repository\Create');
class_alias('\Elasticsearch\Endpoints\Snapshot\DeleteRepository', '\Elasticsearch\Endpoints\Snapshot\Repository\Delete');
class_alias('\Elasticsearch\Endpoints\Snapshot\GetRepository', '\Elasticsearch\Endpoints\Snapshot\Repository\Get');
class_alias('\Elasticsearch\Endpoints\Snapshot\VerifyRepository', '\Elasticsearch\Endpoints\Snapshot\Repository\Verify');
class_alias('\Elasticsearch\Endpoints\GetSource', '\Elasticsearch\Endpoints\Source\Get');
class_alias('\Elasticsearch\Endpoints\ExistsSource', '\Elasticsearch\Endpoints\Source\Exists');
class_alias('\Elasticsearch\Endpoints\Tasks\ListTasks', '\Elasticsearch\Endpoints\Tasks\TasksList');
