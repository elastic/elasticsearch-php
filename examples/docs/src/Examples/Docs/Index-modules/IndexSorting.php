<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IndexSorting
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   index-modules/index-sorting.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IndexSorting extends SimpleExamplesTester {

    /**
     * Tag:  fea339c85b60ccefa6a163a70b86ca82
     * Line: 16
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL16_fea339c85b60ccefa6a163a70b86ca82()
    {
        $client = $this->getClient();
        // tag::fea339c85b60ccefa6a163a70b86ca82[]
        // TODO -- Implement Example
        // PUT twitter
        // {
        //     "settings" : {
        //         "index" : {
        //             "sort.field" : "date", \<1>
        //             "sort.order" : "desc" \<2>
        //         }
        //     },
        //     "mappings": {
        //         "properties": {
        //             "date": {
        //                 "type": "date"
        //             }
        //         }
        //     }
        // }
        // end::fea339c85b60ccefa6a163a70b86ca82[]

        $curl = 'PUT twitter'
              . '{'
              . '    "settings" : {'
              . '        "index" : {'
              . '            "sort.field" : "date", \<1>'
              . '            "sort.order" : "desc" \<2>'
              . '        }'
              . '    },'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "date": {'
              . '                "type": "date"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a69f1a67cdc141e8dde5abb437c76959
     * Line: 42
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL42_a69f1a67cdc141e8dde5abb437c76959()
    {
        $client = $this->getClient();
        // tag::a69f1a67cdc141e8dde5abb437c76959[]
        // TODO -- Implement Example
        // PUT twitter
        // {
        //     "settings" : {
        //         "index" : {
        //             "sort.field" : ["username", "date"], \<1>
        //             "sort.order" : ["asc", "desc"] \<2>
        //         }
        //     },
        //     "mappings": {
        //         "properties": {
        //             "username": {
        //                 "type": "keyword",
        //                 "doc_values": true
        //             },
        //             "date": {
        //                 "type": "date"
        //             }
        //         }
        //     }
        // }
        // end::a69f1a67cdc141e8dde5abb437c76959[]

        $curl = 'PUT twitter'
              . '{'
              . '    "settings" : {'
              . '        "index" : {'
              . '            "sort.field" : ["username", "date"], \<1>'
              . '            "sort.order" : ["asc", "desc"] \<2>'
              . '        }'
              . '    },'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "username": {'
              . '                "type": "keyword",'
              . '                "doc_values": true'
              . '            },'
              . '            "date": {'
              . '                "type": "date"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e01a82a0a809a4770ddc84c2cfc1ec85
     * Line: 116
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL116_e01a82a0a809a4770ddc84c2cfc1ec85()
    {
        $client = $this->getClient();
        // tag::e01a82a0a809a4770ddc84c2cfc1ec85[]
        // TODO -- Implement Example
        // PUT events
        // {
        //     "settings" : {
        //         "index" : {
        //             "sort.field" : "timestamp",
        //             "sort.order" : "desc" \<1>
        //         }
        //     },
        //     "mappings": {
        //         "properties": {
        //             "timestamp": {
        //                 "type": "date"
        //             }
        //         }
        //     }
        // }
        // end::e01a82a0a809a4770ddc84c2cfc1ec85[]

        $curl = 'PUT events'
              . '{'
              . '    "settings" : {'
              . '        "index" : {'
              . '            "sort.field" : "timestamp",'
              . '            "sort.order" : "desc" \<1>'
              . '        }'
              . '    },'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "timestamp": {'
              . '                "type": "date"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  46a3694ee4a7bbd4973565e5886782bb
     * Line: 141
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL141_46a3694ee4a7bbd4973565e5886782bb()
    {
        $client = $this->getClient();
        // tag::46a3694ee4a7bbd4973565e5886782bb[]
        // TODO -- Implement Example
        // GET /events/_search
        // {
        //     "size": 10,
        //     "sort": [
        //         { "timestamp": "desc" }
        //     ]
        // }
        // end::46a3694ee4a7bbd4973565e5886782bb[]

        $curl = 'GET /events/_search'
              . '{'
              . '    "size": 10,'
              . '    "sort": ['
              . '        { "timestamp": "desc" }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2e8ba1e0b2a18dd276bbbe64f2b86338
     * Line: 163
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL163_2e8ba1e0b2a18dd276bbbe64f2b86338()
    {
        $client = $this->getClient();
        // tag::2e8ba1e0b2a18dd276bbbe64f2b86338[]
        // TODO -- Implement Example
        // GET /events/_search
        // {
        //     "size": 10,
        //     "sort": [ \<1>
        //         { "timestamp": "desc" }
        //     ],
        //     "track_total_hits": false
        // }
        // end::2e8ba1e0b2a18dd276bbbe64f2b86338[]

        $curl = 'GET /events/_search'
              . '{'
              . '    "size": 10,'
              . '    "sort": [ \<1>'
              . '        { "timestamp": "desc" }'
              . '    ],'
              . '    "track_total_hits": false'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
