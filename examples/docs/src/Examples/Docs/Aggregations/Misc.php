<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Aggregations;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Misc
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   aggregations/misc.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Misc extends SimpleExamplesTester {

    /**
     * Tag:  0827fcf75228b6d0206a1ffe6bf7d263
     * Line: 19
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL19_0827fcf75228b6d0206a1ffe6bf7d263()
    {
        $client = $this->getClient();
        // tag::0827fcf75228b6d0206a1ffe6bf7d263[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //   "size": 0,
        //   "aggregations": {
        //     "my_agg": {
        //       "terms": {
        //         "field": "text"
        //       }
        //     }
        //   }
        // }
        // end::0827fcf75228b6d0206a1ffe6bf7d263[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggregations": {'
              . '    "my_agg": {'
              . '      "terms": {'
              . '        "field": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2d39331333f64fcc31fa298ac59b161f
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_2d39331333f64fcc31fa298ac59b161f()
    {
        $client = $this->getClient();
        // tag::2d39331333f64fcc31fa298ac59b161f[]
        // TODO -- Implement Example
        // GET /twitter/_search
        // {
        //   "size": 0,
        //   "aggs": {
        //     "titles": {
        //       "terms": {
        //         "field": "title"
        //       },
        //       "meta": {
        //         "color": "blue"
        //       }
        //     }
        //   }
        // }
        // end::2d39331333f64fcc31fa298ac59b161f[]

        $curl = 'GET /twitter/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "titles": {'
              . '      "terms": {'
              . '        "field": "title"'
              . '      },'
              . '      "meta": {'
              . '        "color": "blue"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ea447f43ebd5f72c65de699904474d0d
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_ea447f43ebd5f72c65de699904474d0d()
    {
        $client = $this->getClient();
        // tag::ea447f43ebd5f72c65de699904474d0d[]
        // TODO -- Implement Example
        // GET /twitter/_search?typed_keys
        // {
        //   "aggregations": {
        //     "tweets_over_time": {
        //       "date_histogram": {
        //         "field": "date",
        //         "calendar_interval": "year"
        //       },
        //       "aggregations": {
        //         "top_users": {
        //             "top_hits": {
        //                 "size": 1
        //             }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::ea447f43ebd5f72c65de699904474d0d[]

        $curl = 'GET /twitter/_search?typed_keys'
              . '{'
              . '  "aggregations": {'
              . '    "tweets_over_time": {'
              . '      "date_histogram": {'
              . '        "field": "date",'
              . '        "calendar_interval": "year"'
              . '      },'
              . '      "aggregations": {'
              . '        "top_users": {'
              . '            "top_hits": {'
              . '                "size": 1'
              . '            }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
