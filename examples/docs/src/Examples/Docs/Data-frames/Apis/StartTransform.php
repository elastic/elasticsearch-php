<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StartTransform
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   data-frames/apis/start-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StartTransform extends SimpleExamplesTester {

    /**
     * Tag:  811a0ff3a0e65bbb869c5654a47892cd
     * Line: 65
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL65_811a0ff3a0e65bbb869c5654a47892cd()
    {
        $client = $this->getClient();
        // tag::811a0ff3a0e65bbb869c5654a47892cd[]
        // TODO -- Implement Example
        // POST _data_frame/transforms/ecommerce_transform/_start
        // end::811a0ff3a0e65bbb869c5654a47892cd[]

        $curl = 'POST _data_frame/transforms/ecommerce_transform/_start';

        // TODO -- make assertion
    }

// %__METHOD__%


}
