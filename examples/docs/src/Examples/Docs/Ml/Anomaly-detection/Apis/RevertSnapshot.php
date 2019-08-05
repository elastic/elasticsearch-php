<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RevertSnapshot
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/revert-snapshot.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RevertSnapshot extends SimpleExamplesTester {

    /**
     * Tag:  f28c58902bdefd9e2b36001e8d682d35
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_f28c58902bdefd9e2b36001e8d682d35()
    {
        $client = $this->getClient();
        // tag::f28c58902bdefd9e2b36001e8d682d35[]
        // TODO -- Implement Example
        // POST
        // _ml/anomaly_detectors/it_ops_new_kpi/model_snapshots/1491856080/_revert
        // {
        //   "delete_intervening_results": true
        // }
        // end::f28c58902bdefd9e2b36001e8d682d35[]

        $curl = 'POST'
              . '_ml/anomaly_detectors/it_ops_new_kpi/model_snapshots/1491856080/_revert'
              . '{'
              . '  "delete_intervening_results": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
