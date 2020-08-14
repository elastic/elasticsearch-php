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

use Elasticsearch\Endpoints\AbstractEndpoint;
use Throwable;

/**
 * Class BackwardCompatibleTest
 *
 * @subpackage Tests
 */
class BackwardCompatibleTest extends \PHPUnit\Framework\TestCase
{
    /**
     * List of endpoints in elasticsearch-php 7.2 branch
     */
    public function getClasses()
    {
        return [
            ['\Elasticsearch\Endpoints\MTermVectors'],
            ['\Elasticsearch\Endpoints\Tasks\Get'],
            ['\Elasticsearch\Endpoints\Tasks\Cancel'],
            ['\Elasticsearch\Endpoints\Tasks\TasksList'],
            ['\Elasticsearch\Endpoints\Ping'],
            ['\Elasticsearch\Endpoints\ScriptsPainlessExecute'],
            ['\Elasticsearch\Endpoints\DeleteByQuery'],
            ['\Elasticsearch\Endpoints\Scroll'],
            ['\Elasticsearch\Endpoints\Explain'],
            ['\Elasticsearch\Endpoints\Get'],
            ['\Elasticsearch\Endpoints\UpdateByQueryRethrottle'],
            ['\Elasticsearch\Endpoints\Delete'],
            ['\Elasticsearch\Endpoints\SearchShards'],
            ['\Elasticsearch\Endpoints\Mget'],
            ['\Elasticsearch\Endpoints\Source\Get'],
            ['\Elasticsearch\Endpoints\Source\Exists'],
            ['\Elasticsearch\Endpoints\Bulk'],
            ['\Elasticsearch\Endpoints\Cluster\PendingTasks'],
            ['\Elasticsearch\Endpoints\Cluster\Health'],
            ['\Elasticsearch\Endpoints\Cluster\Settings\Get'],
            ['\Elasticsearch\Endpoints\Cluster\Settings\Put'],
            ['\Elasticsearch\Endpoints\Cluster\Reroute'],
            ['\Elasticsearch\Endpoints\Cluster\State'],
            ['\Elasticsearch\Endpoints\Cluster\RemoteInfo'],
            ['\Elasticsearch\Endpoints\Cluster\Stats'],
            ['\Elasticsearch\Endpoints\Cluster\AllocationExplain'],
            ['\Elasticsearch\Endpoints\Cluster\Nodes\HotThreads'],
            ['\Elasticsearch\Endpoints\Cluster\Nodes\Info'],
            ['\Elasticsearch\Endpoints\Cluster\Nodes\ReloadSecureSettings'],
            ['\Elasticsearch\Endpoints\Cluster\Nodes\Stats'],
            ['\Elasticsearch\Endpoints\Cluster\Nodes\Usage'],
            ['\Elasticsearch\Endpoints\ClearScroll'],
            ['\Elasticsearch\Endpoints\Script\Get'],
            ['\Elasticsearch\Endpoints\Script\Delete'],
            ['\Elasticsearch\Endpoints\Script\Put'],
            ['\Elasticsearch\Endpoints\Exists'],
            ['\Elasticsearch\Endpoints\Index'],
            ['\Elasticsearch\Endpoints\UpdateByQuery'],
            ['\Elasticsearch\Endpoints\Ingest\Pipeline\Get'],
            ['\Elasticsearch\Endpoints\Ingest\Pipeline\Delete'],
            ['\Elasticsearch\Endpoints\Ingest\Pipeline\Put'],
            ['\Elasticsearch\Endpoints\Ingest\Pipeline\ProcessorGrok'],
            ['\Elasticsearch\Endpoints\Ingest\Simulate'],
            ['\Elasticsearch\Endpoints\SearchTemplate'],
            ['\Elasticsearch\Endpoints\FieldCaps'],
            ['\Elasticsearch\Endpoints\Snapshot\Get'],
            ['\Elasticsearch\Endpoints\Snapshot\Delete'],
            ['\Elasticsearch\Endpoints\Snapshot\Restore'],
            ['\Elasticsearch\Endpoints\Snapshot\Create'],
            ['\Elasticsearch\Endpoints\Snapshot\Status'],
            ['\Elasticsearch\Endpoints\Snapshot\Repository\Verify'],
            ['\Elasticsearch\Endpoints\Snapshot\Repository\Get'],
            ['\Elasticsearch\Endpoints\Snapshot\Repository\Delete'],
            ['\Elasticsearch\Endpoints\Snapshot\Repository\Create'],
            ['\Elasticsearch\Endpoints\Count'],
            ['\Elasticsearch\Endpoints\Create'],
            ['\Elasticsearch\Endpoints\Info'],
            ['\Elasticsearch\Endpoints\Indices\Type\Exists'],
            ['\Elasticsearch\Endpoints\Indices\ForceMerge'],
            ['\Elasticsearch\Endpoints\Indices\Flush'],
            ['\Elasticsearch\Endpoints\Indices\Analyze'],
            ['\Elasticsearch\Endpoints\Indices\Rollover'],
            ['\Elasticsearch\Endpoints\Indices\Get'],
            ['\Elasticsearch\Endpoints\Indices\Template\Get'],
            ['\Elasticsearch\Endpoints\Indices\Template\Delete'],
            ['\Elasticsearch\Endpoints\Indices\Template\Exists'],
            ['\Elasticsearch\Endpoints\Indices\Template\Put'],
            ['\Elasticsearch\Endpoints\Indices\Delete'],
            ['\Elasticsearch\Endpoints\Indices\FlushSynced'],
            ['\Elasticsearch\Endpoints\Indices\Refresh'],
            ['\Elasticsearch\Endpoints\Indices\Exists'],
            ['\Elasticsearch\Endpoints\Indices\Cache\Clear'],
            ['\Elasticsearch\Endpoints\Indices\Settings\Get'],
            ['\Elasticsearch\Endpoints\Indices\Settings\Put'],
            ['\Elasticsearch\Endpoints\Indices\Create'],
            ['\Elasticsearch\Endpoints\Indices\Close'],
            ['\Elasticsearch\Endpoints\Indices\ShardStores'],
            ['\Elasticsearch\Endpoints\Indices\Stats'],
            ['\Elasticsearch\Endpoints\Indices\Validate\Query'],
            ['\Elasticsearch\Endpoints\Indices\Alias\Get'],
            ['\Elasticsearch\Endpoints\Indices\Alias\Delete'],
            ['\Elasticsearch\Endpoints\Indices\Alias\Exists'],
            ['\Elasticsearch\Endpoints\Indices\Alias\Put'],
            ['\Elasticsearch\Endpoints\Indices\Open'],
            ['\Elasticsearch\Endpoints\Indices\Segments'],
            ['\Elasticsearch\Endpoints\Indices\Upgrade\Get'],
            ['\Elasticsearch\Endpoints\Indices\Upgrade\Post'],
            ['\Elasticsearch\Endpoints\Indices\Aliases\Update'],
            ['\Elasticsearch\Endpoints\Indices\Recovery'],
            ['\Elasticsearch\Endpoints\Indices\Shrink'],
            ['\Elasticsearch\Endpoints\Indices\Split'],
            ['\Elasticsearch\Endpoints\Indices\Mapping\Get'],
            ['\Elasticsearch\Endpoints\Indices\Mapping\Put'],
            ['\Elasticsearch\Endpoints\Indices\Mapping\GetField'],
            ['\Elasticsearch\Endpoints\Reindex'],
            ['\Elasticsearch\Endpoints\DeleteByQueryRethrottle'],
            ['\Elasticsearch\Endpoints\MsearchTemplate'],
            ['\Elasticsearch\Endpoints\TermVectors'],
            ['\Elasticsearch\Endpoints\AbstractEndpoint'],
            ['\Elasticsearch\Endpoints\RenderSearchTemplate'],
            ['\Elasticsearch\Endpoints\Update'],
            ['\Elasticsearch\Endpoints\Search'],
            ['\Elasticsearch\Endpoints\ReindexRethrottle'],
            ['\Elasticsearch\Endpoints\RankEval'],
            ['\Elasticsearch\Endpoints\Msearch'],
            ['\Elasticsearch\Endpoints\Cat\ThreadPool'],
            ['\Elasticsearch\Endpoints\Cat\Fielddata'],
            ['\Elasticsearch\Endpoints\Cat\Master'],
            ['\Elasticsearch\Endpoints\Cat\NodeAttrs'],
            ['\Elasticsearch\Endpoints\Cat\Aliases'],
            ['\Elasticsearch\Endpoints\Cat\PendingTasks'],
            ['\Elasticsearch\Endpoints\Cat\Templates'],
            ['\Elasticsearch\Endpoints\Cat\Allocation'],
            ['\Elasticsearch\Endpoints\Cat\Plugins'],
            ['\Elasticsearch\Endpoints\Cat\Health'],
            ['\Elasticsearch\Endpoints\Cat\Count'],
            ['\Elasticsearch\Endpoints\Cat\Shards'],
            ['\Elasticsearch\Endpoints\Cat\Repositories'],
            ['\Elasticsearch\Endpoints\Cat\Nodes'],
            ['\Elasticsearch\Endpoints\Cat\Tasks'],
            ['\Elasticsearch\Endpoints\Cat\Segments'],
            ['\Elasticsearch\Endpoints\Cat\Help'],
            ['\Elasticsearch\Endpoints\Cat\Recovery'],
            ['\Elasticsearch\Endpoints\Cat\Snapshots'],
            ['\Elasticsearch\Endpoints\Cat\Indices']
        ];
    }

    /**
     * @dataProvider getClasses
     */
    public function testOldClassNamespacesPreviousTo74($class)
    {
        $this->assertTrue(class_exists($class), sprintf("Class %s does not exist", $class));
    }
}
