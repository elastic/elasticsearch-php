<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SourceField
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/fields/source-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SourceField extends SimpleExamplesTester {

    /**
     * Tag:  50246e04b49dab320409b95526e6e34c
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_50246e04b49dab320409b95526e6e34c()
    {
        $client = $this->getClient();
        // tag::50246e04b49dab320409b95526e6e34c[]
        // TODO -- Implement Example
        // PUT tweets
        // {
        //   "mappings": {
        //     "_source": {
        //       "enabled": false
        //     }
        //   }
        // }
        // end::50246e04b49dab320409b95526e6e34c[]

        $curl = 'PUT tweets'
              . '{'
              . '  "mappings": {'
              . '    "_source": {'
              . '      "enabled": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b557f114e21dbc6f531d4e7621a08e8f
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_b557f114e21dbc6f531d4e7621a08e8f()
    {
        $client = $this->getClient();
        // tag::b557f114e21dbc6f531d4e7621a08e8f[]
        // TODO -- Implement Example
        // PUT logs
        // {
        //   "mappings": {
        //     "_source": {
        //       "includes": [
        //         "*.count",
        //         "meta.*"
        //       ],
        //       "excludes": [
        //         "meta.description",
        //         "meta.other.*"
        //       ]
        //     }
        //   }
        // }
        // PUT logs/_doc/1
        // {
        //   "requests": {
        //     "count": 10,
        //     "foo": "bar" \<1>
        //   },
        //   "meta": {
        //     "name": "Some metric",
        //     "description": "Some metric description", \<1>
        //     "other": {
        //       "foo": "one", \<1>
        //       "baz": "two" \<1>
        //     }
        //   }
        // }
        // GET logs/_search
        // {
        //   "query": {
        //     "match": {
        //       "meta.other.foo": "one" \<2>
        //     }
        //   }
        // }
        // end::b557f114e21dbc6f531d4e7621a08e8f[]

        $curl = 'PUT logs'
              . '{'
              . '  "mappings": {'
              . '    "_source": {'
              . '      "includes": ['
              . '        "*.count",'
              . '        "meta.*"'
              . '      ],'
              . '      "excludes": ['
              . '        "meta.description",'
              . '        "meta.other.*"'
              . '      ]'
              . '    }'
              . '  }'
              . '}'
              . 'PUT logs/_doc/1'
              . '{'
              . '  "requests": {'
              . '    "count": 10,'
              . '    "foo": "bar" \<1>'
              . '  },'
              . '  "meta": {'
              . '    "name": "Some metric",'
              . '    "description": "Some metric description", \<1>'
              . '    "other": {'
              . '      "foo": "one", \<1>'
              . '      "baz": "two" \<1>'
              . '    }'
              . '  }'
              . '}'
              . 'GET logs/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "meta.other.foo": "one" \<2>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
