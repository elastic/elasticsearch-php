<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Bucket;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AutodatehistogramAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/bucket/autodatehistogram-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AutodatehistogramAggregation extends SimpleExamplesTester {

    /**
     * Tag:  9f9123f67baff22429bca73f7cf48622
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_9f9123f67baff22429bca73f7cf48622()
    {
        $client = $this->getClient();
        // tag::9f9123f67baff22429bca73f7cf48622[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "auto_date_histogram" : {
        //                 "field" : "date",
        //                 "buckets" : 10
        //             }
        //         }
        //     }
        // }
        // end::9f9123f67baff22429bca73f7cf48622[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "auto_date_histogram" : {'
              . '                "field" : "date",'
              . '                "buckets" : 10'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  941466b290eaa9a2685bbe32c73e887a
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_941466b290eaa9a2685bbe32c73e887a()
    {
        $client = $this->getClient();
        // tag::941466b290eaa9a2685bbe32c73e887a[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sales_over_time" : {
        //             "auto_date_histogram" : {
        //                 "field" : "date",
        //                 "buckets" : 5,
        //                 "format" : "yyyy-MM-dd" \<1>
        //             }
        //         }
        //     }
        // }
        // end::941466b290eaa9a2685bbe32c73e887a[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sales_over_time" : {'
              . '            "auto_date_histogram" : {'
              . '                "field" : "date",'
              . '                "buckets" : 5,'
              . '                "format" : "yyyy-MM-dd" \<1>'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  64b6ca54baf9dba659887051de87440b
     * Line: 123
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL123_64b6ca54baf9dba659887051de87440b()
    {
        $client = $this->getClient();
        // tag::64b6ca54baf9dba659887051de87440b[]
        // TODO -- Implement Example
        // PUT my_index/log/1?refresh
        // {
        //   "date": "2015-10-01T00:30:00Z"
        // }
        // PUT my_index/log/2?refresh
        // {
        //   "date": "2015-10-01T01:30:00Z"
        // }
        // PUT my_index/log/3?refresh
        // {
        //   "date": "2015-10-01T02:30:00Z"
        // }
        // GET my_index/_search?size=0
        // {
        //   "aggs": {
        //     "by_day": {
        //       "auto_date_histogram": {
        //         "field":     "date",
        //         "buckets" : 3
        //       }
        //     }
        //   }
        // }
        // end::64b6ca54baf9dba659887051de87440b[]

        $curl = 'PUT my_index/log/1?refresh'
              . '{'
              . '  "date": "2015-10-01T00:30:00Z"'
              . '}'
              . 'PUT my_index/log/2?refresh'
              . '{'
              . '  "date": "2015-10-01T01:30:00Z"'
              . '}'
              . 'PUT my_index/log/3?refresh'
              . '{'
              . '  "date": "2015-10-01T02:30:00Z"'
              . '}'
              . 'GET my_index/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "by_day": {'
              . '      "auto_date_histogram": {'
              . '        "field":     "date",'
              . '        "buckets" : 3'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e16449c0f4eadb394761e9c2aff50fe6
     * Line: 190
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL190_e16449c0f4eadb394761e9c2aff50fe6()
    {
        $client = $this->getClient();
        // tag::e16449c0f4eadb394761e9c2aff50fe6[]
        // TODO -- Implement Example
        // GET my_index/_search?size=0
        // {
        //   "aggs": {
        //     "by_day": {
        //       "auto_date_histogram": {
        //         "field":     "date",
        //         "buckets" : 3,
        //         "time_zone": "-01:00"
        //       }
        //     }
        //   }
        // }
        // end::e16449c0f4eadb394761e9c2aff50fe6[]

        $curl = 'GET my_index/_search?size=0'
              . '{'
              . '  "aggs": {'
              . '    "by_day": {'
              . '      "auto_date_histogram": {'
              . '        "field":     "date",'
              . '        "buckets" : 3,'
              . '        "time_zone": "-01:00"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  00abcf63bffec42e5d2c15011e989b37
     * Line: 277
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL277_00abcf63bffec42e5d2c15011e989b37()
    {
        $client = $this->getClient();
        // tag::00abcf63bffec42e5d2c15011e989b37[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sale_date" : {
        //              "auto_date_histogram" : {
        //                  "field" : "date",
        //                  "buckets": 10,
        //                  "minimum_interval": "minute"
        //              }
        //          }
        //     }
        // }
        // end::00abcf63bffec42e5d2c15011e989b37[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sale_date" : {'
              . '             "auto_date_histogram" : {'
              . '                 "field" : "date",'
              . '                 "buckets": 10,'
              . '                 "minimum_interval": "minute"'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  89fe7b404791770a2075f2870fd65c3e
     * Line: 301
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL301_89fe7b404791770a2075f2870fd65c3e()
    {
        $client = $this->getClient();
        // tag::89fe7b404791770a2075f2870fd65c3e[]
        // TODO -- Implement Example
        // POST /sales/_search?size=0
        // {
        //     "aggs" : {
        //         "sale_date" : {
        //              "auto_date_histogram" : {
        //                  "field" : "date",
        //                  "buckets": 10,
        //                  "missing": "2000/01/01" \<1>
        //              }
        //          }
        //     }
        // }
        // end::89fe7b404791770a2075f2870fd65c3e[]

        $curl = 'POST /sales/_search?size=0'
              . '{'
              . '    "aggs" : {'
              . '        "sale_date" : {'
              . '             "auto_date_histogram" : {'
              . '                 "field" : "date",'
              . '                 "buckets": 10,'
              . '                 "missing": "2000/01/01" \<1>'
              . '             }'
              . '         }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
