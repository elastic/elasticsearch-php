<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CloseJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/close-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CloseJob extends SimpleExamplesTester {

    /**
     * Tag:  cf6e928ae9efc2b9f59aa1ccb4605bee
     * Line: 102
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL102_cf6e928ae9efc2b9f59aa1ccb4605bee()
    {
        $client = $this->getClient();
        // tag::cf6e928ae9efc2b9f59aa1ccb4605bee[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_close
        // end::cf6e928ae9efc2b9f59aa1ccb4605bee[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_close';

        // TODO -- make assertion
    }

// %__METHOD__%


}
