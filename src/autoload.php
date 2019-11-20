<?php
/**
 * File required since elasticsearch-php 7.4.1 for aliasing
 * to the previous endpoint class names.
 *
 * @see https://github.com/elastic/elasticsearch-php/issues/967
 *
 * NOTE: This file will be removed with elasticsearch-php 8.0.0
 */
declare(strict_types = 1);

use Elasticsearch\Endpoints;

class_alias(Endpoints\Cat\Nodeattrs::class, '\Elasticsearch\Endpoints\Cat\NodeAttrs');
class_alias(Endpoints\Cluster\GetSettings::class, '\Elasticsearch\Endpoints\Cluster\Settings\Get');
class_alias(Endpoints\Cluster\PutSettings::class, '\Elasticsearch\Endpoints\Cluster\Settings\Put');
class_alias(Endpoints\Indices\DeleteAlias::class, '\Elasticsearch\Endpoints\Indices\Alias\Delete');
class_alias(Endpoints\Indices\ExistsAlias::class, '\Elasticsearch\Endpoints\Indices\Alias\Exists');
class_alias(Endpoints\Indices\GetAlias::class, '\Elasticsearch\Endpoints\Indices\Alias\Get');
class_alias(Endpoints\Indices\PutAlias::class, '\Elasticsearch\Endpoints\Indices\Alias\Put');
class_alias(Endpoints\Indices\UpdateAliases::class, '\Elasticsearch\Endpoints\Indices\Aliases\Update');
class_alias(Endpoints\Indices\ClearCache::class, '\Elasticsearch\Endpoints\Indices\Cache\Clear');
class_alias(Endpoints\Indices\Forcemerge::class, '\Elasticsearch\Endpoints\Indices\ForceMerge');
class_alias(Endpoints\Indices\GetMapping::class, '\Elasticsearch\Endpoints\Indices\Mapping\Get');
class_alias(Endpoints\Indices\GetFieldMapping::class, '\Elasticsearch\Endpoints\Indices\Mapping\GetField');
class_alias(Endpoints\Indices\PutMapping::class, '\Elasticsearch\Endpoints\Indices\Mapping\Put');
class_alias(Endpoints\Indices\GetSettings::class, '\Elasticsearch\Endpoints\Indices\Settings\Get');
class_alias(Endpoints\Indices\PutSettings::class, '\Elasticsearch\Endpoints\Indices\Settings\Put');
class_alias(Endpoints\Indices\GetTemplate::class, '\Elasticsearch\Endpoints\Indices\Template\Get');
class_alias(Endpoints\Indices\PutTemplate::class, '\Elasticsearch\Endpoints\Indices\Template\Put');
class_alias(Endpoints\Indices\ExistsTemplate::class, '\Elasticsearch\Endpoints\Indices\Template\Exists');
class_alias(Endpoints\Indices\DeleteTemplate::class, '\Elasticsearch\Endpoints\Indices\Template\Delete');
class_alias(Endpoints\Indices\ExistsType::class, '\Elasticsearch\Endpoints\Indices\Type\Exists');
class_alias(Endpoints\Indices\GetUpgrade::class, '\Elasticsearch\Endpoints\Indices\Upgrade\Get');
class_alias(Endpoints\Indices\Upgrade::class, '\Elasticsearch\Endpoints\Indices\Upgrade\Post');
class_alias(Endpoints\Indices\ValidateQuery::class, '\Elasticsearch\Endpoints\Indices\Validate\Query');
class_alias(Endpoints\Ingest\DeletePipeline::class, '\Elasticsearch\Endpoints\Ingest\Pipeline\Delete');
class_alias(Endpoints\Ingest\GetPipeline::class, '\Elasticsearch\Endpoints\Ingest\Pipeline\Get');
class_alias(Endpoints\Ingest\PutPipeline::class, '\Elasticsearch\Endpoints\Ingest\Pipeline\Put');
class_alias(Endpoints\Ingest\ProcessorGrok::class, '\Elasticsearch\Endpoints\Ingest\Pipeline\ProcessorGrok');
class_alias(Endpoints\Mtermvectors::class, '\Elasticsearch\Endpoints\MTermVectors');
class_alias(Endpoints\GetScript::class, '\Elasticsearch\Endpoints\Script\Get');
class_alias(Endpoints\PutScript::class, '\Elasticsearch\Endpoints\Script\Put');
class_alias(Endpoints\DeleteScript::class, '\Elasticsearch\Endpoints\Script\Delete');
class_alias(Endpoints\Snapshot\CreateRepository::class, '\Elasticsearch\Endpoints\Snapshot\Repository\Create');
class_alias(Endpoints\Snapshot\DeleteRepository::class, '\Elasticsearch\Endpoints\Snapshot\Repository\Delete');
class_alias(Endpoints\Snapshot\GetRepository::class, '\Elasticsearch\Endpoints\Snapshot\Repository\Get');
class_alias(Endpoints\Snapshot\VerifyRepository::class, '\Elasticsearch\Endpoints\Snapshot\Repository\Verify');
class_alias(Endpoints\GetSource::class, '\Elasticsearch\Endpoints\Source\Get');
class_alias(Endpoints\ExistsSource::class, '\Elasticsearch\Endpoints\Source\Exists');
class_alias(Endpoints\Tasks\ListTasks::class, '\Elasticsearch\Endpoints\Tasks\TasksList');
class_alias(Endpoints\Termvectors::class, '\Elasticsearch\Endpoints\TermVectors');
