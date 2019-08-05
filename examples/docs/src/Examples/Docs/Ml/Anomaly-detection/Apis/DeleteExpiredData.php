<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteExpiredData
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/delete-expired-data.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteExpiredData extends SimpleExamplesTester {

    /**
     * Tag:  f2f09bc4723805c7aaabdc83c55100fa
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_f2f09bc4723805c7aaabdc83c55100fa()
    {
        $client = $this->getClient();
        // tag::f2f09bc4723805c7aaabdc83c55100fa[]
        // TODO -- Implement Example
        // DELETE _ml/_delete_expired_data
        // end::f2f09bc4723805c7aaabdc83c55100fa[]

        $curl = 'DELETE _ml/_delete_expired_data';

        // TODO -- make assertion
    }

// %__METHOD__%


}
