<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SamplerAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/sampler-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SamplerAggregation extends SimpleExamplesTester {

    /**
     * Tag:  28035a0e2a874f1b6739badf82a0ecc6
     * Line: 19
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL19_28035a0e2a874f1b6739badf82a0ecc6()
    {
        $client = $this->getClient();
        // tag::28035a0e2a874f1b6739badf82a0ecc6[]
        // TODO -- Implement Example
        // POST /stackoverflow/_search?size=0
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "tags:kibana OR tags:javascript"
        //         }
        //     },
        //     "aggs": {
        //         "sample": {
        //             "sampler": {
        //                 "shard_size": 200
        //             },
        //             "aggs": {
        //                 "keywords": {
        //                     "significant_terms": {
        //                         "field": "tags",
        //                         "exclude": ["kibana", "javascript"]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::28035a0e2a874f1b6739badf82a0ecc6[]

        $curl = 'POST /stackoverflow/_search?size=0'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "tags:kibana OR tags:javascript"'
              . '        }'
              . '    },'
              . '    "aggs": {'
              . '        "sample": {'
              . '            "sampler": {'
              . '                "shard_size": 200'
              . '            },'
              . '            "aggs": {'
              . '                "keywords": {'
              . '                    "significant_terms": {'
              . '                        "field": "tags",'
              . '                        "exclude": ["kibana", "javascript"]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  279f7af39b62c7d278f9f10b1f107dc0
     * Line: 89
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL89_279f7af39b62c7d278f9f10b1f107dc0()
    {
        $client = $this->getClient();
        // tag::279f7af39b62c7d278f9f10b1f107dc0[]
        // TODO -- Implement Example
        // POST /stackoverflow/_search?size=0
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "tags:kibana OR tags:javascript"
        //         }
        //     },
        //     "aggs": {
        //              "low_quality_keywords": {
        //                 "significant_terms": {
        //                     "field": "tags",
        //                     "size": 3,
        //                     "exclude":["kibana", "javascript"]
        //                 }
        //         }
        //     }
        // }
        // end::279f7af39b62c7d278f9f10b1f107dc0[]

        $curl = 'POST /stackoverflow/_search?size=0'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "tags:kibana OR tags:javascript"'
              . '        }'
              . '    },'
              . '    "aggs": {'
              . '             "low_quality_keywords": {'
              . '                "significant_terms": {'
              . '                    "field": "tags",'
              . '                    "size": 3,'
              . '                    "exclude":["kibana", "javascript"]'
              . '                }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
