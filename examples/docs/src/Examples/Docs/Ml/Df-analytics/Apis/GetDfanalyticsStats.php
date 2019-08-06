<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetDfanalyticsStats
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/df-analytics/apis/get-dfanalytics-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetDfanalyticsStats extends SimpleExamplesTester {

    /**
     * Tag:  cfc52956b005d57111c49dfe1735634e
     * Line: 87
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL87_cfc52956b005d57111c49dfe1735634e()
    {
        $client = $this->getClient();
        // tag::cfc52956b005d57111c49dfe1735634e[]
        // TODO -- Implement Example
        // GET _ml/data_frame/analytics/loganalytics/_stats
        // end::cfc52956b005d57111c49dfe1735634e[]

        $curl = 'GET _ml/data_frame/analytics/loganalytics/_stats';

        // TODO -- make assertion
    }

// %__METHOD__%


}
