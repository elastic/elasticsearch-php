<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Diskallocator
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/cluster/disk_allocator.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Diskallocator extends SimpleExamplesTester {

    /**
     * Tag:  aaaa9a186db96077879ddfcfbd625fdb
     * Line: 56
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL56_aaaa9a186db96077879ddfcfbd625fdb()
    {
        $client = $this->getClient();
        // tag::aaaa9a186db96077879ddfcfbd625fdb[]
        // TODO -- Implement Example
        // PUT /twitter/_settings
        // {
        //   "index.blocks.read_only_allow_delete": null
        // }
        // end::aaaa9a186db96077879ddfcfbd625fdb[]

        $curl = 'PUT /twitter/_settings'
              . '{'
              . '  "index.blocks.read_only_allow_delete": null'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4fe5a9e99dc9400d67a5a2f6f6752c07
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_4fe5a9e99dc9400d67a5a2f6f6752c07()
    {
        $client = $this->getClient();
        // tag::4fe5a9e99dc9400d67a5a2f6f6752c07[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "transient": {
        //     "cluster.routing.allocation.disk.watermark.low": "100gb",
        //     "cluster.routing.allocation.disk.watermark.high": "50gb",
        //     "cluster.routing.allocation.disk.watermark.flood_stage": "10gb",
        //     "cluster.info.update.interval": "1m"
        //   }
        // }
        // end::4fe5a9e99dc9400d67a5a2f6f6752c07[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "transient": {'
              . '    "cluster.routing.allocation.disk.watermark.low": "100gb",'
              . '    "cluster.routing.allocation.disk.watermark.high": "50gb",'
              . '    "cluster.routing.allocation.disk.watermark.flood_stage": "10gb",'
              . '    "cluster.info.update.interval": "1m"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
