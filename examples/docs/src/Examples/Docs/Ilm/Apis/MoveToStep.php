<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MoveToStep
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/move-to-step.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MoveToStep extends SimpleExamplesTester {

    /**
     * Tag:  e3c5f93b3c85e8519f801defc20b0ce0
     * Line: 88
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL88_e3c5f93b3c85e8519f801defc20b0ce0()
    {
        $client = $this->getClient();
        // tag::e3c5f93b3c85e8519f801defc20b0ce0[]
        // TODO -- Implement Example
        // POST _ilm/move/my_index
        // {
        //   "current_step": { \<1>
        //     "phase": "new",
        //     "action": "complete",
        //     "name": "complete"
        //   },
        //   "next_step": { \<2>
        //     "phase": "warm",
        //     "action": "forcemerge",
        //     "name": "forcemerge"
        //   }
        // }
        // end::e3c5f93b3c85e8519f801defc20b0ce0[]

        $curl = 'POST _ilm/move/my_index'
              . '{'
              . '  "current_step": { \<1>'
              . '    "phase": "new",'
              . '    "action": "complete",'
              . '    "name": "complete"'
              . '  },'
              . '  "next_step": { \<2>'
              . '    "phase": "warm",'
              . '    "action": "forcemerge",'
              . '    "name": "forcemerge"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc5fcc40c29087a0df7b5405bb70de5c
     * Line: 111
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL111_bc5fcc40c29087a0df7b5405bb70de5c()
    {
        $client = $this->getClient();
        // tag::bc5fcc40c29087a0df7b5405bb70de5c[]
        // TODO -- Implement Example
        // {
        //   "acknowledged": true
        // }
        // end::bc5fcc40c29087a0df7b5405bb70de5c[]

        $curl = '{'
              . '  "acknowledged": true'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
