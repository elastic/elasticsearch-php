<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Setup\Sysconfig;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Swap
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   setup/sysconfig/swap.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Swap extends SimpleExamplesTester {

    /**
     * Tag:  ed250b74bc77c15bb794f55a12d762c3
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_ed250b74bc77c15bb794f55a12d762c3()
    {
        $client = $this->getClient();
        // tag::ed250b74bc77c15bb794f55a12d762c3[]
        // TODO -- Implement Example
        // GET _nodes?filter_path=**.mlockall
        // end::ed250b74bc77c15bb794f55a12d762c3[]

        $curl = 'GET _nodes?filter_path=**.mlockall';

        // TODO -- make assertion
    }

// %__METHOD__%


}
