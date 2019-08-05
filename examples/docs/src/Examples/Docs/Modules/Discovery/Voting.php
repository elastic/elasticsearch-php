<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Discovery;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Voting
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/discovery/voting.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Voting extends SimpleExamplesTester {

    /**
     * Tag:  1605be45a5711d1929d6ad2d1ae0f797
     * Line: 31
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL31_1605be45a5711d1929d6ad2d1ae0f797()
    {
        $client = $this->getClient();
        // tag::1605be45a5711d1929d6ad2d1ae0f797[]
        // TODO -- Implement Example
        // GET /_cluster/state?filter_path=metadata.cluster_coordination.last_committed_config
        // end::1605be45a5711d1929d6ad2d1ae0f797[]

        $curl = 'GET /_cluster/state?filter_path=metadata.cluster_coordination.last_committed_config';

        // TODO -- make assertion
    }

// %__METHOD__%


}
