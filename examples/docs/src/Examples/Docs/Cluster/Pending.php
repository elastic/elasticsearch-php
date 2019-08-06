<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Pending
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/pending.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Pending extends SimpleExamplesTester {

    /**
     * Tag:  aa814309ad5f1630886ba75255b444f5
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_aa814309ad5f1630886ba75255b444f5()
    {
        $client = $this->getClient();
        // tag::aa814309ad5f1630886ba75255b444f5[]
        // TODO -- Implement Example
        // GET /_cluster/pending_tasks
        // end::aa814309ad5f1630886ba75255b444f5[]

        $curl = 'GET /_cluster/pending_tasks';

        // TODO -- make assertion
    }

// %__METHOD__%


}
