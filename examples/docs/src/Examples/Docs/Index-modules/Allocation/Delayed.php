<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules\Allocation;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Delayed
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   index-modules/allocation/delayed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Delayed extends SimpleExamplesTester {

    /**
     * Tag:  17e6f3fac556f08a78f7a876e71acb89
     * Line: 40
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL40_17e6f3fac556f08a78f7a876e71acb89()
    {
        $client = $this->getClient();
        // tag::17e6f3fac556f08a78f7a876e71acb89[]
        // TODO -- Implement Example
        // PUT _all/_settings
        // {
        //   "settings": {
        //     "index.unassigned.node_left.delayed_timeout": "5m"
        //   }
        // }
        // end::17e6f3fac556f08a78f7a876e71acb89[]

        $curl = 'PUT _all/_settings'
              . '{'
              . '  "settings": {'
              . '    "index.unassigned.node_left.delayed_timeout": "5m"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a38f29375eabd0103f8d7c00b17bb0ab
     * Line: 83
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL83_a38f29375eabd0103f8d7c00b17bb0ab()
    {
        $client = $this->getClient();
        // tag::a38f29375eabd0103f8d7c00b17bb0ab[]
        // TODO -- Implement Example
        // GET _cluster/health \<1>
        // end::a38f29375eabd0103f8d7c00b17bb0ab[]

        $curl = 'GET _cluster/health \<1>';

        // TODO -- make assertion
    }

    /**
     * Tag:  25d40d3049e57e2bb70c2c5b88bd7b87
     * Line: 96
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL96_25d40d3049e57e2bb70c2c5b88bd7b87()
    {
        $client = $this->getClient();
        // tag::25d40d3049e57e2bb70c2c5b88bd7b87[]
        // TODO -- Implement Example
        // PUT _all/_settings
        // {
        //   "settings": {
        //     "index.unassigned.node_left.delayed_timeout": "0"
        //   }
        // }
        // end::25d40d3049e57e2bb70c2c5b88bd7b87[]

        $curl = 'PUT _all/_settings'
              . '{'
              . '  "settings": {'
              . '    "index.unassigned.node_left.delayed_timeout": "0"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
