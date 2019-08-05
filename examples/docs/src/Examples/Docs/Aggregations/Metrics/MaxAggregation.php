<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MaxAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/max-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MaxAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9498a707be49e14dad801db6b6824e34
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_9498a707be49e14dad801db6b6824e34()
    {
        $client = $this->getClient();
        // tag::9498a707be49e14dad801db6b6824e34[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "max_price" : { "max" : { "field" : "price" } }
        //     }
        // }
        // end::9498a707be49e14dad801db6b6824e34[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "max_price" : { "max" : { "field" : "price" } }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  736fc5448b66962ceef1e6d5948ef691
     * Line: 52
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL52_736fc5448b66962ceef1e6d5948ef691()
    {
        $client = $this->getClient();
        // tag::736fc5448b66962ceef1e6d5948ef691[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "max_price" : {
        //             "max" : {
        //                 "script" : {
        //                     "source" : "doc.price.value"
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::736fc5448b66962ceef1e6d5948ef691[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "max_price" : {'
              . '            "max" : {'
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
     * Tag:  b5e782e309a2a10db272414e8483d8dc
     * Line: 73
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL73_b5e782e309a2a10db272414e8483d8dc()
    {
        $client = $this->getClient();
        // tag::b5e782e309a2a10db272414e8483d8dc[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "max_price" : {
        //             "max" : {
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
        // end::b5e782e309a2a10db272414e8483d8dc[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "max_price" : {'
              . '            "max" : {'
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
     * Tag:  23fdba37454d6d7abf6bfbb4fd01692f
     * Line: 101
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL101_23fdba37454d6d7abf6bfbb4fd01692f()
    {
        $client = $this->getClient();
        // tag::23fdba37454d6d7abf6bfbb4fd01692f[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "max_price_in_euros" : {
        //             "max" : {
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
        // end::23fdba37454d6d7abf6bfbb4fd01692f[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "max_price_in_euros" : {'
              . '            "max" : {'
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
     * Tag:  41518c094db4a5b03cca3b21497f79cf
     * Line: 129
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL129_41518c094db4a5b03cca3b21497f79cf()
    {
        $client = $this->getClient();
        // tag::41518c094db4a5b03cca3b21497f79cf[]
        // TODO -- Implement Example
        // POST /sales/_search
        // {
        //     "aggs" : {
        //         "grade_max" : {
        //             "max" : {
        //                 "field" : "grade",
        //                 "missing": 10 \<1>
        //             }
        //         }
        //     }
        // }
        // end::41518c094db4a5b03cca3b21497f79cf[]

        $curl = 'POST /sales/_search'
              . '{'
              . '    "aggs" : {'
              . '        "grade_max" : {'
              . '            "max" : {'
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
