<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Discovery;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AddingRemovingNodes
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/discovery/adding-removing-nodes.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AddingRemovingNodes extends SimpleExamplesTester {

    /**
     * Tag:  abcc9f98c6bbaf70aa0b1abf8011d2a4
     * Line: 64
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL64_abcc9f98c6bbaf70aa0b1abf8011d2a4()
    {
        $client = $this->getClient();
        // tag::abcc9f98c6bbaf70aa0b1abf8011d2a4[]
        // TODO -- Implement Example
        // # Add node to voting configuration exclusions list and wait for the system
        // # to auto-reconfigure the node out of the voting configuration up to the
        // # default timeout of 30 seconds
        // POST /_cluster/voting_config_exclusions/node_name
        // # Add node to voting configuration exclusions list and wait for
        // # auto-reconfiguration up to one minute
        // POST /_cluster/voting_config_exclusions/node_name?timeout=1m
        // end::abcc9f98c6bbaf70aa0b1abf8011d2a4[]

        $curl = '# Add node to voting configuration exclusions list and wait for the system'
              . '# to auto-reconfigure the node out of the voting configuration up to the'
              . '# default timeout of 30 seconds'
              . 'POST /_cluster/voting_config_exclusions/node_name'
              . '# Add node to voting configuration exclusions list and wait for'
              . '# auto-reconfiguration up to one minute'
              . 'POST /_cluster/voting_config_exclusions/node_name?timeout=1m';

        // TODO -- make assertion
    }

    /**
     * Tag:  92f073762634a4b2274f71002494192e
     * Line: 108
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL108_92f073762634a4b2274f71002494192e()
    {
        $client = $this->getClient();
        // tag::92f073762634a4b2274f71002494192e[]
        // TODO -- Implement Example
        // GET /_cluster/state?filter_path=metadata.cluster_coordination.voting_config_exclusions
        // end::92f073762634a4b2274f71002494192e[]

        $curl = 'GET /_cluster/state?filter_path=metadata.cluster_coordination.voting_config_exclusions';

        // TODO -- make assertion
    }

    /**
     * Tag:  ead4d875877d618594d0cdbdd9b7998b
     * Line: 127
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL127_ead4d875877d618594d0cdbdd9b7998b()
    {
        $client = $this->getClient();
        // tag::ead4d875877d618594d0cdbdd9b7998b[]
        // TODO -- Implement Example
        // # Wait for all the nodes with voting configuration exclusions to be removed from
        // # the cluster and then remove all the exclusions, allowing any node to return to
        // # the voting configuration in the future.
        // DELETE /_cluster/voting_config_exclusions
        // # Immediately remove all the voting configuration exclusions, allowing any node
        // # to return to the voting configuration in the future.
        // DELETE /_cluster/voting_config_exclusions?wait_for_removal=false
        // end::ead4d875877d618594d0cdbdd9b7998b[]

        $curl = '# Wait for all the nodes with voting configuration exclusions to be removed from'
              . '# the cluster and then remove all the exclusions, allowing any node to return to'
              . '# the voting configuration in the future.'
              . 'DELETE /_cluster/voting_config_exclusions'
              . '# Immediately remove all the voting configuration exclusions, allowing any node'
              . '# to return to the voting configuration in the future.'
              . 'DELETE /_cluster/voting_config_exclusions?wait_for_removal=false';

        // TODO -- make assertion
    }

// %__METHOD__%




}
