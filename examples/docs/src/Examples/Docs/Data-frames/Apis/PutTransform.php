<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutTransform
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   data-frames/apis/put-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutTransform extends SimpleExamplesTester {

    /**
     * Tag:  6e2c969573581cc1c4ae83f59ef8d2f0
     * Line: 143
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL143_6e2c969573581cc1c4ae83f59ef8d2f0()
    {
        $client = $this->getClient();
        // tag::6e2c969573581cc1c4ae83f59ef8d2f0[]
        // TODO -- Implement Example
        // PUT _data_frame/transforms/ecommerce_transform
        // {
        //   "source": {
        //     "index": "kibana_sample_data_ecommerce",
        //     "query": {
        //       "term": {
        //         "geoip.continent_name": {
        //           "value": "Asia"
        //         }
        //       }
        //     }
        //   },
        //   "pivot": {
        //     "group_by": {
        //       "customer_id": {
        //         "terms": {
        //           "field": "customer_id"
        //         }
        //       }
        //     },
        //     "aggregations": {
        //       "max_price": {
        //         "max": {
        //           "field": "taxful_total_price"
        //         }
        //       }
        //     }
        //   },
        //   "description": "Maximum priced ecommerce data by customer_id in Asia",
        //   "dest": {
        //     "index": "kibana_sample_data_ecommerce_transform",
        //     "pipeline": "add_timestamp_pipeline"
        //   },
        //   "frequency": "5m",
        //   "sync": {
        //     "time": {
        //       "field": "order_date",
        //       "delay": "60s"
        //     }
        //   }
        // }
        // end::6e2c969573581cc1c4ae83f59ef8d2f0[]

        $curl = 'PUT _data_frame/transforms/ecommerce_transform'
              . '{'
              . '  "source": {'
              . '    "index": "kibana_sample_data_ecommerce",'
              . '    "query": {'
              . '      "term": {'
              . '        "geoip.continent_name": {'
              . '          "value": "Asia"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "pivot": {'
              . '    "group_by": {'
              . '      "customer_id": {'
              . '        "terms": {'
              . '          "field": "customer_id"'
              . '        }'
              . '      }'
              . '    },'
              . '    "aggregations": {'
              . '      "max_price": {'
              . '        "max": {'
              . '          "field": "taxful_total_price"'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "description": "Maximum priced ecommerce data by customer_id in Asia",'
              . '  "dest": {'
              . '    "index": "kibana_sample_data_ecommerce_transform",'
              . '    "pipeline": "add_timestamp_pipeline"'
              . '  },'
              . '  "frequency": "5m",'
              . '  "sync": {'
              . '    "time": {'
              . '      "field": "order_date",'
              . '      "delay": "60s"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
