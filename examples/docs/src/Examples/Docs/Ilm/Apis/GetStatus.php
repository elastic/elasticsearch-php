<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetStatus
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/get-status.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetStatus extends SimpleExamplesTester {

    /**
     * Tag:  182df084f028479ecbe8d7648ddad892
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_182df084f028479ecbe8d7648ddad892()
    {
        $client = $this->getClient();
        // tag::182df084f028479ecbe8d7648ddad892[]
        // TODO -- Implement Example
        // GET _ilm/status
        // end::182df084f028479ecbe8d7648ddad892[]

        $curl = 'GET _ilm/status';

        // TODO -- make assertion
    }

    /**
     * Tag:  99e0bec31e49636bc0053ac66bc29352
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_99e0bec31e49636bc0053ac66bc29352()
    {
        $client = $this->getClient();
        // tag::99e0bec31e49636bc0053ac66bc29352[]
        // TODO -- Implement Example
        // {
        //   "operation_mode": "RUNNING"
        // }
        // end::99e0bec31e49636bc0053ac66bc29352[]

        $curl = '{'
              . '  "operation_mode": "RUNNING"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
