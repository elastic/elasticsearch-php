<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ValuecountAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/valuecount-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ValuecountAggregation extends SimpleExamplesTester {

    /**
     * Tag:  5dd695679b5141d9142d3d30ba8d300a
     * Line: 10
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL10_5dd695679b5141d9142d3d30ba8d300a()
    {
        $client = $this->getClient();
        // tag::5dd695679b5141d9142d3d30ba8d300a[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "types_count" : { "value_count" : { "field" : "type" } }
        //     }
        // }
        // end::5dd695679b5141d9142d3d30ba8d300a[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "types_count" : { "value_count" : { "field" : "type" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3722cb3705b6bc7f486969deace3dd83
     * Line: 44
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL44_3722cb3705b6bc7f486969deace3dd83()
    {
        $client = $this->getClient();
        // tag::3722cb3705b6bc7f486969deace3dd83[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "type_count" : {
        //             "value_count" : {
        //                 "script" : {
        //                     "source" : "doc[\'type\'].value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::3722cb3705b6bc7f486969deace3dd83[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "type_count" : {'
              . '            "value_count" : {'
              . '                "script" : {'
              . '                    "source" : "doc[\'type\'].value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  213ab768f1b6a895e09403a0880e259a
     * Line: 64
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL64_213ab768f1b6a895e09403a0880e259a()
    {
        $client = $this->getClient();
        // tag::213ab768f1b6a895e09403a0880e259a[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "types_count" : {
        //             "value_count" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params" : {
        //                         "field" : "type"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::213ab768f1b6a895e09403a0880e259a[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "types_count" : {'
              . '            "value_count" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params" : {'
              . '                        "field" : "type"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
