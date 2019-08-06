<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateJob
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/update-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateJob extends SimpleExamplesTester {

    /**
     * Tag:  d51232b6f1be5730519ca7733b3232df
     * Line: 105
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL105_d51232b6f1be5730519ca7733b3232df()
    {
        $client = $this->getClient();
        // tag::d51232b6f1be5730519ca7733b3232df[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/total-requests/_update
        // {
        //   "description":"An updated job",
        //   "groups": ["group1","group2"],
        //   "model_plot_config": {
        //     "enabled": true
        //   },
        //   "analysis_limits": {
        //     "model_memory_limit": "1024mb"
        //   },
        //   "renormalization_window_days": 30,
        //   "background_persist_interval": "2h",
        //   "model_snapshot_retention_days": 7,
        //   "results_retention_days": 60,
        //   "custom_settings": {
        //     "custom_urls" : [{
        //       "url_name" : "Lookup IP",
        //       "url_value" : "http://geoiplookup.net/ip/$clientip$"
        //     }]
        //   }
        // }
        // end::d51232b6f1be5730519ca7733b3232df[]

        $curl = 'POST _ml/anomaly_detectors/total-requests/_update'
              . '{'
              . '  "description":"An updated job",'
              . '  "groups": ["group1","group2"],'
              . '  "model_plot_config": {'
              . '    "enabled": true'
              . '  },'
              . '  "analysis_limits": {'
              . '    "model_memory_limit": "1024mb"'
              . '  },'
              . '  "renormalization_window_days": 30,'
              . '  "background_persist_interval": "2h",'
              . '  "model_snapshot_retention_days": 7,'
              . '  "results_retention_days": 60,'
              . '  "custom_settings": {'
              . '    "custom_urls" : [{'
              . '      "url_name" : "Lookup IP",'
              . '      "url_value" : "http://geoiplookup.net/ip/$clientip$"'
              . '    }]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
