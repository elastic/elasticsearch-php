<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetJobStats
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-job-stats.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetJobStats extends SimpleExamplesTester {

    /**
     * Tag:  e3d706e32f9bd1496072beb46e4c488e
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_e3d706e32f9bd1496072beb46e4c488e()
    {
        $client = $this->getClient();
        // tag::e3d706e32f9bd1496072beb46e4c488e[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/farequote/_stats
        // end::e3d706e32f9bd1496072beb46e4c488e[]

        $curl = 'GET _ml/anomaly_detectors/farequote/_stats';

        // TODO -- make assertion
    }

// %__METHOD__%


}
