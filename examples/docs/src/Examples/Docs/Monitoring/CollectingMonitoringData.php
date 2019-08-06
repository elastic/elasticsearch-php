<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Monitoring;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CollectingMonitoringData
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   monitoring/collecting-monitoring-data.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CollectingMonitoringData extends SimpleExamplesTester {

    /**
     * Tag:  fb2b8d642e16132eebcff4f8b6d592d1
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_fb2b8d642e16132eebcff4f8b6d592d1()
    {
        $client = $this->getClient();
        // tag::fb2b8d642e16132eebcff4f8b6d592d1[]
        // TODO -- Implement Example
        // GET _cluster/settings
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "xpack.monitoring.collection.enabled": true
        //   }
        // }
        // end::fb2b8d642e16132eebcff4f8b6d592d1[]

        $curl = 'GET _cluster/settings'
              . 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "xpack.monitoring.collection.enabled": true'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
