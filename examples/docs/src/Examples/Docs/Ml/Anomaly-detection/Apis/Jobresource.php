<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Jobresource
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/jobresource.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Jobresource extends SimpleExamplesTester {

    /**
     * Tag:  07daeea2d56f43ae1229860111dae8af
     * Line: 361
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL361_07daeea2d56f43ae1229860111dae8af()
    {
        $client = $this->getClient();
        // tag::07daeea2d56f43ae1229860111dae8af[]
        // TODO -- Implement Example
        // POST _ml/anomaly_detectors/_validate
        // {
        //   "analysis_config" : {
        //     "categorization_analyzer" : {
        //       "tokenizer" : "ml_classic",
        //       "filter" : [
        //         { "type" : "stop", "stopwords": [
        //           "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday",
        //           "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun",
        //           "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
        //           "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        //           "GMT", "UTC"
        //         ] }
        //       ]
        //     },
        //     "categorization_field_name": "message",
        //     "detectors" :[{
        //       "function":"count",
        //       "by_field_name": "mlcategory"
        //     }]
        //   },
        //   "data_description" : {
        //   }
        // }
        // end::07daeea2d56f43ae1229860111dae8af[]

        $curl = 'POST _ml/anomaly_detectors/_validate'
              . '{'
              . '  "analysis_config" : {'
              . '    "categorization_analyzer" : {'
              . '      "tokenizer" : "ml_classic",'
              . '      "filter" : ['
              . '        { "type" : "stop", "stopwords": ['
              . '          "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday",'
              . '          "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun",'
              . '          "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",'
              . '          "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",'
              . '          "GMT", "UTC"'
              . '        ] }'
              . '      ]'
              . '    },'
              . '    "categorization_field_name": "message",'
              . '    "detectors" :[{'
              . '      "function":"count",'
              . '      "by_field_name": "mlcategory"'
              . '    }]'
              . '  },'
              . '  "data_description" : {'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
