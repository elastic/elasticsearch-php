<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FromSize
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/from-size.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FromSize extends SimpleExamplesTester {

    /**
     * Tag:  9a26759ccbd338224ecaacf7c49ab08e
     * Line: 14
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL14_9a26759ccbd338224ecaacf7c49ab08e()
    {
        $client = $this->getClient();
        // tag::9a26759ccbd338224ecaacf7c49ab08e[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "from" : 0, "size" : 10,
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::9a26759ccbd338224ecaacf7c49ab08e[]

        $curl = 'GET /_search'
              . '{'
              . '    "from" : 0, "size" : 10,'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
