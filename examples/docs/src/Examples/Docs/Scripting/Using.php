<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Scripting;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Using
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   scripting/using.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Using extends SimpleExamplesTester {

    /**
     * Tag:  e62cf588bfc891504bbf933af86eed7c
     * Line: 24
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL24_e62cf588bfc891504bbf933af86eed7c()
    {
        $client = $this->getClient();
        // tag::e62cf588bfc891504bbf933af86eed7c[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "my_field": 5
        // }
        // GET my_index/_search
        // {
        //   "script_fields": {
        //     "my_doubled_field": {
        //       "script": {
        //         "lang":   "expression",
        //         "source": "doc[\'my_field\'] * multiplier",
        //         "params": {
        //           "multiplier": 2
        //         }
        //       }
        //     }
        //   }
        // }
        // end::e62cf588bfc891504bbf933af86eed7c[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "my_field": 5'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "script_fields": {'
              . '    "my_doubled_field": {'
              . '      "script": {'
              . '        "lang":   "expression",'
              . '        "source": "doc[\'my_field\'] * multiplier",'
              . '        "params": {'
              . '          "multiplier": 2'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  40a2bbc35a887d6c7dda3cca1fe7aa58
     * Line: 148
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL148_40a2bbc35a887d6c7dda3cca1fe7aa58()
    {
        $client = $this->getClient();
        // tag::40a2bbc35a887d6c7dda3cca1fe7aa58[]
        // TODO -- Implement Example
        // POST _scripts/calculate-score
        // {
        //   "script": {
        //     "lang": "painless",
        //     "source": "Math.log(_score * 2) + params.my_modifier"
        //   }
        // }
        // end::40a2bbc35a887d6c7dda3cca1fe7aa58[]

        $curl = 'POST _scripts/calculate-score'
              . '{'
              . '  "script": {'
              . '    "lang": "painless",'
              . '    "source": "Math.log(_score * 2) + params.my_modifier"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  08e08feb514b24006e13f258d617d873
     * Line: 162
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL162_08e08feb514b24006e13f258d617d873()
    {
        $client = $this->getClient();
        // tag::08e08feb514b24006e13f258d617d873[]
        // TODO -- Implement Example
        // GET _scripts/calculate-score
        // end::08e08feb514b24006e13f258d617d873[]

        $curl = 'GET _scripts/calculate-score';

        // TODO -- make assertion
    }

    /**
     * Tag:  4484218a06e3bae623250cdaccac5dcb
     * Line: 171
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL171_4484218a06e3bae623250cdaccac5dcb()
    {
        $client = $this->getClient();
        // tag::4484218a06e3bae623250cdaccac5dcb[]
        // TODO -- Implement Example
        // GET _search
        // {
        //   "query": {
        //     "script": {
        //       "script": {
        //         "id": "calculate-score",
        //         "params": {
        //           "my_modifier": 2
        //         }
        //       }
        //     }
        //   }
        // }
        // end::4484218a06e3bae623250cdaccac5dcb[]

        $curl = 'GET _search'
              . '{'
              . '  "query": {'
              . '    "script": {'
              . '      "script": {'
              . '        "id": "calculate-score",'
              . '        "params": {'
              . '          "my_modifier": 2'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4061fd5ba7221ca85805ed14d59a6bc5
     * Line: 192
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL192_4061fd5ba7221ca85805ed14d59a6bc5()
    {
        $client = $this->getClient();
        // tag::4061fd5ba7221ca85805ed14d59a6bc5[]
        // TODO -- Implement Example
        // DELETE _scripts/calculate-score
        // end::4061fd5ba7221ca85805ed14d59a6bc5[]

        $curl = 'DELETE _scripts/calculate-score';

        // TODO -- make assertion
    }

// %__METHOD__%






}
