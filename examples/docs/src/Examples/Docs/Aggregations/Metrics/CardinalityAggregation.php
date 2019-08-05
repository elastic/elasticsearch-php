<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CardinalityAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/cardinality-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CardinalityAggregation extends SimpleExamplesTester {

    /**
     * Tag:  826140cdd3d5fe9a728239605c6dc71a
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_826140cdd3d5fe9a728239605c6dc71a()
    {
        $client = $this->getClient();
        // tag::826140cdd3d5fe9a728239605c6dc71a[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "type_count" : {
        //             "cardinality" : {
        //                 "field" : "type"
        //             }
        //         }
        //     }
        // }
        // end::826140cdd3d5fe9a728239605c6dc71a[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "type_count" : {'
              . '            "cardinality" : {'
              . '                "field" : "type"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  edbd54e71e56f3a5617aa012b100aa0f
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_edbd54e71e56f3a5617aa012b100aa0f()
    {
        $client = $this->getClient();
        // tag::edbd54e71e56f3a5617aa012b100aa0f[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "type_count" : {
        //             "cardinality" : {
        //                 "field" : "type",
        //                 "precision_threshold": 100 \<1>
        //             }
        //         }
        //     }
        // }
        // end::edbd54e71e56f3a5617aa012b100aa0f[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "type_count" : {'
              . '            "cardinality" : {'
              . '                "field" : "type",'
              . '                "precision_threshold": 100 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ef3a3e292e9e74d42703555178ed5fb6
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_ef3a3e292e9e74d42703555178ed5fb6()
    {
        $client = $this->getClient();
        // tag::ef3a3e292e9e74d42703555178ed5fb6[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "type_promoted_count" : {
        //             "cardinality" : {
        //                 "script": {
        //                     "lang": "painless",
        //                     "source": "doc['type'].value + ' ' + doc['promoted'].value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::ef3a3e292e9e74d42703555178ed5fb6[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "type_promoted_count" : {'
              . '            "cardinality" : {'
              . '                "script": {'
              . '                    "lang": "painless",'
              . '                    "source": "doc['type'].value + ' ' + doc['promoted'].value"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6969b29883eefa552475ae1837dc5f96
     * Line: 208
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL208_6969b29883eefa552475ae1837dc5f96()
    {
        $client = $this->getClient();
        // tag::6969b29883eefa552475ae1837dc5f96[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "type_promoted_count" : {
        //             "cardinality" : {
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params": {
        //                         "type_field": "type",
        //                         "promoted_field": "promoted"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::6969b29883eefa552475ae1837dc5f96[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "type_promoted_count" : {'
              . '            "cardinality" : {'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params": {'
              . '                        "type_field": "type",'
              . '                        "promoted_field": "promoted"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7d86ff090cbd87f144edb72e949470b3
     * Line: 236
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL236_7d86ff090cbd87f144edb72e949470b3()
    {
        $client = $this->getClient();
        // tag::7d86ff090cbd87f144edb72e949470b3[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "tag_cardinality" : {
        //             "cardinality" : {
        //                 "field" : "tag",
        //                 "missing": "N/A" \<1>
        //             }
        //         }
        //     }
        // }
        // end::7d86ff090cbd87f144edb72e949470b3[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "tag_cardinality" : {'
              . '            "cardinality" : {'
              . '                "field" : "tag",'
              . '                "missing": "N/A" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
