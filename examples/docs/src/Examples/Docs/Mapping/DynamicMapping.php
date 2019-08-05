<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DynamicMapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/dynamic-mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DynamicMapping extends SimpleExamplesTester {

    /**
     * Tag:  61c49cee90c6aa0eafbdd5cc03936e7d
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_61c49cee90c6aa0eafbdd5cc03936e7d()
    {
        $client = $this->getClient();
        // tag::61c49cee90c6aa0eafbdd5cc03936e7d[]
        // TODO -- Implement Example
        // PUT data/_doc/1 \<1>
        // { "count": 5 }
        // end::61c49cee90c6aa0eafbdd5cc03936e7d[]

        $curl = 'PUT data/_doc/1 \<1>'
              . '{ "count": 5 }';

        // TODO -- make assertion
    }

// %__METHOD__%


}
