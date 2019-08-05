<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StopTransform
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   data-frames/apis/stop-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StopTransform extends SimpleExamplesTester {

    /**
     * Tag:  a54a3affc99756ba9cc8b4860fd5206e
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_a54a3affc99756ba9cc8b4860fd5206e()
    {
        $client = $this->getClient();
        // tag::a54a3affc99756ba9cc8b4860fd5206e[]
        // TODO -- Implement Example
        // POST _data_frame/transforms/ecommerce_transform/_stop
        // end::a54a3affc99756ba9cc8b4860fd5206e[]

        $curl = 'POST _data_frame/transforms/ecommerce_transform/_stop';

        // TODO -- make assertion
    }

// %__METHOD__%


}
