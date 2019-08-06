<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Start
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/start.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Start extends SimpleExamplesTester {

    /**
     * Tag:  72ae3851160fcf02b8e2cdfd4e57d238
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_72ae3851160fcf02b8e2cdfd4e57d238()
    {
        $client = $this->getClient();
        // tag::72ae3851160fcf02b8e2cdfd4e57d238[]
        // TODO -- Implement Example
        // POST _ilm/start
        // end::72ae3851160fcf02b8e2cdfd4e57d238[]

        $curl = 'POST _ilm/start';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc5fcc40c29087a0df7b5405bb70de5c
     * Line: 81
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL81_bc5fcc40c29087a0df7b5405bb70de5c()
    {
        $client = $this->getClient();
        // tag::bc5fcc40c29087a0df7b5405bb70de5c[]
        // TODO -- Implement Example
        // {
        //   "acknowledged": true
        // }
        // end::bc5fcc40c29087a0df7b5405bb70de5c[]

        $curl = '{'
              . '  "acknowledged": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
