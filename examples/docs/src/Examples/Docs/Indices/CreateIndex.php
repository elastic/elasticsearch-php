<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CreateIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/create-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CreateIndex extends SimpleExamplesTester {

    /**
     * Tag:  a9f021477e6c3d78a7907fbd96e16b5f
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_a9f021477e6c3d78a7907fbd96e16b5f()
    {
        $client = $this->getClient();
        // tag::a9f021477e6c3d78a7907fbd96e16b5f[]
        // TODO -- Implement Example
        // PUT twitter
        // end::a9f021477e6c3d78a7907fbd96e16b5f[]

        $curl = 'PUT twitter';

        // TODO -- make assertion
    }

    /**
     * Tag:  be844338bc330b6d3939bac6ee57bbba
     * Line: 39
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL39_be844338bc330b6d3939bac6ee57bbba()
    {
        $client = $this->getClient();
        // tag::be844338bc330b6d3939bac6ee57bbba[]
        // TODO -- Implement Example
        // PUT twitter
        // {
        //     "settings" : {
        //         "index" : {
        //             "number_of_shards" : 3, \<1>
        //             "number_of_replicas" : 2 \<2>
        //         }
        //     }
        // }
        // end::be844338bc330b6d3939bac6ee57bbba[]

        $curl = 'PUT twitter'
              . '{'
              . '    "settings" : {'
              . '        "index" : {'
              . '            "number_of_shards" : 3, \<1>'
              . '            "number_of_replicas" : 2 \<2>'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  15377f76164fd88309f58097c7125ff2
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_15377f76164fd88309f58097c7125ff2()
    {
        $client = $this->getClient();
        // tag::15377f76164fd88309f58097c7125ff2[]
        // TODO -- Implement Example
        // PUT twitter
        // {
        //     "settings" : {
        //         "number_of_shards" : 3,
        //         "number_of_replicas" : 2
        //     }
        // }
        // end::15377f76164fd88309f58097c7125ff2[]

        $curl = 'PUT twitter'
              . '{'
              . '    "settings" : {'
              . '        "number_of_shards" : 3,'
              . '        "number_of_replicas" : 2'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eaa809dc19ac4e9a4166ed46c6450c36
     * Line: 84
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL84_eaa809dc19ac4e9a4166ed46c6450c36()
    {
        $client = $this->getClient();
        // tag::eaa809dc19ac4e9a4166ed46c6450c36[]
        // TODO -- Implement Example
        // PUT test
        // {
        //     "settings" : {
        //         "number_of_shards" : 1
        //     },
        //     "mappings" : {
        //         "properties" : {
        //             "field1" : { "type" : "text" }
        //         }
        //     }
        // }
        // end::eaa809dc19ac4e9a4166ed46c6450c36[]

        $curl = 'PUT test'
              . '{'
              . '    "settings" : {'
              . '        "number_of_shards" : 1'
              . '    },'
              . '    "mappings" : {'
              . '        "properties" : {'
              . '            "field1" : { "type" : "text" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ab8a4d5bd020a6923446a9bd9e402d16
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_ab8a4d5bd020a6923446a9bd9e402d16()
    {
        $client = $this->getClient();
        // tag::ab8a4d5bd020a6923446a9bd9e402d16[]
        // TODO -- Implement Example
        // PUT test
        // {
        //     "aliases" : {
        //         "alias_1" : {},
        //         "alias_2" : {
        //             "filter" : {
        //                 "term" : {"user" : "kimchy" }
        //             },
        //             "routing" : "kimchy"
        //         }
        //     }
        // }
        // end::ab8a4d5bd020a6923446a9bd9e402d16[]

        $curl = 'PUT test'
              . '{'
              . '    "aliases" : {'
              . '        "alias_1" : {},'
              . '        "alias_2" : {'
              . '            "filter" : {'
              . '                "term" : {"user" : "kimchy" }'
              . '            },'
              . '            "routing" : "kimchy"'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f887b972ee522e0497f4b5289d33f764
     * Line: 160
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL160_f887b972ee522e0497f4b5289d33f764()
    {
        $client = $this->getClient();
        // tag::f887b972ee522e0497f4b5289d33f764[]
        // TODO -- Implement Example
        // PUT test
        // {
        //     "settings": {
        //         "index.write.wait_for_active_shards": "2"
        //     }
        // }
        // end::f887b972ee522e0497f4b5289d33f764[]

        $curl = 'PUT test'
              . '{'
              . '    "settings": {'
              . '        "index.write.wait_for_active_shards": "2"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ef3fb50903876e4497249165ec493bb5
     * Line: 174
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL174_ef3fb50903876e4497249165ec493bb5()
    {
        $client = $this->getClient();
        // tag::ef3fb50903876e4497249165ec493bb5[]
        // TODO -- Implement Example
        // PUT test?wait_for_active_shards=2
        // end::ef3fb50903876e4497249165ec493bb5[]

        $curl = 'PUT test?wait_for_active_shards=2';

        // TODO -- make assertion
    }

// %__METHOD__%








}
