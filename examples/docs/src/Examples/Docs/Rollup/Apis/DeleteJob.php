<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Rollup\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteJob
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   rollup/apis/delete-job.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteJob extends SimpleExamplesTester {

    /**
     * Tag:  94246f45025ed394cd6415ed8d7a0588
     * Line: 80
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL80_94246f45025ed394cd6415ed8d7a0588()
    {
        $client = $this->getClient();
        // tag::94246f45025ed394cd6415ed8d7a0588[]
        // TODO -- Implement Example
        // DELETE _rollup/job/sensor
        // end::94246f45025ed394cd6415ed8d7a0588[]

        $curl = 'DELETE _rollup/job/sensor';

        // TODO -- make assertion
    }

// %__METHOD__%


}
