<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteSnapshot
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/delete-snapshot.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteSnapshot extends SimpleExamplesTester {

    /**
     * Tag:  1e08e054c761353f99211cd18e8ca47b
     * Line: 45
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL45_1e08e054c761353f99211cd18e8ca47b()
    {
        $client = $this->getClient();
        // tag::1e08e054c761353f99211cd18e8ca47b[]
        // TODO -- Implement Example
        // DELETE _ml/anomaly_detectors/farequote/model_snapshots/1491948163
        // end::1e08e054c761353f99211cd18e8ca47b[]

        $curl = 'DELETE _ml/anomaly_detectors/farequote/model_snapshots/1491948163';

        // TODO -- make assertion
    }

// %__METHOD__%


}
