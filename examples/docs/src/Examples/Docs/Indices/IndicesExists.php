<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndicesExists
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/indices-exists.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndicesExists extends SimpleExamplesTester {

    /**
     * Tag:  2609ef78d52856aece101d28fc1e0701
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_2609ef78d52856aece101d28fc1e0701()
    {
        $client = $this->getClient();
        // tag::2609ef78d52856aece101d28fc1e0701[]
        // TODO -- Implement Example
        // HEAD twitter
        // end::2609ef78d52856aece101d28fc1e0701[]

        $curl = 'HEAD twitter';

        // TODO -- make assertion
    }

// %__METHOD__%


}
