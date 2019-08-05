<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Data-frames\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PreviewTransform
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   data-frames/apis/preview-transform.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PreviewTransform extends SimpleExamplesTester {

    /**
     * Tag:  681a67458b6ee3b0ec96ca017c363770
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_681a67458b6ee3b0ec96ca017c363770()
    {
        $client = $this->getClient();
        // tag::681a67458b6ee3b0ec96ca017c363770[]
        // TODO -- Implement Example
        // POST _data_frame/transforms/_preview
        // {
        //   "source": {
        //     "index": "kibana_sample_data_ecommerce"
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
        //   }
        // }
        // end::681a67458b6ee3b0ec96ca017c363770[]

        $curl = 'POST _data_frame/transforms/_preview'
              . '{'
              . '  "source": {'
              . '    "index": "kibana_sample_data_ecommerce"'
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
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
