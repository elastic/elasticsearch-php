<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteForecast
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/delete-forecast.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteForecast extends SimpleExamplesTester {

    /**
     * Tag:  eb4e43b47867b54214a8630172dd0e21
     * Line: 72
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL72_eb4e43b47867b54214a8630172dd0e21()
    {
        $client = $this->getClient();
        // tag::eb4e43b47867b54214a8630172dd0e21[]
        // TODO -- Implement Example
        // DELETE _ml/anomaly_detectors/total-requests/_forecast/_all
        // end::eb4e43b47867b54214a8630172dd0e21[]

        $curl = 'DELETE _ml/anomaly_detectors/total-requests/_forecast/_all';

        // TODO -- make assertion
    }

// %__METHOD__%


}
