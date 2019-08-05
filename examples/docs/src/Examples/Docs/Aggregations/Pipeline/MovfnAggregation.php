<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Pipeline;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MovfnAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/pipeline/movfn-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MovfnAggregation extends SimpleExamplesTester {

    /**
     * Tag:  5903a75a28cec4b60c54662457c6d405
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_5903a75a28cec4b60c54662457c6d405()
    {
        $client = $this->getClient();
        // tag::5903a75a28cec4b60c54662457c6d405[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{                \<1>
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" } \<2>
        //                 },
        //                 "the_movfn": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum", \<3>
        //                         "window": 10,
        //                         "script": "MovingFunctions.unweightedAvg(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::5903a75a28cec4b60c54662457c6d405[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{                \<1>'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" } \<2>'
              . '                },'
              . '                "the_movfn": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum", \<3>'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.unweightedAvg(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  93c9711ee6c0554cd775c013c3837f13
     * Line: 143
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL143_93c9711ee6c0554cd775c013c3837f13()
    {
        $client = $this->getClient();
        // tag::93c9711ee6c0554cd775c013c3837f13[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "return values.length > 0 ? values[0] : Double.NaN"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::93c9711ee6c0554cd775c013c3837f13[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "return values.length > 0 ? values[0] : Double.NaN"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  13fd394e3e9a3398cac21ac1064fc154
     * Line: 202
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL202_13fd394e3e9a3398cac21ac1064fc154()
    {
        $client = $this->getClient();
        // tag::13fd394e3e9a3398cac21ac1064fc154[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_moving_max": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.max(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::13fd394e3e9a3398cac21ac1064fc154[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_moving_max": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.max(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c8bebf3c45fc9e75e161bf4e516a957a
     * Line: 245
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL245_c8bebf3c45fc9e75e161bf4e516a957a()
    {
        $client = $this->getClient();
        // tag::c8bebf3c45fc9e75e161bf4e516a957a[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_moving_min": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.min(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::c8bebf3c45fc9e75e161bf4e516a957a[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_moving_min": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.min(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d0897840a5702b4ec0616e6c90acfe1e
     * Line: 288
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL288_d0897840a5702b4ec0616e6c90acfe1e()
    {
        $client = $this->getClient();
        // tag::d0897840a5702b4ec0616e6c90acfe1e[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_moving_sum": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.sum(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::d0897840a5702b4ec0616e6c90acfe1e[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_moving_sum": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.sum(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  46c4d95fc06cd0eb0401caa1e0bdc8f0
     * Line: 333
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL333_46c4d95fc06cd0eb0401caa1e0bdc8f0()
    {
        $client = $this->getClient();
        // tag::46c4d95fc06cd0eb0401caa1e0bdc8f0[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_moving_sum": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.stdDev(values, MovingFunctions.unweightedAvg(values))"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::46c4d95fc06cd0eb0401caa1e0bdc8f0[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_moving_sum": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.stdDev(values, MovingFunctions.unweightedAvg(values))"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  beea9d59a7cbe53d5d4c4ec2a49487b2
     * Line: 385
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL385_beea9d59a7cbe53d5d4c4ec2a49487b2()
    {
        $client = $this->getClient();
        // tag::beea9d59a7cbe53d5d4c4ec2a49487b2[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.unweightedAvg(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::beea9d59a7cbe53d5d4c4ec2a49487b2[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.unweightedAvg(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bbbbe980b6dcd2a77ff16cc8a081e472
     * Line: 431
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL431_bbbbe980b6dcd2a77ff16cc8a081e472()
    {
        $client = $this->getClient();
        // tag::bbbbe980b6dcd2a77ff16cc8a081e472[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.linearWeightedAvg(values)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::bbbbe980b6dcd2a77ff16cc8a081e472[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.linearWeightedAvg(values)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d84ea140bbe8abfb156a72c1c963ea00
     * Line: 483
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL483_d84ea140bbe8abfb156a72c1c963ea00()
    {
        $client = $this->getClient();
        // tag::d84ea140bbe8abfb156a72c1c963ea00[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.ewma(values, 0.3)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::d84ea140bbe8abfb156a72c1c963ea00[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.ewma(values, 0.3)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  76fc9f5a879772ffcc4ec0c99bf74277
     * Line: 541
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL541_76fc9f5a879772ffcc4ec0c99bf74277()
    {
        $client = $this->getClient();
        // tag::76fc9f5a879772ffcc4ec0c99bf74277[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "MovingFunctions.holt(values, 0.3, 0.1)"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::76fc9f5a879772ffcc4ec0c99bf74277[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "MovingFunctions.holt(values, 0.3, 0.1)"'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  af25b173c8bcc73a3bfbfddacb218478
     * Line: 607
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL607_af25b173c8bcc73a3bfbfddacb218478()
    {
        $client = $this->getClient();
        // tag::af25b173c8bcc73a3bfbfddacb218478[]
        // TODO -- Implement Example
        // POST /_search
        // {
        //     "size": 0,
        //     "aggs": {
        //         "my_date_histo":{
        //             "date_histogram":{
        //                 "field":"date",
        //                 "calendar_interval":"1M"
        //             },
        //             "aggs":{
        //                 "the_sum":{
        //                     "sum":{ "field": "price" }
        //                 },
        //                 "the_movavg": {
        //                     "moving_fn": {
        //                         "buckets_path": "the_sum",
        //                         "window": 10,
        //                         "script": "if (values.length > 5*2) {MovingFunctions.holtWinters(values, 0.3, 0.1, 0.1, 5, false)}"
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::af25b173c8bcc73a3bfbfddacb218478[]

        $curl = 'POST /_search'
              . '{'
              . '    "size": 0,'
              . '    "aggs": {'
              . '        "my_date_histo":{'
              . '            "date_histogram":{'
              . '                "field":"date",'
              . '                "calendar_interval":"1M"'
              . '            },'
              . '            "aggs":{'
              . '                "the_sum":{'
              . '                    "sum":{ "field": "price" }'
              . '                },'
              . '                "the_movavg": {'
              . '                    "moving_fn": {'
              . '                        "buckets_path": "the_sum",'
              . '                        "window": 10,'
              . '                        "script": "if (values.length > 5*2) {MovingFunctions.holtWinters(values, 0.3, 0.1, 0.1, 5, false)}"'
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
