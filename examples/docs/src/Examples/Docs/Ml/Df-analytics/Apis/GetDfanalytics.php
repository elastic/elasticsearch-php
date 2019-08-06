<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetDfanalytics
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/df-analytics/apis/get-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  5ccfd9f4698dcd7cdfbc6bad60081aab
     * Line: 94
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL94_5ccfd9f4698dcd7cdfbc6bad60081aab()
    {
        $client = $this->getClient();
        // tag::5ccfd9f4698dcd7cdfbc6bad60081aab[]
        // TODO -- Implement Example
        // GET _ml/data_frame/analytics/loganalytics
        // end::5ccfd9f4698dcd7cdfbc6bad60081aab[]

        $curl = 'GET _ml/data_frame/analytics/loganalytics';

        // TODO -- make assertion
    }

// %__METHOD__%


}
