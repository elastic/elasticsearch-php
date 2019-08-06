<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MinAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/min-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MinAggregation extends SimpleExamplesTester {

    /**
     * Tag:  bbd52c02b078e650f1a871f7fe7ff343
     * Line: 16
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL16_bbd52c02b078e650f1a871f7fe7ff343()
    {
        $client = $this->getClient();
        // tag::bbd52c02b078e650f1a871f7fe7ff343[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "min_price" : { "min" : { "field" : "price" } }
        //     }
        // }
        // end::bbd52c02b078e650f1a871f7fe7ff343[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "min_price" : { "min" : { "field" : "price" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  27cf2556b606f91d1fe3db3d7b6fd21a
     * Line: 53
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL53_27cf2556b606f91d1fe3db3d7b6fd21a()
    {
        $client = $this->getClient();
        // tag::27cf2556b606f91d1fe3db3d7b6fd21a[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "min_price" : {
        //             "min" : {
        //                 "script" : {
        //                     "source" : "doc.price.value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::27cf2556b606f91d1fe3db3d7b6fd21a[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "min_price" : {'
              . '            "min" : {'
              . '                "script" : {'
              . '                    "source" : "doc.price.value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f76eb7821cb7855339ffcaab3460d934
     * Line: 74
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL74_f76eb7821cb7855339ffcaab3460d934()
    {
        $client = $this->getClient();
        // tag::f76eb7821cb7855339ffcaab3460d934[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "min_price" : {
        //             "min" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params": {
        //                         "field": "price"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::f76eb7821cb7855339ffcaab3460d934[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "min_price" : {'
              . '            "min" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params": {'
              . '                        "field": "price"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  57ec3af2f4b3ce90722de51efc9d2cf1
     * Line: 102
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL102_57ec3af2f4b3ce90722de51efc9d2cf1()
    {
        $client = $this->getClient();
        // tag::57ec3af2f4b3ce90722de51efc9d2cf1[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "min_price_in_euros" : {
        //             "min" : {
        //                 "field" : "price",
        //                 "script" : {
        //                     "source" : "_value * params.conversion_rate",
        //                     "params" : {
        //                         "conversion_rate" : 1.2
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::57ec3af2f4b3ce90722de51efc9d2cf1[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "min_price_in_euros" : {'
              . '            "min" : {'
              . '                "field" : "price",'
              . '                "script" : {'
              . '                    "source" : "_value * params.conversion_rate",'
              . '                    "params" : {'
              . '                        "conversion_rate" : 1.2'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  05161bf816a98dd2a57b8cd2a3d39db4
     * Line: 130
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL130_05161bf816a98dd2a57b8cd2a3d39db4()
    {
        $client = $this->getClient();
        // tag::05161bf816a98dd2a57b8cd2a3d39db4[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "grade_min" : {
        //             "min" : {
        //                 "field" : "grade",
        //                 "missing": 10 \<1>
        //             }
        //         }
        //     }
        // }
        // end::05161bf816a98dd2a57b8cd2a3d39db4[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "grade_min" : {'
              . '            "min" : {'
              . '                "field" : "grade",'
              . '                "missing": 10 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
