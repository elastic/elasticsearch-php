<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: OpenClose
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/open-close.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class OpenClose extends SimpleExamplesTester {

    /**
     * Tag:  3a6b9143f3de6258d44ff7e0eb38d953
     * Line: 26
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL26_3a6b9143f3de6258d44ff7e0eb38d953()
    {
        $client = $this->getClient();
        // tag::3a6b9143f3de6258d44ff7e0eb38d953[]
        // TODO -- Implement Example
        // POST /my_index/_close
        // end::3a6b9143f3de6258d44ff7e0eb38d953[]

        $curl = 'POST /my_index/_close';

        // TODO -- make assertion
    }

    /**
     * Tag:  37e6177bf8803971d30a4252498c07a4
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_37e6177bf8803971d30a4252498c07a4()
    {
        $client = $this->getClient();
        // tag::37e6177bf8803971d30a4252498c07a4[]
        // TODO -- Implement Example
        // POST /my_index/_open
        // end::37e6177bf8803971d30a4252498c07a4[]

        $curl = 'POST /my_index/_open';

        // TODO -- make assertion
    }

// %__METHOD__%



}
