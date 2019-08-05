<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: VotingExclusions
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/voting-exclusions.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class VotingExclusions extends SimpleExamplesTester {

    /**
     * Tag:  59681840e544bb5b3bd858c194972f23
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_59681840e544bb5b3bd858c194972f23()
    {
        $client = $this->getClient();
        // tag::59681840e544bb5b3bd858c194972f23[]
        // TODO -- Implement Example
        // POST /_cluster/voting_config_exclusions/nodeId1
        // end::59681840e544bb5b3bd858c194972f23[]

        $curl = 'POST /_cluster/voting_config_exclusions/nodeId1';

        // TODO -- make assertion
    }

    /**
     * Tag:  25cb9e1da00dfd971065ce182467434d
     * Line: 73
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL73_25cb9e1da00dfd971065ce182467434d()
    {
        $client = $this->getClient();
        // tag::25cb9e1da00dfd971065ce182467434d[]
        // TODO -- Implement Example
        // DELETE /_cluster/voting_config_exclusions
        // end::25cb9e1da00dfd971065ce182467434d[]

        $curl = 'DELETE /_cluster/voting_config_exclusions';

        // TODO -- make assertion
    }

// %__METHOD__%



}
