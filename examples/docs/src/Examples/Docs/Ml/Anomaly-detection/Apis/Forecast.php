<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Forecast
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/forecast.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Forecast extends SimpleExamplesTester {

    /**
     * Tag:  5bed6929ccc86ef27f9468cf844169c8
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_5bed6929ccc86ef27f9468cf844169c8()
    {
        $client = $this->getClient();
        // tag::5bed6929ccc86ef27f9468cf844169c8[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_forecast
        // {
        //   "duration": "10d"
        // }
        // end::5bed6929ccc86ef27f9468cf844169c8[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_forecast'
              . '{'
              . '  "duration": "10d"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
