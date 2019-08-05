<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetMlInfo
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/get-ml-info.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetMlInfo extends SimpleExamplesTester {

    /**
     * Tag:  4d7c0b52d3c0a084157428624c543c90
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_4d7c0b52d3c0a084157428624c543c90()
    {
        $client = $this->getClient();
        // tag::4d7c0b52d3c0a084157428624c543c90[]
        // TODO -- Implement Example
        // GET _ml/info
        // end::4d7c0b52d3c0a084157428624c543c90[]

        $curl = 'GET _ml/info';

        // TODO -- make assertion
    }

// %__METHOD__%


}
