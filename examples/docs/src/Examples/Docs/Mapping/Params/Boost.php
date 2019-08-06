<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Boost
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/params/boost.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Boost extends SimpleExamplesTester {

    /**
     * Tag:  dcef5a46104e2602a0b9f5d968f66f4d
     * Line: 8
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL8_dcef5a46104e2602a0b9f5d968f66f4d()
    {
        $client = $this->getClient();
        // tag::dcef5a46104e2602a0b9f5d968f66f4d[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "title": {
        //         "type": "text",
        //         "boost": 2 \<1>
        //       },
        //       "content": {
        //         "type": "text"
        //       }
        //     }
        //   }
        // }
        // end::dcef5a46104e2602a0b9f5d968f66f4d[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "title": {'
              . '        "type": "text",'
              . '        "boost": 2 \<1>'
              . '      },'
              . '      "content": {'
              . '        "type": "text"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  df827f97ecf543a1722003edbf277c01
     * Line: 34
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL34_df827f97ecf543a1722003edbf277c01()
    {
        $client = $this->getClient();
        // tag::df827f97ecf543a1722003edbf277c01[]
        // TODO -- Implement Example
        // POST _search
        // {
        //     "query": {
        //         "match" : {
        //             "title": {
        //                 "query": "quick brown fox"
        //             }
        //         }
        //     }
        // }
        // end::df827f97ecf543a1722003edbf277c01[]

        $curl = 'POST _search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "title": {'
              . '                "query": "quick brown fox"'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  36a07d7014cdd3d6cd9d97651e66e7ef
     * Line: 51
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL51_36a07d7014cdd3d6cd9d97651e66e7ef()
    {
        $client = $this->getClient();
        // tag::36a07d7014cdd3d6cd9d97651e66e7ef[]
        // TODO -- Implement Example
        // POST _search
        // {
        //     "query": {
        //         "match" : {
        //             "title": {
        //                 "query": "quick brown fox",
        //                 "boost": 2
        //             }
        //         }
        //     }
        // }
        // end::36a07d7014cdd3d6cd9d97651e66e7ef[]

        $curl = 'POST _search'
              . '{'
              . '    "query": {'
              . '        "match" : {'
              . '            "title": {'
              . '                "query": "quick brown fox",'
              . '                "boost": 2'
              . '            }'
              . '        }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
