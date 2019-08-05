<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: TermQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/term-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class TermQuery extends SimpleExamplesTester {

    /**
     * Tag:  d0a8a938a2fa913b6fdbc871079a59dd
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_d0a8a938a2fa913b6fdbc871079a59dd()
    {
        $client = $this->getClient();
        // tag::d0a8a938a2fa913b6fdbc871079a59dd[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query": {
        //         "term": {
        //             "user": {
        //                 "value": "Kimchy",
        //                 "boost": 1.0
        //             }
        //         }
        //     }
        // }
        // end::d0a8a938a2fa913b6fdbc871079a59dd[]

        $curl = 'GET /_search'
              . '{'
              . '    "query": {'
              . '        "term": {'
              . '            "user": {'
              . '                "value": "Kimchy",'
              . '                "boost": 1.0'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2a1de18774f9c68cafa169847832b2bc
     * Line: 95
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL95_2a1de18774f9c68cafa169847832b2bc()
    {
        $client = $this->getClient();
        // tag::2a1de18774f9c68cafa169847832b2bc[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //     "mappings" : {
        //         "properties" : {
        //             "full_text" : { "type" : "text" }
        //         }
        //     }
        // }
        // end::2a1de18774f9c68cafa169847832b2bc[]

        $curl = 'PUT my_index'
              . '{'
              . '    "mappings" : {'
              . '        "properties" : {'
              . '            "full_text" : { "type" : "text" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d4b4cefba4318caeba7480187faf2b13
     * Line: 115
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL115_d4b4cefba4318caeba7480187faf2b13()
    {
        $client = $this->getClient();
        // tag::d4b4cefba4318caeba7480187faf2b13[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "full_text":   "Quick Brown Foxes!"
        // }
        // end::d4b4cefba4318caeba7480187faf2b13[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "full_text":   "Quick Brown Foxes!"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cdedd5f33f7e5f7acde561e97bff61de
     * Line: 135
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL135_cdedd5f33f7e5f7acde561e97bff61de()
    {
        $client = $this->getClient();
        // tag::cdedd5f33f7e5f7acde561e97bff61de[]
        // TODO -- Implement Example
        // GET my_index/_search?pretty
        // {
        //   "query": {
        //     "term": {
        //       "full_text": "Quick Brown Foxes!"
        //     }
        //   }
        // }
        // end::cdedd5f33f7e5f7acde561e97bff61de[]

        $curl = 'GET my_index/_search?pretty'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "full_text": "Quick Brown Foxes!"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a80f5db4357bb25b8704d374c18318ed
     * Line: 170
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL170_a80f5db4357bb25b8704d374c18318ed()
    {
        $client = $this->getClient();
        // tag::a80f5db4357bb25b8704d374c18318ed[]
        // TODO -- Implement Example
        // GET my_index/_search?pretty
        // {
        //   "query": {
        //     "match": {
        //       "full_text": "Quick Brown Foxes!"
        //     }
        //   }
        // }
        // end::a80f5db4357bb25b8704d374c18318ed[]

        $curl = 'GET my_index/_search?pretty'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "full_text": "Quick Brown Foxes!"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
