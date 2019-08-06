<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetTransform
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   data-frames/apis/get-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetTransform extends SimpleExamplesTester {

    /**
     * Tag:  59b3dc4f4c270e136435c62d30e78982
     * Line: 99
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL99_59b3dc4f4c270e136435c62d30e78982()
    {
        $client = $this->getClient();
        // tag::59b3dc4f4c270e136435c62d30e78982[]
        // TODO -- Implement Example
        // GET _data_frame/transforms?size=10
        // end::59b3dc4f4c270e136435c62d30e78982[]

        $curl = 'GET _data_frame/transforms?size=10';

        // TODO -- make assertion
    }

    /**
     * Tag:  432f71eed8e670a14195f22c1a557bf7
     * Line: 109
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL109_432f71eed8e670a14195f22c1a557bf7()
    {
        $client = $this->getClient();
        // tag::432f71eed8e670a14195f22c1a557bf7[]
        // TODO -- Implement Example
        // GET _data_frame/transforms/ecommerce_transform
        // end::432f71eed8e670a14195f22c1a557bf7[]

        $curl = 'GET _data_frame/transforms/ecommerce_transform';

        // TODO -- make assertion
    }

// %__METHOD__%



}
