<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteTransform
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   data-frames/apis/delete-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteTransform extends SimpleExamplesTester {

    /**
     * Tag:  c0632f2983704d482200d4900e722534
     * Line: 49
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL49_c0632f2983704d482200d4900e722534()
    {
        $client = $this->getClient();
        // tag::c0632f2983704d482200d4900e722534[]
        // TODO -- Implement Example
        // DELETE _data_frame/transforms/ecommerce_transform
        // end::c0632f2983704d482200d4900e722534[]

        $curl = 'DELETE _data_frame/transforms/ecommerce_transform';

        // TODO -- make assertion
    }

// %__METHOD__%


}
