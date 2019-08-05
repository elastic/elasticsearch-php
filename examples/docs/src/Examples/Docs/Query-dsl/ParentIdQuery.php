<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ParentIdQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/parent-id-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ParentIdQuery extends SimpleExamplesTester {

    /**
     * Tag:  0377c031f840e23dcf607a08e5549bac
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_0377c031f840e23dcf607a08e5549bac()
    {
        $client = $this->getClient();
        // tag::0377c031f840e23dcf607a08e5549bac[]
        // TODO -- Implement Example
        // PUT /my-index
        // {
        //     "mappings": {
        //         "properties" : {
        //             "my-join-field" : {
        //                 "type" : "join",
        //                 "relations": {
        //                     "my-parent": "my-child"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0377c031f840e23dcf607a08e5549bac[]

        $curl = 'PUT /my-index'
              . '{'
              . '    "mappings": {'
              . '        "properties" : {'
              . '            "my-join-field" : {'
              . '                "type" : "join",'
              . '                "relations": {'
              . '                    "my-parent": "my-child"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6528a67cc20e5a422f11cbc0ffb6f673
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_6528a67cc20e5a422f11cbc0ffb6f673()
    {
        $client = $this->getClient();
        // tag::6528a67cc20e5a422f11cbc0ffb6f673[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/1?refresh
        // {
        //   "text": "This is a parent document.",
        //   "my-join-field": "my-parent"
        // }
        // end::6528a67cc20e5a422f11cbc0ffb6f673[]

        $curl = 'PUT /my-index/_doc/1?refresh'
              . '{'
              . '  "text": "This is a parent document.",'
              . '  "my-join-field": "my-parent"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a4d0e6ff5bb904cbd686aecafa917aa2
     * Line: 62
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL62_a4d0e6ff5bb904cbd686aecafa917aa2()
    {
        $client = $this->getClient();
        // tag::a4d0e6ff5bb904cbd686aecafa917aa2[]
        // TODO -- Implement Example
        // PUT /my-index/_doc/2?routing=1&refresh
        // {
        //   "text": "This is a child document.",
        //   "my_join_field": {
        //     "name": "my-child",
        //     "parent": "1"
        //   }
        // }
        // end::a4d0e6ff5bb904cbd686aecafa917aa2[]

        $curl = 'PUT /my-index/_doc/2?routing=1&refresh'
              . '{'
              . '  "text": "This is a child document.",'
              . '  "my_join_field": {'
              . '    "name": "my-child",'
              . '    "parent": "1"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0dd8ee4a383f84f8454c262262630f41
     * Line: 82
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL82_0dd8ee4a383f84f8454c262262630f41()
    {
        $client = $this->getClient();
        // tag::0dd8ee4a383f84f8454c262262630f41[]
        // TODO -- Implement Example
        // GET /my-index/_search
        // {
        //   "query": {
        //       "parent_id": {
        //           "type": "my-child",
        //           "id": "1"
        //       }
        //   }
        // }
        // end::0dd8ee4a383f84f8454c262262630f41[]

        $curl = 'GET /my-index/_search'
              . '{'
              . '  "query": {'
              . '      "parent_id": {'
              . '          "type": "my-child",'
              . '          "id": "1"'
              . '      }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
