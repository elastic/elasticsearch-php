<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Range
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/range.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Range extends SimpleExamplesTester {

    /**
     * Tag:  2b371fbf0654d76436d49f5703d6c137
     * Line: 21
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL21_2b371fbf0654d76436d49f5703d6c137()
    {
        $client = $this->getClient();
        // tag::2b371fbf0654d76436d49f5703d6c137[]
        // TODO -- Implement Example
        // PUT range_index
        // {
        //   "settings": {
        //     "number_of_shards": 2
        //   },
        //   "mappings": {
        //     "properties": {
        //       "expected_attendees": {
        //         "type": "integer_range"
        //       },
        //       "time_frame": {
        //         "type": "date_range", \<1>
        //         "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"
        //       }
        //     }
        //   }
        // }
        // PUT range_index/_doc/1?refresh
        // {
        //   "expected_attendees" : { \<2>
        //     "gte" : 10,
        //     "lte" : 20
        //   },
        //   "time_frame" : { \<3>
        //     "gte" : "2015-10-31 12:00:00", \<4>
        //     "lte" : "2015-11-01"
        //   }
        // }
        // end::2b371fbf0654d76436d49f5703d6c137[]

        $curl = 'PUT range_index'
              . '{'
              . '  "settings": {'
              . '    "number_of_shards": 2'
              . '  },'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "expected_attendees": {'
              . '        "type": "integer_range"'
              . '      },'
              . '      "time_frame": {'
              . '        "type": "date_range", \<1>'
              . '        "format": "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT range_index/_doc/1?refresh'
              . '{'
              . '  "expected_attendees" : { \<2>'
              . '    "gte" : 10,'
              . '    "lte" : 20'
              . '  },'
              . '  "time_frame" : { \<3>'
              . '    "gte" : "2015-10-31 12:00:00", \<4>'
              . '    "lte" : "2015-11-01"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  84edb44c5b74426f448b2baa101092d6
     * Line: 63
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL63_84edb44c5b74426f448b2baa101092d6()
    {
        $client = $this->getClient();
        // tag::84edb44c5b74426f448b2baa101092d6[]
        // TODO -- Implement Example
        // GET range_index/_search
        // {
        //   "query" : {
        //     "term" : {
        //       "expected_attendees" : {
        //         "value": 12
        //       }
        //     }
        //   }
        // }
        // end::84edb44c5b74426f448b2baa101092d6[]

        $curl = 'GET range_index/_search'
              . '{'
              . '  "query" : {'
              . '    "term" : {'
              . '      "expected_attendees" : {'
              . '        "value": 12'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1572696b97822d3332be51700e09672f
     * Line: 120
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL120_1572696b97822d3332be51700e09672f()
    {
        $client = $this->getClient();
        // tag::1572696b97822d3332be51700e09672f[]
        // TODO -- Implement Example
        // GET range_index/_search
        // {
        //   "query" : {
        //     "range" : {
        //       "time_frame" : { \<1>
        //         "gte" : "2015-10-31",
        //         "lte" : "2015-11-01",
        //         "relation" : "within" \<2>
        //       }
        //     }
        //   }
        // }
        // end::1572696b97822d3332be51700e09672f[]

        $curl = 'GET range_index/_search'
              . '{'
              . '  "query" : {'
              . '    "range" : {'
              . '      "time_frame" : { \<1>'
              . '        "gte" : "2015-10-31",'
              . '        "lte" : "2015-11-01",'
              . '        "relation" : "within" \<2>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f894f680943a8af8328aab4741e6ab93
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_f894f680943a8af8328aab4741e6ab93()
    {
        $client = $this->getClient();
        // tag::f894f680943a8af8328aab4741e6ab93[]
        // TODO -- Implement Example
        // PUT range_index/_mapping
        // {
        //   "properties": {
        //     "ip_whitelist": {
        //       "type": "ip_range"
        //     }
        //   }
        // }
        // PUT range_index/_doc/2
        // {
        //   "ip_whitelist" : "192.168.0.0/16"
        // }
        // end::f894f680943a8af8328aab4741e6ab93[]

        $curl = 'PUT range_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "ip_whitelist": {'
              . '      "type": "ip_range"'
              . '    }'
              . '  }'
              . '}'
              . 'PUT range_index/_doc/2'
              . '{'
              . '  "ip_whitelist" : "192.168.0.0/16"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
