<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutDatafeed
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/put-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  23067c5e8da958fa4d914f3b5c9bf607
     * Line: 112
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL112_23067c5e8da958fa4d914f3b5c9bf607()
    {
        $client = $this->getClient();
        // tag::23067c5e8da958fa4d914f3b5c9bf607[]
        // TODO -- Implement Example
        // PUT _ml/datafeeds/datafeed-total-requests
        // {
        //   "job_id": "total-requests",
        //   "indices": ["server-metrics"]
        // }
        // end::23067c5e8da958fa4d914f3b5c9bf607[]

        $curl = 'PUT _ml/datafeeds/datafeed-total-requests'
              . '{'
              . '  "job_id": "total-requests",'
              . '  "indices": ["server-metrics"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
