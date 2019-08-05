<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RequestBody
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request-body.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RequestBody extends SimpleExamplesTester {

    /**
     * Tag:  0ce3606f1dba490eef83c4317b315b62
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_0ce3606f1dba490eef83c4317b315b62()
    {
        $client = $this->getClient();
        // tag::0ce3606f1dba490eef83c4317b315b62[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::0ce3606f1dba490eef83c4317b315b62[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bfcd65ab85d684d36a8550080032958d
     * Line: 147
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL147_bfcd65ab85d684d36a8550080032958d()
    {
        $client = $this->getClient();
        // tag::bfcd65ab85d684d36a8550080032958d[]
        // TODO -- Implement Example
        // GET /_search?q=message:number&size=0&terminate_after=1
        // end::bfcd65ab85d684d36a8550080032958d[]

        $curl = 'GET /_search?q=message:number&size=0&terminate_after=1';

        // TODO -- make assertion
    }

// %__METHOD__%



}
