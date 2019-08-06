<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/delete-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteIndex extends SimpleExamplesTester {

    /**
     * Tag:  98f14fddddea54a7d6149ab7b92e099d
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_98f14fddddea54a7d6149ab7b92e099d()
    {
        $client = $this->getClient();
        // tag::98f14fddddea54a7d6149ab7b92e099d[]
        // TODO -- Implement Example
        // DELETE /twitter
        // end::98f14fddddea54a7d6149ab7b92e099d[]

        $curl = 'DELETE /twitter';

        // TODO -- make assertion
    }

// %__METHOD__%


}
