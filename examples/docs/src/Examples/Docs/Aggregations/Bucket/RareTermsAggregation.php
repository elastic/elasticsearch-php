<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RareTermsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/rare-terms-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RareTermsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  91bbb85bc6add315fc9a044d8bcfec8a
     * Line: 89
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL89_91bbb85bc6add315fc9a044d8bcfec8a()
    {
        $client = $this->getClient();
        // tag::91bbb85bc6add315fc9a044d8bcfec8a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "rare_terms" : {
        //                 "field" : "genre"
        //             }
        //         }
        //     }
        // }
        // end::91bbb85bc6add315fc9a044d8bcfec8a[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "rare_terms" : {'
              . '                "field" : "genre"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0fa84243cd275a885298602aa8b4415f
     * Line: 128
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL128_0fa84243cd275a885298602aa8b4415f()
    {
        $client = $this->getClient();
        // tag::0fa84243cd275a885298602aa8b4415f[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "rare_terms" : {
        //                 "field" : "genre",
        //                 "max_doc_count": 2
        //             }
        //         }
        //     }
        // }
        // end::0fa84243cd275a885298602aa8b4415f[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "rare_terms" : {'
              . '                "field" : "genre",'
              . '                "max_doc_count": 2'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b7207f557d5481db52d5df1aa0dae982
     * Line: 279
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL279_b7207f557d5481db52d5df1aa0dae982()
    {
        $client = $this->getClient();
        // tag::b7207f557d5481db52d5df1aa0dae982[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //             "rare_terms" : {
        //                 "field" : "genre",
        //                 "include" : "swi*",
        //                 "exclude" : "electro*"
        //             }
        //         }
        //     }
        // }
        // end::b7207f557d5481db52d5df1aa0dae982[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '            "rare_terms" : {'
              . '                "field" : "genre",'
              . '                "include" : "swi*",'
              . '                "exclude" : "electro*"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  dea7ef16acd6d148a20876630a010522
     * Line: 308
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL308_dea7ef16acd6d148a20876630a010522()
    {
        $client = $this->getClient();
        // tag::dea7ef16acd6d148a20876630a010522[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //              "rare_terms" : {
        //                  "field" : "genre",
        //                  "include" : ["swing", "rock"],
        //                  "exclude" : ["jazz"]
        //              }
        //          }
        //     }
        // }
        // end::dea7ef16acd6d148a20876630a010522[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '             "rare_terms" : {'
              . '                 "field" : "genre",'
              . '                 "include" : ["swing", "rock"],'
              . '                 "exclude" : ["jazz"]'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2eea6157a9fbc54a8987e5c1a4f14bbe
     * Line: 332
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL332_2eea6157a9fbc54a8987e5c1a4f14bbe()
    {
        $client = $this->getClient();
        // tag::2eea6157a9fbc54a8987e5c1a4f14bbe[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "genres" : {
        //              "rare_terms" : {
        //                  "field" : "genre",
        //                  "missing": "N/A" \<1>
        //              }
        //          }
        //     }
        // }
        // end::2eea6157a9fbc54a8987e5c1a4f14bbe[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "genres" : {'
              . '             "rare_terms" : {'
              . '                 "field" : "genre",'
              . '                 "missing": "N/A" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
