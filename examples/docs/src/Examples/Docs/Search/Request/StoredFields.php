<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: StoredFields
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   search/request/stored-fields.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class StoredFields extends SimpleExamplesTester {

    /**
     * Tag:  2eeb3e55a7d3955e084bb369f1539009
     * Line: 13
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL13_2eeb3e55a7d3955e084bb369f1539009()
    {
        $client = $this->getClient();
        // tag::2eeb3e55a7d3955e084bb369f1539009[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "stored_fields" : ["user", "postDate"],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::2eeb3e55a7d3955e084bb369f1539009[]

        $curl = 'GET /_search'
              . '{'
              . '    "stored_fields" : ["user", "postDate"],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2af86a6ebbb834fbcf6fa7268f87a3a5
     * Line: 30
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL30_2af86a6ebbb834fbcf6fa7268f87a3a5()
    {
        $client = $this->getClient();
        // tag::2af86a6ebbb834fbcf6fa7268f87a3a5[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "stored_fields" : [],
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::2af86a6ebbb834fbcf6fa7268f87a3a5[]

        $curl = 'GET /_search'
              . '{'
              . '    "stored_fields" : [],'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ccec437aed7a10d9111724ffd929fe00
     * Line: 62
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL62_ccec437aed7a10d9111724ffd929fe00()
    {
        $client = $this->getClient();
        // tag::ccec437aed7a10d9111724ffd929fe00[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "stored_fields": "_none_",
        //     "query" : {
        //         "term" : { "user" : "kimchy" }
        //     }
        // }
        // end::ccec437aed7a10d9111724ffd929fe00[]

        $curl = 'GET /_search'
              . '{'
              . '    "stored_fields": "_none_",'
              . '    "query" : {'
              . '        "term" : { "user" : "kimchy" }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
