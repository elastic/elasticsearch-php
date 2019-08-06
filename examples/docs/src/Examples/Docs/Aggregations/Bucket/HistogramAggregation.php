<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: HistogramAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/histogram-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class HistogramAggregation extends SimpleExamplesTester {

    /**
     * Tag:  322e1a8842fc5924b972a9a32c29c17a
     * Line: 23
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL23_322e1a8842fc5924b972a9a32c29c17a()
    {
        $client = $this->getClient();
        // tag::322e1a8842fc5924b972a9a32c29c17a[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "prices" : {
        //             "histogram" : {
        //                 "field" : "price",
        //                 "interval" : 50
        //             }
        //         }
        //     }
        // }
        // end::322e1a8842fc5924b972a9a32c29c17a[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "prices" : {'
              . '            "histogram" : {'
              . '                "field" : "price",'
              . '                "interval" : 50'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0003e4064d004a341c193ddd5d82a07f
     * Line: 82
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL82_0003e4064d004a341c193ddd5d82a07f()
    {
        $client = $this->getClient();
        // tag::0003e4064d004a341c193ddd5d82a07f[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "prices" : {
        //             "histogram" : {
        //                 "field" : "price",
        //                 "interval" : 50,
        //                 "min_doc_count" : 1
        //             }
        //         }
        //     }
        // }
        // end::0003e4064d004a341c193ddd5d82a07f[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "prices" : {'
              . '            "histogram" : {'
              . '                "field" : "price",'
              . '                "interval" : 50,'
              . '                "min_doc_count" : 1'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c72bd866a7e21907fa71f1067371db55
     * Line: 158
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL158_c72bd866a7e21907fa71f1067371db55()
    {
        $client = $this->getClient();
        // tag::c72bd866a7e21907fa71f1067371db55[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : { "filter": { "range" : { "price" : { "to" : "500" } } } }
        //     },
        //     "aggs" : {
        //         "prices" : {
        //             "histogram" : {
        //                 "field" : "price",
        //                 "interval" : 50,
        //                 "extended_bounds" : {
        //                     "min" : 0,
        //                     "max" : 500
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c72bd866a7e21907fa71f1067371db55[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : { "filter": { "range" : { "price" : { "to" : "500" } } } }'
              . '    },'
              . '    "aggs" : {'
              . '        "prices" : {'
              . '            "histogram" : {'
              . '                "field" : "price",'
              . '                "interval" : 50,'
              . '                "extended_bounds" : {'
              . '                    "min" : 0,'
              . '                    "max" : 500'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e0bba0f00a589933499493390a9a0517
     * Line: 201
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL201_e0bba0f00a589933499493390a9a0517()
    {
        $client = $this->getClient();
        // tag::e0bba0f00a589933499493390a9a0517[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "prices" : {
        //             "histogram" : {
        //                 "field" : "price",
        //                 "interval" : 50,
        //                 "keyed" : true
        //             }
        //         }
        //     }
        // }
        // end::e0bba0f00a589933499493390a9a0517[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "prices" : {'
              . '            "histogram" : {'
              . '                "field" : "price",'
              . '                "interval" : 50,'
              . '                "keyed" : true'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  271c55d9a421dbc794caa0ebaead95e3
     * Line: 261
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL261_271c55d9a421dbc794caa0ebaead95e3()
    {
        $client = $this->getClient();
        // tag::271c55d9a421dbc794caa0ebaead95e3[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "quantity" : {
        //              "histogram" : {
        //                  "field" : "quantity",
        //                  "interval": 10,
        //                  "missing": 0 \<1>
        //              }
        //          }
        //     }
        // }
        // end::271c55d9a421dbc794caa0ebaead95e3[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "quantity" : {'
              . '             "histogram" : {'
              . '                 "field" : "quantity",'
              . '                 "interval": 10,'
              . '                 "missing": 0 \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
