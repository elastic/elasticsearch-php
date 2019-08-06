<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DiversifiedSamplerAggregation
 *
 * Date: 2019-08-06 06:56:02
 *
 * @source   aggregations/bucket/diversified-sampler-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DiversifiedSamplerAggregation extends SimpleExamplesTester {

    /**
     * Tag:  3344c3478f1e8bbbef683757638a34f4
     * Line: 30
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL30_3344c3478f1e8bbbef683757638a34f4()
    {
        $client = $this->getClient();
        // tag::3344c3478f1e8bbbef683757638a34f4[]
        // TODO -- Implement Example
        // POST /stackoverflow/_search?size=0
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "tags:elasticsearch"
        //         }
        //     },
        //     "aggs": {
        //         "my_unbiased_sample": {
        //             "diversified_sampler": {
        //                 "shard_size": 200,
        //                 "field" : "author"
        //             },
        //             "aggs": {
        //                 "keywords": {
        //                     "significant_terms": {
        //                         "field": "tags",
        //                         "exclude": ["elasticsearch"]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::3344c3478f1e8bbbef683757638a34f4[]

        $curl = 'POST /stackoverflow/_search?size=0'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "tags:elasticsearch"'
              . '        }'
              . '    },'
              . '    "aggs": {'
              . '        "my_unbiased_sample": {'
              . '            "diversified_sampler": {'
              . '                "shard_size": 200,'
              . '                "field" : "author"'
              . '            },'
              . '            "aggs": {'
              . '                "keywords": {'
              . '                    "significant_terms": {'
              . '                        "field": "tags",'
              . '                        "exclude": ["elasticsearch"]'
              . '                    }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  07afce825c09de17a3d73a02b17a0a97
     * Line: 96
     * Date: 2019-08-06 06:56:02
     */
    public function testExampleL96_07afce825c09de17a3d73a02b17a0a97()
    {
        $client = $this->getClient();
        // tag::07afce825c09de17a3d73a02b17a0a97[]
        // TODO -- Implement Example
        // POST /stackoverflow/_search?size=0
        // {
        //     "query": {
        //         "query_string": {
        //             "query": "tags:kibana"
        //         }
        //     },
        //     "aggs": {
        //         "my_unbiased_sample": {
        //             "diversified_sampler": {
        //                 "shard_size": 200,
        //                 "max_docs_per_value" : 3,
        //                 "script" : {
        //                     "lang": "painless",
        //                     "source": "doc[\'tags\'].hashCode()"
        //                 }
        //             },
        //             "aggs": {
        //                 "keywords": {
        //                     "significant_terms": {
        //                         "field": "tags",
        //                         "exclude": ["kibana"]
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::07afce825c09de17a3d73a02b17a0a97[]

        $curl = 'POST /stackoverflow/_search?size=0'
              . '{'
              . '    "query": {'
              . '        "query_string": {'
              . '            "query": "tags:kibana"'
              . '        }'
              . '    },'
              . '    "aggs": {'
              . '        "my_unbiased_sample": {'
              . '            "diversified_sampler": {'
              . '                "shard_size": 200,'
              . '                "max_docs_per_value" : 3,'
              . '                "script" : {'
              . '                    "lang": "painless",'
              . '                    "source": "doc[\'tags\'].hashCode()"'
              . '                }'
              . '            },'
              . '            "aggs": {'
              . '                "keywords": {'
              . '                    "significant_terms": {'
              . '                        "field": "tags",'
              . '                        "exclude": ["kibana"]'
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
