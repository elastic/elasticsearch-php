<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateDatafeed
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/update-datafeed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateDatafeed extends SimpleExamplesTester {

    /**
     * Tag:  df6d5b5f8e1c8785503269ccb7b34763
     * Line: 105
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL105_df6d5b5f8e1c8785503269ccb7b34763()
    {
        $client = $this->getClient();
        // tag::df6d5b5f8e1c8785503269ccb7b34763[]
        // TODO -- Implement Example
        // POST _ml/datafeeds/datafeed-total-requests/_update
        // {
        //   "query": {
        //     "term": {
        //       "level": "error"
        //     }
        //   }
        // }
        // end::df6d5b5f8e1c8785503269ccb7b34763[]

        $curl = 'POST _ml/datafeeds/datafeed-total-requests/_update'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "level": "error"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
