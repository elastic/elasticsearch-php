<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteFilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/delete-filter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteFilter extends SimpleExamplesTester {

    /**
     * Tag:  8c5d48252cd6d1ee26a2bb817f89c78e
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_8c5d48252cd6d1ee26a2bb817f89c78e()
    {
        $client = $this->getClient();
        // tag::8c5d48252cd6d1ee26a2bb817f89c78e[]
        // TODO -- Implement Example
        // DELETE _ml/filters/safe_domains
        // end::8c5d48252cd6d1ee26a2bb817f89c78e[]

        $curl = 'DELETE _ml/filters/safe_domains';

        // TODO -- make assertion
    }

// %__METHOD__%


}
