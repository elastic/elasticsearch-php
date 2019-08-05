<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules\Allocation;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Prioritization
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   index-modules/allocation/prioritization.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Prioritization extends SimpleExamplesTester {

    /**
     * Tag:  8703f3b1b3895543abc36e2a7a0013d3
     * Line: 17
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL17_8703f3b1b3895543abc36e2a7a0013d3()
    {
        $client = $this->getClient();
        // tag::8703f3b1b3895543abc36e2a7a0013d3[]
        // TODO -- Implement Example
        // PUT index_1
        // PUT index_2
        // PUT index_3
        // {
        //   "settings": {
        //     "index.priority": 10
        //   }
        // }
        // PUT index_4
        // {
        //   "settings": {
        //     "index.priority": 5
        //   }
        // }
        // end::8703f3b1b3895543abc36e2a7a0013d3[]

        $curl = 'PUT index_1'
              . 'PUT index_2'
              . 'PUT index_3'
              . '{'
              . '  "settings": {'
              . '    "index.priority": 10'
              . '  }'
              . '}'
              . 'PUT index_4'
              . '{'
              . '  "settings": {'
              . '    "index.priority": 5'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a425fcab60f603504becee7d001f0a4b
     * Line: 49
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL49_a425fcab60f603504becee7d001f0a4b()
    {
        $client = $this->getClient();
        // tag::a425fcab60f603504becee7d001f0a4b[]
        // TODO -- Implement Example
        // PUT index_4/_settings
        // {
        //   "index.priority": 1
        // }
        // end::a425fcab60f603504becee7d001f0a4b[]

        $curl = 'PUT index_4/_settings'
              . '{'
              . '  "index.priority": 1'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
