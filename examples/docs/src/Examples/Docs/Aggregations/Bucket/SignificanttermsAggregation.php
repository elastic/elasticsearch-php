<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SignificanttermsAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/significantterms-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SignificanttermsAggregation extends SimpleExamplesTester {

    /**
     * Tag:  290b845e59368e8aa8d1a56d7379afd0
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_290b845e59368e8aa8d1a56d7379afd0()
    {
        $client = $this->getClient();
        // tag::290b845e59368e8aa8d1a56d7379afd0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "terms" : {"force" : [ "British Transport Police" ]}
        //     },
        //     "aggregations" : {
        //         "significant_crime_types" : {
        //             "significant_terms" : { "field" : "crime_type" }
        //         }
        //     }
        // }
        // end::290b845e59368e8aa8d1a56d7379afd0[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "terms" : {"force" : [ "British Transport Police" ]}'
              . '    },'
              . '    "aggregations" : {'
              . '        "significant_crime_types" : {'
              . '            "significant_terms" : { "field" : "crime_type" }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b2af9784f8530a363ac6e9f95b39677d
     * Line: 129
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL129_b2af9784f8530a363ac6e9f95b39677d()
    {
        $client = $this->getClient();
        // tag::b2af9784f8530a363ac6e9f95b39677d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggregations": {
        //         "forces": {
        //             "terms": {"field": "force"},
        //             "aggregations": {
        //                 "significant_crime_types": {
        //                     "significant_terms": {"field": "crime_type"}
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::b2af9784f8530a363ac6e9f95b39677d[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggregations": {'
              . '        "forces": {'
              . '            "terms": {"field": "force"},'
              . '            "aggregations": {'
              . '                "significant_crime_types": {'
              . '                    "significant_terms": {"field": "crime_type"}'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0868d8ac2fb5351e633184f897ee6866
     * Line: 207
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL207_0868d8ac2fb5351e633184f897ee6866()
    {
        $client = $this->getClient();
        // tag::0868d8ac2fb5351e633184f897ee6866[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs": {
        //         "hotspots": {
        //             "geohash_grid": {
        //                 "field": "location",
        //                 "precision": 5
        //             },
        //             "aggs": {
        //                 "significant_crime_types": {
        //                     "significant_terms": {"field": "crime_type"}
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::0868d8ac2fb5351e633184f897ee6866[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs": {'
              . '        "hotspots": {'
              . '            "geohash_grid": {'
              . '                "field": "location",'
              . '                "precision": 5'
              . '            },'
              . '            "aggs": {'
              . '                "significant_crime_types": {'
              . '                    "significant_terms": {"field": "crime_type"}'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  09d4a753140ee5a9ab9f4fc09047b588
     * Line: 468
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL468_09d4a753140ee5a9ab9f4fc09047b588()
    {
        $client = $this->getClient();
        // tag::09d4a753140ee5a9ab9f4fc09047b588[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //             "significant_terms" : {
        //                 "field" : "tag",
        //                 "min_doc_count": 10
        //             }
        //         }
        //     }
        // }
        // end::09d4a753140ee5a9ab9f4fc09047b588[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "significant_terms" : {'
              . '                "field" : "tag",'
              . '                "min_doc_count": 10'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3fdaac87eb741a79f747633b5065323a
     * Line: 511
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL511_3fdaac87eb741a79f747633b5065323a()
    {
        $client = $this->getClient();
        // tag::3fdaac87eb741a79f747633b5065323a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "query" : {
        //         "match" : {
        //             "city" : "madrid"
        //         }
        //     },
        //     "aggs" : {
        //         "tags" : {
        //             "significant_terms" : {
        //                 "field" : "tag",
        //                 "background_filter": {
        //                 	"term" : { "text" : "spain"}
        //                 }
        //             }
        //         }
        //     }
        // }
        // end::3fdaac87eb741a79f747633b5065323a[]

        $curl = 'GET /_search'
              . '{'
              . '    "query" : {'
              . '        "match" : {'
              . '            "city" : "madrid"'
              . '        }'
              . '    },'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '            "significant_terms" : {'
              . '                "field" : "tag",'
              . '                "background_filter": {'
              . '                	"term" : { "text" : "spain"}'
              . '                }'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  11a21cd0b9d31da7eda77c9384a29208
     * Line: 570
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL570_11a21cd0b9d31da7eda77c9384a29208()
    {
        $client = $this->getClient();
        // tag::11a21cd0b9d31da7eda77c9384a29208[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //     "aggs" : {
        //         "tags" : {
        //              "significant_terms" : {
        //                  "field" : "tags",
        //                  "execution_hint": "map" \<1>
        //              }
        //          }
        //     }
        // }
        // end::11a21cd0b9d31da7eda77c9384a29208[]

        $curl = 'GET /_search'
              . '{'
              . '    "aggs" : {'
              . '        "tags" : {'
              . '             "significant_terms" : {'
              . '                 "field" : "tags",'
              . '                 "execution_hint": "map" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
