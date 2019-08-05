<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateSnapshot
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/update-snapshot.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateSnapshot extends SimpleExamplesTester {

    /**
     * Tag:  3b9c54604535d97e8368d47148aecc6f
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_3b9c54604535d97e8368d47148aecc6f()
    {
        $client = $this->getClient();
        // tag::3b9c54604535d97e8368d47148aecc6f[]
        // TODO -- Implement Example
        // POST
        // _ml/anomaly_detectors/it_ops_new_logs/model_snapshots/1491852978/_update
        // {
        //   "description": "Snapshot 1",
        //   "retain": true
        // }
        // end::3b9c54604535d97e8368d47148aecc6f[]

        $curl = 'POST'
              . '_ml/anomaly_detectors/it_ops_new_logs/model_snapshots/1491852978/_update'
              . '{'
              . '  "description": "Snapshot 1",'
              . '  "retain": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
