<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Df-analytics\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Dfanalyticsresources
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/df-analytics/apis/dfanalyticsresources.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Dfanalyticsresources extends SimpleExamplesTester {

    /**
     * Tag:  7b8afc2612fb2cdf2263cff1dead852c
     * Line: 23
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL23_7b8afc2612fb2cdf2263cff1dead852c()
    {
        $client = $this->getClient();
        // tag::7b8afc2612fb2cdf2263cff1dead852c[]
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
        //   },
        //   "analyzed_fields": {
        //         "includes": [ "request.bytes", "response.counts.error" ],
        //         "excludes": [ "source.geo" ]
        //   }
        // }
        // end::7b8afc2612fb2cdf2263cff1dead852c[]

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
              . '  },'
              . '  "analyzed_fields": {'
              . '        "includes": [ "request.bytes", "response.counts.error" ],'
              . '        "excludes": [ "source.geo" ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
