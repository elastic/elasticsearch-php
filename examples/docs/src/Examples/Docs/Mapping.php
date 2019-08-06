<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Mapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Mapping extends SimpleExamplesTester {

    /**
     * Tag:  b311b42b7dcc69821df1f77bfaf2d50d
     * Line: 141
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL141_b311b42b7dcc69821df1f77bfaf2d50d()
    {
        $client = $this->getClient();
        // tag::b311b42b7dcc69821df1f77bfaf2d50d[]
        // TODO -- Implement Example
        // PUT my_index \<1>
        // {
        //   "mappings": {
        //     "properties": { \<2>
        //       "title":    { "type": "text"  }, \<3>
        //       "name":     { "type": "text"  }, \<4>
        //       "age":      { "type": "integer" },  \<5>
        //       "created":  {
        //         "type":   "date", \<6>
        //         "format": "strict_date_optional_time||epoch_millis"
        //       }
        //     }
        //   }
        // }
        // end::b311b42b7dcc69821df1f77bfaf2d50d[]

        $curl = 'PUT my_index \<1>'
              . '{'
              . '  "mappings": {'
              . '    "properties": { \<2>'
              . '      "title":    { "type": "text"  }, \<3>'
              . '      "name":     { "type": "text"  }, \<4>'
              . '      "age":      { "type": "integer" },  \<5>'
              . '      "created":  {'
              . '        "type":   "date", \<6>'
              . '        "format": "strict_date_optional_time||epoch_millis"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
