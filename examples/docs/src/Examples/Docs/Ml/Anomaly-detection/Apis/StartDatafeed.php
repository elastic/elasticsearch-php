<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartDatafeed
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/start-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  c85f09d9a0622d32788bd56b0a008592
     * Line: 100
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL100_c85f09d9a0622d32788bd56b0a008592()
    {
        $client = $this->getClient();
        // tag::c85f09d9a0622d32788bd56b0a008592[]
        // TODO -- Implement Example
        // POST _ml/datafeeds/datafeed-total-requests/_start
        // {
        //   "start": "2017-04-07T18:22:16Z"
        // }
        // end::c85f09d9a0622d32788bd56b0a008592[]

        $curl = 'POST _ml/datafeeds/datafeed-total-requests/_start'
              . '{'
              . '  "start": "2017-04-07T18:22:16Z"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
