<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Unfreeze
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/apis/unfreeze.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Unfreeze extends SimpleExamplesTester {

    /**
     * Tag:  ffea06f77c9df5720412aa06be964118
     * Line: 42
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL42_ffea06f77c9df5720412aa06be964118()
    {
        $client = $this->getClient();
        // tag::ffea06f77c9df5720412aa06be964118[]
        // TODO -- Implement Example
        // POST /my_index/_freeze
        // POST /my_index/_unfreeze
        // end::ffea06f77c9df5720412aa06be964118[]

        $curl = 'POST /my_index/_freeze'
              . 'POST /my_index/_unfreeze';

        // TODO -- make assertion
    }

// %__METHOD__%


}
