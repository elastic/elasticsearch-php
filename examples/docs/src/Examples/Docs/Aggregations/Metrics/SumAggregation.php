<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SumAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/sum-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SumAggregation extends SimpleExamplesTester {

    /**
     * Tag:  43159621ffaa30dbfd60459a5e7b8e54
     * Line: 10
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL10_43159621ffaa30dbfd60459a5e7b8e54()
    {
        $client = $this->getClient();
        // tag::43159621ffaa30dbfd60459a5e7b8e54[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : {
        //             "filter" : {
        //                 "match" : { "type" : "hat" }
        //             }
        //         }
        //     },
        //     "aggs" : {
        //         "hat_prices" : { "sum" : { "field" : "price" } }
        //     }
        // }
        // end::43159621ffaa30dbfd60459a5e7b8e54[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "match" : { "type" : "hat" }'
              . '            }'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "hat_prices" : { "sum" : { "field" : "price" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4b5f2bd0db1a94614f4d2e46a5159bd2
     * Line: 50
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL50_4b5f2bd0db1a94614f4d2e46a5159bd2()
    {
        $client = $this->getClient();
        // tag::4b5f2bd0db1a94614f4d2e46a5159bd2[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : {
        //             "filter" : {
        //                 "match" : { "type" : "hat" }
        //             }
        //         }
        //     },
        //     "aggs" : {
        //         "hat_prices" : {
        //             "sum" : {
        //                 "script" : {
        //                    "source": "doc.price.value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::4b5f2bd0db1a94614f4d2e46a5159bd2[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "match" : { "type" : "hat" }'
              . '            }'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "hat_prices" : {'
              . '            "sum" : {'
              . '                "script" : {'
              . '                   "source": "doc.price.value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  49a4032ac0cbc413b47660bcf998ef5f
     * Line: 77
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL77_49a4032ac0cbc413b47660bcf998ef5f()
    {
        $client = $this->getClient();
        // tag::49a4032ac0cbc413b47660bcf998ef5f[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : {
        //             "filter" : {
        //                 "match" : { "type" : "hat" }
        //             }
        //         }
        //     },
        //     "aggs" : {
        //         "hat_prices" : {
        //             "sum" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params" : {
        //                         "field" : "price"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::49a4032ac0cbc413b47660bcf998ef5f[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "match" : { "type" : "hat" }'
              . '            }'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "hat_prices" : {'
              . '            "sum" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params" : {'
              . '                        "field" : "price"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  82a2031f77972b713f75ed05c4bd9815
     * Line: 110
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL110_82a2031f77972b713f75ed05c4bd9815()
    {
        $client = $this->getClient();
        // tag::82a2031f77972b713f75ed05c4bd9815[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : {
        //             "filter" : {
        //                 "match" : { "type" : "hat" }
        //             }
        //         }
        //     },
        //     "aggs" : {
        //         "square_hats" : {
        //             "sum" : {
        //                 "field" : "price",
        //                 "script" : {
        //                     "source": "_value * _value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::82a2031f77972b713f75ed05c4bd9815[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "match" : { "type" : "hat" }'
              . '            }'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "square_hats" : {'
              . '            "sum" : {'
              . '                "field" : "price",'
              . '                "script" : {'
              . '                    "source": "_value * _value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a78c3f4389502fe2dbd1cd10a017d1ed
     * Line: 143
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL143_a78c3f4389502fe2dbd1cd10a017d1ed()
    {
        $client = $this->getClient();
        // tag::a78c3f4389502fe2dbd1cd10a017d1ed[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "query" : {
        //         "constant_score" : {
        //             "filter" : {
        //                 "match" : { "type" : "hat" }
        //             }
        //         }
        //     },
        //     "aggs" : {
        //         "hat_prices" : {
        //             "sum" : {
        //                 "field" : "price",
        //                 "missing": 100 \<1>
        //             }
        //         }
        //     }
        // }
        // end::a78c3f4389502fe2dbd1cd10a017d1ed[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "constant_score" : {'
              . '            "filter" : {'
              . '                "match" : { "type" : "hat" }'
              . '            }'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "hat_prices" : {'
              . '            "sum" : {'
              . '                "field" : "price",'
              . '                "missing": 100 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
