<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetDatafeedStats
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/get-datafeed-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetDatafeedStats extends SimpleExamplesTester {

    /**
     * Tag:  62ef8873988dc63f37ed93114072e4a8
     * Line: 93
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL93_62ef8873988dc63f37ed93114072e4a8()
    {
        $client = $this->getClient();
        // tag::62ef8873988dc63f37ed93114072e4a8[]
        // TODO -- Implement Example
        // GET _ml/datafeeds/datafeed-total-requests/_stats
        // end::62ef8873988dc63f37ed93114072e4a8[]

        $curl = 'GET _ml/datafeeds/datafeed-total-requests/_stats';

        // TODO -- make assertion
    }

// %__METHOD__%


}
