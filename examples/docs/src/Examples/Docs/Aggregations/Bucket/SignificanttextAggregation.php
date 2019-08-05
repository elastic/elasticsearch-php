<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SignificanttextAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/significanttext-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SignificanttextAggregation extends SimpleExamplesTester {

    /**
     * Tag:  68f0c7c77b65bfdded348bbd397831b7
     * Line: 36
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL36_68f0c7c77b65bfdded348bbd397831b7()
    {
        $client = $this->getClient();
        // tag::68f0c7c77b65bfdded348bbd397831b7[]
        // TODO -- Implement Example
        // GET news/_search
        // {
        //     "query" : {
        //         "match" : {"content" : "Bird flu"}
        //     },
        //     "aggregations" : {
        //         "my_sample" : {
        //             "sampler" : {
        //                 "shard_size" : 100
        //             },
        //             "aggregations": {
        //                 "keywords" : {
        //                     "significant_text" : { "field" : "content" }
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::68f0c7c77b65bfdded348bbd397831b7[]

        $curl = 'GET news/_search'
              . '{'
              . '    "query" : {'
              . '        "match" : {"content" : "Bird flu"}'
              . '    },'
              . '    "aggregations" : {'
              . '        "my_sample" : {'
              . '            "sampler" : {'
              . '                "shard_size" : 100'
              . '            },'
              . '            "aggregations": {'
              . '                "keywords" : {'
              . '                    "significant_text" : { "field" : "content" }'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d44ecc69090c0b2bc08a6cbc2e3467c5
     * Line: 151
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL151_d44ecc69090c0b2bc08a6cbc2e3467c5()
    {
        $client = $this->getClient();
        // tag::d44ecc69090c0b2bc08a6cbc2e3467c5[]
        // TODO -- Implement Example
        // GET news/_search
        // {
        //   "query": {
        //     "simple_query_string": {
        //       "query": "+elasticsearch  +pozmantier"
        //     }
        //   },
        //   "_source": [
        //     "title",
        //     "source"
        //   ],
        //   "highlight": {
        //     "fields": {
        //       "content": {}
        //     }
        //   }
        // }
        // end::d44ecc69090c0b2bc08a6cbc2e3467c5[]

        $curl = 'GET news/_search'
              . '{'
              . '  "query": {'
              . '    "simple_query_string": {'
              . '      "query": "+elasticsearch  +pozmantier"'
              . '    }'
              . '  },'
              . '  "_source": ['
              . '    "title",'
              . '    "source"'
              . '  ],'
              . '  "highlight": {'
              . '    "fields": {'
              . '      "content": {}'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  805f5550b90e75aa5cc82b90d8c6c242
     * Line: 219
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL219_805f5550b90e75aa5cc82b90d8c6c242()
    {
        $client = $this->getClient();
        // tag::805f5550b90e75aa5cc82b90d8c6c242[]
        // TODO -- Implement Example
        // GET news/_search
        // {
        //   "query": {
        //     "match": {
        //       "content": "elasticsearch"
        //     }
        //   },
        //   "aggs": {
        //     "sample": {
        //       "sampler": {
        //         "shard_size": 100
        //       },
        //       "aggs": {
        //         "keywords": {
        //           "significant_text": {
        //             "field": "content",
        //             "filter_duplicate_text": true
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::805f5550b90e75aa5cc82b90d8c6c242[]

        $curl = 'GET news/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "content": "elasticsearch"'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "sample": {'
              . '      "sampler": {'
              . '        "shard_size": 100'
              . '      },'
              . '      "aggs": {'
              . '        "keywords": {'
              . '          "significant_text": {'
              . '            "field": "content",'
              . '            "filter_duplicate_text": true'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5f4cab20671ebac9233812f9e35d9c8b
     * Line: 422
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL422_5f4cab20671ebac9233812f9e35d9c8b()
    {
        $client = $this->getClient();
        // tag::5f4cab20671ebac9233812f9e35d9c8b[]
        // TODO -- Implement Example
        // GET news/_search
        // {
        //     "query" : {
        //         "match" : {
        //             "content" : "madrid"
        //         }
        //     },
        //     "aggs" : {
        //         "tags" : {
        //             "significant_text" : {
        //                 "field" : "content",
        //                 "background_filter": {
        //                     "term" : { "content" : "spain"}
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::5f4cab20671ebac9233812f9e35d9c8b[]

        $curl = 'GET news/_search'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "content" : "madrid"'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "significant_text" : {'
              . '                "field" : "content",'
              . '                "background_filter": {'
              . '                    "term" : { "content" : "spain"}'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b3e6d6f7f6d65d1efb60ca7503a20b16
     * Line: 461
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL461_b3e6d6f7f6d65d1efb60ca7503a20b16()
    {
        $client = $this->getClient();
        // tag::b3e6d6f7f6d65d1efb60ca7503a20b16[]
        // TODO -- Implement Example
        // GET news/_search
        // {
        //     "query" : {
        //         "match" : {
        //             "custom_all" : "elasticsearch"
        //         }
        //     },
        //     "aggs" : {
        //         "tags" : {
        //             "significant_text" : {
        //                 "field" : "custom_all",
        //                 "source_fields": ["content" , "title"]
        //             }
        //         }
        //     }
        // }
        // end::b3e6d6f7f6d65d1efb60ca7503a20b16[]

        $curl = 'GET news/_search'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "custom_all" : "elasticsearch"'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "significant_text" : {'
              . '                "field" : "custom_all",'
              . '                "source_fields": ["content" , "title"]'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
