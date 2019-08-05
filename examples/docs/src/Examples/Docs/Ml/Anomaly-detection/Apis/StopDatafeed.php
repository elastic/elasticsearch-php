<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopDatafeed
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/stop-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  9b1e808ac4cca788990b497fb59ba455
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_9b1e808ac4cca788990b497fb59ba455()
    {
        $client = $this->getClient();
        // tag::9b1e808ac4cca788990b497fb59ba455[]
        // TODO -- Implement Example
        // POST _ml/datafeeds/datafeed-total-requests/_stop
        // {
        //   "timeout": "30s"
        // }
        // end::9b1e808ac4cca788990b497fb59ba455[]

        $curl = 'POST _ml/datafeeds/datafeed-total-requests/_stop'
              . '{'
              . '  "timeout": "30s"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
