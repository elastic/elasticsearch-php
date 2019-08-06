<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: OpenJob
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/open-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class OpenJob extends SimpleExamplesTester {

    /**
     * Tag:  72cb058a415b56a8964c05195114b5c0
     * Line: 56
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL56_72cb058a415b56a8964c05195114b5c0()
    {
        $client = $this->getClient();
        // tag::72cb058a415b56a8964c05195114b5c0[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_open
        // {
        //   "timeout": "35m"
        // }
        // end::72cb058a415b56a8964c05195114b5c0[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_open'
              . '{'
              . '  "timeout": "35m"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
