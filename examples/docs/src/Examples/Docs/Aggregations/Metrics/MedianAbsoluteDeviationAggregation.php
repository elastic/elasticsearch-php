<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations\Metrics;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MedianAbsoluteDeviationAggregation
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/metrics/median-absolute-deviation-aggregation.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MedianAbsoluteDeviationAggregation extends SimpleExamplesTester {

    /**
     * Tag:  25ed47fcb890fcf8d8518ae067362d18
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_25ed47fcb890fcf8d8518ae067362d18()
    {
        $client = $this->getClient();
        // tag::25ed47fcb890fcf8d8518ae067362d18[]
        // TODO -- Implement Example
        // GET reviews/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "review_average": {
        //       "avg": {
        //         "field": "rating"
        //       }
        //     },
        //     "review_variability": {
        //       "median_absolute_deviation": {
        //         "field": "rating" \<1>
        //       }
        //     }
        //   }
        // }
        // end::25ed47fcb890fcf8d8518ae067362d18[]

        $curl = 'GET reviews/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "review_average": {'
              . '      "avg": {'
              . '        "field": "rating"'
              . '      }'
              . '    },'
              . '    "review_variability": {'
              . '      "median_absolute_deviation": {'
              . '        "field": "rating" \<1>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9d662fc9f943c287b7144f5e4e2ae358
     * Line: 88
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL88_9d662fc9f943c287b7144f5e4e2ae358()
    {
        $client = $this->getClient();
        // tag::9d662fc9f943c287b7144f5e4e2ae358[]
        // TODO -- Implement Example
        // GET reviews/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "review_variability": {
        //       "median_absolute_deviation": {
        //         "field": "rating",
        //         "compression": 100
        //       }
        //     }
        //   }
        // }
        // end::9d662fc9f943c287b7144f5e4e2ae358[]

        $curl = 'GET reviews/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "review_variability": {'
              . '      "median_absolute_deviation": {'
              . '        "field": "rating",'
              . '        "compression": 100'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bb964122f7d31b2f17c299d47ab3bdf3
     * Line: 118
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL118_bb964122f7d31b2f17c299d47ab3bdf3()
    {
        $client = $this->getClient();
        // tag::bb964122f7d31b2f17c299d47ab3bdf3[]
        // TODO -- Implement Example
        // GET reviews/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "review_variability": {
        //       "median_absolute_deviation": {
        //         "script": {
        //           "lang": "painless",
        //           "source": "doc['rating'].value * params.scaleFactor",
        //           "params": {
        //             "scaleFactor": 2
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::bb964122f7d31b2f17c299d47ab3bdf3[]

        $curl = 'GET reviews/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "review_variability": {'
              . '      "median_absolute_deviation": {'
              . '        "script": {'
              . '          "lang": "painless",'
              . '          "source": "doc['rating'].value * params.scaleFactor",'
              . '          "params": {'
              . '            "scaleFactor": 2'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  920362adc347f4268b29751d638b2e87
     * Line: 143
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL143_920362adc347f4268b29751d638b2e87()
    {
        $client = $this->getClient();
        // tag::920362adc347f4268b29751d638b2e87[]
        // TODO -- Implement Example
        // GET reviews/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "review_variability": {
        //       "median_absolute_deviation": {
        //         "script": {
        //           "id": "my_script",
        //           "params": {
        //             "field": "rating"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::920362adc347f4268b29751d638b2e87[]

        $curl = 'GET reviews/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "review_variability": {'
              . '      "median_absolute_deviation": {'
              . '        "script": {'
              . '          "id": "my_script",'
              . '          "params": {'
              . '            "field": "rating"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  87f854393d715aabf4d45e90a8eb74ce
     * Line: 174
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL174_87f854393d715aabf4d45e90a8eb74ce()
    {
        $client = $this->getClient();
        // tag::87f854393d715aabf4d45e90a8eb74ce[]
        // TODO -- Implement Example
        // GET reviews/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "review_variability": {
        //       "median_absolute_deviation": {
        //         "field": "rating",
        //         "missing": 5
        //       }
        //     }
        //   }
        // }
        // end::87f854393d715aabf4d45e90a8eb74ce[]

        $curl = 'GET reviews/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "review_variability": {'
              . '      "median_absolute_deviation": {'
              . '        "field": "rating",'
              . '        "missing": 5'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
