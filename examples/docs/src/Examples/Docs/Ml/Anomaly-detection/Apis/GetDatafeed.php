<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetDatafeed
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/get-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  d7b3862eb61595fc02d64d5f6ed60c88
     * Line: 89
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL89_d7b3862eb61595fc02d64d5f6ed60c88()
    {
        $client = $this->getClient();
        // tag::d7b3862eb61595fc02d64d5f6ed60c88[]
        // TODO -- Implement Example
        // GET _ml/datafeeds/datafeed-total-requests
        // end::d7b3862eb61595fc02d64d5f6ed60c88[]

        $curl = 'GET _ml/datafeeds/datafeed-total-requests';

        // TODO -- make assertion
    }

// %__METHOD__%


}
