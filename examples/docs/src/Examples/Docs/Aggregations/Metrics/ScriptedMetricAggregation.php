<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ScriptedMetricAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/scripted-metric-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ScriptedMetricAggregation extends SimpleExamplesTester {

    /**
     * Tag:  20600097aa51aa3386536bdc681e92b6
     * Line: 9
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL9_20600097aa51aa3386536bdc681e92b6()
    {
        $client = $this->getClient();
        // tag::20600097aa51aa3386536bdc681e92b6[]
        // TODO -- Implement Example
        // POST ledger/_search?size=0
        // {
        //     "query" : {
        //         "match_all" : {}
        //     },
        //     "aggs": {
        //         "profit": {
        //             "scripted_metric": {
        //                 "init_script" : "state.transactions = []", \<1>
        //                 "map_script" : "state.transactions.add(doc.type.value == \'sale\' ? doc.amount.value : -1 * doc.amount.value)",
        //                 "combine_script" : "double profit = 0; for (t in state.transactions) { profit += t } return profit",
        //                 "reduce_script" : "double profit = 0; for (a in states) { profit += a } return profit"
        //             }
        //         }
        //     }
        // }
        // end::20600097aa51aa3386536bdc681e92b6[]

        $curl = 'POST ledger/_search?size=0'
              . '{'
              . '    "query" : {'
              . '        "match_all" : {}'
              . '    },'
              . '    "aggs": {'
              . '        "profit": {'
              . '            "scripted_metric": {'
              . '                "init_script" : "state.transactions = []", \<1>'
              . '                "map_script" : "state.transactions.add(doc.type.value == \'sale\' ? doc.amount.value : -1 * doc.amount.value)",'
              . '                "combine_script" : "double profit = 0; for (t in state.transactions) { profit += t } return profit",'
              . '                "reduce_script" : "double profit = 0; for (a in states) { profit += a } return profit"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  129ce418d8dd1f71087678725a0df19f
     * Line: 54
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL54_129ce418d8dd1f71087678725a0df19f()
    {
        $client = $this->getClient();
        // tag::129ce418d8dd1f71087678725a0df19f[]
        // TODO -- Implement Example
        // POST ledger/_search?size=0
        // {
        //     "aggs": {
        //         "profit": {
        //             "scripted_metric": {
        //                 "init_script" : {
        //                     "id": "my_init_script"
        //                 },
        //                 "map_script" : {
        //                     "id": "my_map_script"
        //                 },
        //                 "combine_script" : {
        //                     "id": "my_combine_script"
        //                 },
        //                 "params": {
        //                     "field": "amount" \<1>
        //                 },
        //                 "reduce_script" : {
        //                     "id": "my_reduce_script"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::129ce418d8dd1f71087678725a0df19f[]

        $curl = 'POST ledger/_search?size=0'
              . '{'
              . '    "aggs": {'
              . '        "profit": {'
              . '            "scripted_metric": {'
              . '                "init_script" : {'
              . '                    "id": "my_init_script"'
              . '                },'
              . '                "map_script" : {'
              . '                    "id": "my_map_script"'
              . '                },'
              . '                "combine_script" : {'
              . '                    "id": "my_combine_script"'
              . '                },'
              . '                "params": {'
              . '                    "field": "amount" \<1>'
              . '                },'
              . '                "reduce_script" : {'
              . '                    "id": "my_reduce_script"'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  75e360d03fb416f0a65ca37c662c2e9c
     * Line: 149
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL149_75e360d03fb416f0a65ca37c662c2e9c()
    {
        $client = $this->getClient();
        // tag::75e360d03fb416f0a65ca37c662c2e9c[]
        // TODO -- Implement Example
        // PUT /transactions/_bulk?refresh
        // {"index":{"_id":1}}
        // {"type": "sale","amount": 80}
        // {"index":{"_id":2}}
        // {"type": "cost","amount": 10}
        // {"index":{"_id":3}}
        // {"type": "cost","amount": 30}
        // {"index":{"_id":4}}
        // {"type": "sale","amount": 130}
        // end::75e360d03fb416f0a65ca37c662c2e9c[]

        $curl = 'PUT /transactions/_bulk?refresh'
              . '{"index":{"_id":1}}'
              . '{"type": "sale","amount": 80}'
              . '{"index":{"_id":2}}'
              . '{"type": "cost","amount": 10}'
              . '{"index":{"_id":3}}'
              . '{"type": "cost","amount": 30}'
              . '{"index":{"_id":4}}'
              . '{"type": "sale","amount": 130}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
