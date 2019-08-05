<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SetUpgradeMode
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ml/anomaly-detection/apis/set-upgrade-mode.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SetUpgradeMode extends SimpleExamplesTester {

    /**
     * Tag:  ae4aa368617637a390074535df86e64b
     * Line: 78
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL78_ae4aa368617637a390074535df86e64b()
    {
        $client = $this->getClient();
        // tag::ae4aa368617637a390074535df86e64b[]
        // TODO -- Implement Example
        // POST _ml/set_upgrade_mode?enabled=true&timeout=10m
        // end::ae4aa368617637a390074535df86e64b[]

        $curl = 'POST _ml/set_upgrade_mode?enabled=true&timeout=10m';

        // TODO -- make assertion
    }

    /**
     * Tag:  8e9e7dc5fad2b2b8e74ab4dc225d9c53
     * Line: 103
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL103_8e9e7dc5fad2b2b8e74ab4dc225d9c53()
    {
        $client = $this->getClient();
        // tag::8e9e7dc5fad2b2b8e74ab4dc225d9c53[]
        // TODO -- Implement Example
        // POST _ml/set_upgrade_mode?enabled=false&timeout=10m
        // end::8e9e7dc5fad2b2b8e74ab4dc225d9c53[]

        $curl = 'POST _ml/set_upgrade_mode?enabled=false&timeout=10m';

        // TODO -- make assertion
    }

// %__METHOD__%



}
