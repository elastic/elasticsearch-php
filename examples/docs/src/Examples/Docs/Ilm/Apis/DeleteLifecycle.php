<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteLifecycle
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/delete-lifecycle.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteLifecycle extends SimpleExamplesTester {

    /**
     * Tag:  af517b6936fa41d124d68b107b2efdc3
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_af517b6936fa41d124d68b107b2efdc3()
    {
        $client = $this->getClient();
        // tag::af517b6936fa41d124d68b107b2efdc3[]
        // TODO -- Implement Example
        // DELETE _ilm/policy/my_policy
        // end::af517b6936fa41d124d68b107b2efdc3[]

        $curl = 'DELETE _ilm/policy/my_policy';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc5fcc40c29087a0df7b5405bb70de5c
     * Line: 80
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL80_bc5fcc40c29087a0df7b5405bb70de5c()
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
