<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetSnapshot
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/get-snapshot.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetSnapshot extends SimpleExamplesTester {

    /**
     * Tag:  51393160fedca39ea733488044d06f8e
     * Line: 70
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL70_51393160fedca39ea733488044d06f8e()
    {
        $client = $this->getClient();
        // tag::51393160fedca39ea733488044d06f8e[]
        // TODO -- Implement Example
        // GET _ml/anomaly_detectors/farequote/model_snapshots
        // {
        //   "start": "1491852977000"
        // }
        // end::51393160fedca39ea733488044d06f8e[]

        $curl = 'GET _ml/anomaly_detectors/farequote/model_snapshots'
              . '{'
              . '  "start": "1491852977000"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
