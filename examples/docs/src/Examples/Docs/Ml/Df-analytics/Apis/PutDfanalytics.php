<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutDfanalytics
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/df-analytics/apis/put-dfanalytics.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutDfanalytics extends SimpleExamplesTester {

    /**
     * Tag:  80877b0ab3babd4f623becbe73c447fb
     * Line: 94
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL94_80877b0ab3babd4f623becbe73c447fb()
    {
        $client = $this->getClient();
        // tag::80877b0ab3babd4f623becbe73c447fb[]
        // TODO -- Implement Example
        // PUT _ml/data_frame/analytics/loganalytics
        // {
        //   "source": {
        //     "index": "logdata"
        //   },
        //   "dest": {
        //     "index": "logdata_out"
        //   },
        //   "analysis": {
        //     "outlier_detection": {
        //     }
        //   }
        // }
        // end::80877b0ab3babd4f623becbe73c447fb[]

        $curl = 'PUT _ml/data_frame/analytics/loganalytics'
              . '{'
              . '  "source": {'
              . '    "index": "logdata"'
              . '  },'
              . '  "dest": {'
              . '    "index": "logdata_out"'
              . '  },'
              . '  "analysis": {'
              . '    "outlier_detection": {'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
