<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TypesExists
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/types-exists.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TypesExists extends SimpleExamplesTester {

    /**
     * Tag:  7ee31b1237a714c49760a1cc499cbd87
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_7ee31b1237a714c49760a1cc499cbd87()
    {
        $client = $this->getClient();
        // tag::7ee31b1237a714c49760a1cc499cbd87[]
        // TODO -- Implement Example
        // HEAD twitter/_mapping/tweet
        // end::7ee31b1237a714c49760a1cc499cbd87[]

        $curl = 'HEAD twitter/_mapping/tweet';

        // TODO -- make assertion
    }

// %__METHOD__%


}
