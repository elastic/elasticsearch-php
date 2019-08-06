<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteJob
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/delete-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteJob extends SimpleExamplesTester {

    /**
     * Tag:  3ac8b5234e9d53859245cf8ab0094ca5
     * Line: 63
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL63_3ac8b5234e9d53859245cf8ab0094ca5()
    {
        $client = $this->getClient();
        // tag::3ac8b5234e9d53859245cf8ab0094ca5[]
        // TODO -- Implement Example
        // DELETE _ml/anomaly_detectors/total-requests
        // end::3ac8b5234e9d53859245cf8ab0094ca5[]

        $curl = 'DELETE _ml/anomaly_detectors/total-requests';

        // TODO -- make assertion
    }

    /**
     * Tag:  ccec66fb20d5ede6c691e0890cfe402a
     * Line: 81
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL81_ccec66fb20d5ede6c691e0890cfe402a()
    {
        $client = $this->getClient();
        // tag::ccec66fb20d5ede6c691e0890cfe402a[]
        // TODO -- Implement Example
        // DELETE _ml/anomaly_detectors/total-requests?wait_for_completion=false
        // end::ccec66fb20d5ede6c691e0890cfe402a[]

        $curl = 'DELETE _ml/anomaly_detectors/total-requests?wait_for_completion=false';

        // TODO -- make assertion
    }

// %__METHOD__%



}
