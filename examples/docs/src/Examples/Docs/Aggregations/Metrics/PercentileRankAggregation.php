<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PercentileRankAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/percentile-rank-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PercentileRankAggregation extends SimpleExamplesTester {

    /**
     * Tag:  daaa9e0df859d764ca0a4a4ebcfbdb26
     * Line: 26
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL26_daaa9e0df859d764ca0a4a4ebcfbdb26()
    {
        $client = $this->getClient();
        // tag::daaa9e0df859d764ca0a4a4ebcfbdb26[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_ranks" : {
        //             "percentile_ranks" : {
        //                 "field" : "load_time", \<1>
        //                 "values" : [500, 600]
        //             }
        //         }
        //     }
        // }
        // end::daaa9e0df859d764ca0a4a4ebcfbdb26[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_ranks" : {'
              . '            "percentile_ranks" : {'
              . '                "field" : "load_time", \<1>'
              . '                "values" : [500, 600]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  156dd311073c8c825e608becf63ae7fe
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_156dd311073c8c825e608becf63ae7fe()
    {
        $client = $this->getClient();
        // tag::156dd311073c8c825e608becf63ae7fe[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "load_time_ranks": {
        //             "percentile_ranks": {
        //                 "field": "load_time",
        //                 "values": [500, 600],
        //                 "keyed": false
        //             }
        //         }
        //     }
        // }
        // end::156dd311073c8c825e608becf63ae7fe[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "load_time_ranks": {'
              . '            "percentile_ranks": {'
              . '                "field": "load_time",'
              . '                "values": [500, 600],'
              . '                "keyed": false'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c9ea558335446fc64006724cb72684e1
     * Line: 122
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL122_c9ea558335446fc64006724cb72684e1()
    {
        $client = $this->getClient();
        // tag::c9ea558335446fc64006724cb72684e1[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_ranks" : {
        //             "percentile_ranks" : {
        //                 "values" : [500, 600],
        //                 "script" : {
        //                     "lang": "painless",
        //                     "source": "doc['load_time'].value / params.timeUnit", \<1>
        //                     "params" : {
        //                         "timeUnit" : 1000   \<2>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c9ea558335446fc64006724cb72684e1[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_ranks" : {'
              . '            "percentile_ranks" : {'
              . '                "values" : [500, 600],'
              . '                "script" : {'
              . '                    "lang": "painless",'
              . '                    "source": "doc['load_time'].value / params.timeUnit", \<1>'
              . '                    "params" : {'
              . '                        "timeUnit" : 1000   \<2>'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  59bcc5d1ed0aac1aa949f84d80a4fa1d
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_59bcc5d1ed0aac1aa949f84d80a4fa1d()
    {
        $client = $this->getClient();
        // tag::59bcc5d1ed0aac1aa949f84d80a4fa1d[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_ranks" : {
        //             "percentile_ranks" : {
        //                 "values" : [500, 600],
        //                 "script" : {
        //                     "id": "my_script",
        //                     "params": {
        //                         "field": "load_time"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::59bcc5d1ed0aac1aa949f84d80a4fa1d[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_ranks" : {'
              . '            "percentile_ranks" : {'
              . '                "values" : [500, 600],'
              . '                "script" : {'
              . '                    "id": "my_script",'
              . '                    "params": {'
              . '                        "field": "load_time"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  214d704d18485ab75ef53aa9c0524590
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_214d704d18485ab75ef53aa9c0524590()
    {
        $client = $this->getClient();
        // tag::214d704d18485ab75ef53aa9c0524590[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_ranks" : {
        //             "percentile_ranks" : {
        //                 "field" : "load_time",
        //                 "values" : [500, 600],
        //                 "hdr": { \<1>
        //                   "number_of_significant_value_digits" : 3 \<2>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::214d704d18485ab75ef53aa9c0524590[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_ranks" : {'
              . '            "percentile_ranks" : {'
              . '                "field" : "load_time",'
              . '                "values" : [500, 600],'
              . '                "hdr": { \<1>'
              . '                  "number_of_significant_value_digits" : 3 \<2>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  77f575b0cc37dd7a2415cbf6417d3148
     * Line: 219
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL219_77f575b0cc37dd7a2415cbf6417d3148()
    {
        $client = $this->getClient();
        // tag::77f575b0cc37dd7a2415cbf6417d3148[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_ranks" : {
        //             "percentile_ranks" : {
        //                 "field" : "load_time",
        //                 "values" : [500, 600],
        //                 "missing": 10 \<1>
        //             }
        //         }
        //     }
        // }
        // end::77f575b0cc37dd7a2415cbf6417d3148[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_ranks" : {'
              . '            "percentile_ranks" : {'
              . '                "field" : "load_time",'
              . '                "values" : [500, 600],'
              . '                "missing": 10 \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
