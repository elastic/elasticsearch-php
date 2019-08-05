<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteDatafeed
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/delete-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  8a12cd824404d74f098d854716a26899
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_8a12cd824404d74f098d854716a26899()
    {
        $client = $this->getClient();
        // tag::8a12cd824404d74f098d854716a26899[]
        // TODO -- Implement Example
        // DELETE _ml/datafeeds/datafeed-total-requests
        // end::8a12cd824404d74f098d854716a26899[]

        $curl = 'DELETE _ml/datafeeds/datafeed-total-requests';

        // TODO -- make assertion
    }

// %__METHOD__%


}
