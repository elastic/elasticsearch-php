<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Setup\Install;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CheckRunning
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   setup/install/check-running.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CheckRunning extends SimpleExamplesTester {

    /**
     * Tag:  3d1ff6097e2359f927c88c2ccdb36252
     * Line: 7
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL7_3d1ff6097e2359f927c88c2ccdb36252()
    {
        $client = $this->getClient();
        // tag::3d1ff6097e2359f927c88c2ccdb36252[]
        $response = $client->info();
        // end::3d1ff6097e2359f927c88c2ccdb36252[]

        $curl = 'GET /';

        // TODO -- make assertion
    }

// %__METHOD__%

}
