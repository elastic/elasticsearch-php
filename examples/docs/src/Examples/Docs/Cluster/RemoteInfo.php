<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RemoteInfo
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/remote-info.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RemoteInfo extends SimpleExamplesTester {

    /**
     * Tag:  cc0cca5556ec6224c7134c233734beed
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_cc0cca5556ec6224c7134c233734beed()
    {
        $client = $this->getClient();
        // tag::cc0cca5556ec6224c7134c233734beed[]
        // TODO -- Implement Example
        // GET /_remote/info
        // end::cc0cca5556ec6224c7134c233734beed[]

        $curl = 'GET /_remote/info';

        // TODO -- make assertion
    }

// %__METHOD__%


}
