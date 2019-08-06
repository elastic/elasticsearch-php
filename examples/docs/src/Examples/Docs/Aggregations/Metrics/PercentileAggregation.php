<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PercentileAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/metrics/percentile-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PercentileAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9baaa0c37e787738507aceee7626c88b
     * Line: 28
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL28_9baaa0c37e787738507aceee7626c88b()
    {
        $client = $this->getClient();
        // tag::9baaa0c37e787738507aceee7626c88b[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
        //                 "field" : "load_time" \<1>
        //             }
        //         }
        //     }
        // }
        // end::9baaa0c37e787738507aceee7626c88b[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
              . '                "field" : "load_time" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4273ecf0448faf65b16952ada3d48a30
     * Line: 80
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL80_4273ecf0448faf65b16952ada3d48a30()
    {
        $client = $this->getClient();
        // tag::4273ecf0448faf65b16952ada3d48a30[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
        //                 "field" : "load_time",
        //                 "percents" : [95, 99, 99.9] \<1>
        //             }
        //         }
        //     }
        // }
        // end::4273ecf0448faf65b16952ada3d48a30[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
              . '                "field" : "load_time",'
              . '                "percents" : [95, 99, 99.9] \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e6f49e5325fe0e9b816a837bd3e65a7c
     * Line: 103
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL103_e6f49e5325fe0e9b816a837bd3e65a7c()
    {
        $client = $this->getClient();
        // tag::e6f49e5325fe0e9b816a837bd3e65a7c[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "load_time_outlier": {
        //             "percentiles": {
        //                 "field": "load_time",
        //                 "keyed": false
        //             }
        //         }
        //     }
        // }
        // end::e6f49e5325fe0e9b816a837bd3e65a7c[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "load_time_outlier": {'
              . '            "percentiles": {'
              . '                "field": "load_time",'
              . '                "keyed": false'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  823b97820ce96abcc3a9292d14292849
     * Line: 172
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL172_823b97820ce96abcc3a9292d14292849()
    {
        $client = $this->getClient();
        // tag::823b97820ce96abcc3a9292d14292849[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
        //                 "script" : {
        //                     "lang": "painless",
        //                     "source": "doc[\'load_time\'].value / params.timeUnit", \<1>
        //                     "params" : {
        //                         "timeUnit" : 1000   \<2>
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::823b97820ce96abcc3a9292d14292849[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
              . '                "script" : {'
              . '                    "lang": "painless",'
              . '                    "source": "doc[\'load_time\'].value / params.timeUnit", \<1>'
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
     * Tag:  dae483a5a412dcf4c20161fea25a87ba
     * Line: 201
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL201_dae483a5a412dcf4c20161fea25a87ba()
    {
        $client = $this->getClient();
        // tag::dae483a5a412dcf4c20161fea25a87ba[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
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
        // end::dae483a5a412dcf4c20161fea25a87ba[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
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
     * Tag:  829d345e5e15e371aeb820f4d62a1b2a
     * Line: 266
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL266_829d345e5e15e371aeb820f4d62a1b2a()
    {
        $client = $this->getClient();
        // tag::829d345e5e15e371aeb820f4d62a1b2a[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
        //                 "field" : "load_time",
        //                 "tdigest": {
        //                   "compression" : 200 \<1>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::829d345e5e15e371aeb820f4d62a1b2a[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
              . '                "field" : "load_time",'
              . '                "tdigest": {'
              . '                  "compression" : 200 \<1>'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  db17a10cf64c84bd2fc4ebb073e59cec
     * Line: 317
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL317_db17a10cf64c84bd2fc4ebb073e59cec()
    {
        $client = $this->getClient();
        // tag::db17a10cf64c84bd2fc4ebb073e59cec[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "load_time_outlier" : {
        //             "percentiles" : {
        //                 "field" : "load_time",
        //                 "percents" : [95, 99, 99.9],
        //                 "hdr": { \<1>
        //                   "number_of_significant_value_digits" : 3 \<2>
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::db17a10cf64c84bd2fc4ebb073e59cec[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "load_time_outlier" : {'
              . '            "percentiles" : {'
              . '                "field" : "load_time",'
              . '                "percents" : [95, 99, 99.9],'
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
     * Tag:  e557ce02e192939944ebc6bae87e98a6
     * Line: 350
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL350_e557ce02e192939944ebc6bae87e98a6()
    {
        $client = $this->getClient();
        // tag::e557ce02e192939944ebc6bae87e98a6[]
        // TODO -- Implement Example
        // GET latency/_search
        // {
        //     "size": 0,
        //     "aggs" : {
        //         "grade_percentiles" : {
        //             "percentiles" : {
        //                 "field" : "grade",
        //                 "missing": 10 \<1>
        //             }
        //         }
        //     }
        // }
        // end::e557ce02e192939944ebc6bae87e98a6[]

        $curl = 'GET latency/_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs" : {'
              . '        "grade_percentiles" : {'
              . '            "percentiles" : {'
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
