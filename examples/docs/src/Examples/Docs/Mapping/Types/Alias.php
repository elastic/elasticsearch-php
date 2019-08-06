<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Alias
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/types/alias.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Alias extends SimpleExamplesTester {

    /**
     * Tag:  2716453454dbf9c6dde2ea6850a62214
     * Line: 12
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL12_2716453454dbf9c6dde2ea6850a62214()
    {
        $client = $this->getClient();
        // tag::2716453454dbf9c6dde2ea6850a62214[]
        // TODO -- Implement Example
        // PUT trips
        // {
        //   "mappings": {
        //     "properties": {
        //       "distance": {
        //         "type": "long"
        //       },
        //       "route_length_miles": {
        //         "type": "alias",
        //         "path": "distance" \<1>
        //       },
        //       "transit_mode": {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // GET _search
        // {
        //   "query": {
        //     "range" : {
        //       "route_length_miles" : {
        //         "gte" : 39
        //       }
        //     }
        //   }
        // }
        // end::2716453454dbf9c6dde2ea6850a62214[]

        $curl = 'PUT trips'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "distance": {'
              . '        "type": "long"'
              . '      },'
              . '      "route_length_miles": {'
              . '        "type": "alias",'
              . '        "path": "distance" \<1>'
              . '      },'
              . '      "transit_mode": {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'GET _search'
              . '{'
              . '  "query": {'
              . '    "range" : {'
              . '      "route_length_miles" : {'
              . '        "gte" : 39'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a2dabdcbb661e7690166ae6d0de27e46
     * Line: 56
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL56_a2dabdcbb661e7690166ae6d0de27e46()
    {
        $client = $this->getClient();
        // tag::a2dabdcbb661e7690166ae6d0de27e46[]
        // TODO -- Implement Example
        // GET trips/_field_caps?fields=route_*,transit_mode
        // end::a2dabdcbb661e7690166ae6d0de27e46[]

        $curl = 'GET trips/_field_caps?fields=route_*,transit_mode';

        // TODO -- make assertion
    }

    /**
     * Tag:  f6c9d72fa26cbedd0c3f9fa64a88c38a
     * Line: 88
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL88_f6c9d72fa26cbedd0c3f9fa64a88c38a()
    {
        $client = $this->getClient();
        // tag::f6c9d72fa26cbedd0c3f9fa64a88c38a[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query" : {
        //     "match_all": {}
        //   },
        //   "_source": "route_length_miles"
        // }
        // end::f6c9d72fa26cbedd0c3f9fa64a88c38a[]

        $curl = 'GET /_search'
              . '{'
              . '  "query" : {'
              . '    "match_all": {}'
              . '  },'
              . '  "_source": "route_length_miles"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
