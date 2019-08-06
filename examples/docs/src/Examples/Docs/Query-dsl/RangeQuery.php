<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RangeQuery
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   query-dsl/range-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RangeQuery extends SimpleExamplesTester {

    /**
     * Tag:  97bcd92ef148312d41e69f0d18284327
     * Line: 16
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL16_97bcd92ef148312d41e69f0d18284327()
    {
        $client = $this->getClient();
        // tag::97bcd92ef148312d41e69f0d18284327[]
        // TODO -- Implement Example
        // GET _search
        // {
        //     "query": {
        //         "range" : {
        //             "age" : {
        //                 "gte" : 10,
        //                 "lte" : 20,
        //                 "boost" : 2.0
        //             }
        //         }
        //     }
        // }
        // end::97bcd92ef148312d41e69f0d18284327[]

        $curl = 'GET _search'
              . '{'
              . '    "query": {'
              . '        "range" : {'
              . '            "age" : {'
              . '                "gte" : 10,'
              . '                "lte" : 20,'
              . '                "boost" : 2.0'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4466d410e06712c63328de4db249e6da
     * Line: 153
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL153_4466d410e06712c63328de4db249e6da()
    {
        $client = $this->getClient();
        // tag::4466d410e06712c63328de4db249e6da[]
        // TODO -- Implement Example
        // GET _search
        // {
        //     "query": {
        //         "range" : {
        //             "timestamp" : {
        //                 "gte" : "now-1d/d",
        //                 "lt" :  "now/d"
        //             }
        //         }
        //     }
        // }
        // end::4466d410e06712c63328de4db249e6da[]

        $curl = 'GET _search'
              . '{'
              . '    "query": {'
              . '        "range" : {'
              . '            "timestamp" : {'
              . '                "gte" : "now-1d/d",'
              . '                "lt" :  "now/d"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5d13a71fa7fda73b15111803b1c7cfd3
     * Line: 216
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL216_5d13a71fa7fda73b15111803b1c7cfd3()
    {
        $client = $this->getClient();
        // tag::5d13a71fa7fda73b15111803b1c7cfd3[]
        // TODO -- Implement Example
        // GET _search
        // {
        //     "query": {
        //         "range" : {
        //             "timestamp" : {
        //                 "time_zone": "+01:00", \<1>
        //                 "gte": "2015-01-01 00:00:00", \<2>
        //                 "lte": "now" \<3>
        //             }
        //         }
        //     }
        // }
        // end::5d13a71fa7fda73b15111803b1c7cfd3[]

        $curl = 'GET _search'
              . '{'
              . '    "query": {'
              . '        "range" : {'
              . '            "timestamp" : {'
              . '                "time_zone": "+01:00", \<1>'
              . '                "gte": "2015-01-01 00:00:00", \<2>'
              . '                "lte": "now" \<3>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
