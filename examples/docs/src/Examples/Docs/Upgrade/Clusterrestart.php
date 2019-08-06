<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Upgrade;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Clusterrestart
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   upgrade/cluster_restart.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Clusterrestart extends SimpleExamplesTester {

    /**
     * Tag:  1cd3b9d65576a9212eef898eb3105758
     * Line: 27
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL27_1cd3b9d65576a9212eef898eb3105758()
    {
        $client = $this->getClient();
        // tag::1cd3b9d65576a9212eef898eb3105758[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster.routing.allocation.enable": "primaries"
        //   }
        // }
        // end::1cd3b9d65576a9212eef898eb3105758[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster.routing.allocation.enable": "primaries"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  31b4eec9ac4c2c3fdfbaeee8d2f83513
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_31b4eec9ac4c2c3fdfbaeee8d2f83513()
    {
        $client = $this->getClient();
        // tag::31b4eec9ac4c2c3fdfbaeee8d2f83513[]
        // TODO -- Implement Example
        // POST _flush/synced
        // end::31b4eec9ac4c2c3fdfbaeee8d2f83513[]

        $curl = 'POST _flush/synced';

        // TODO -- make assertion
    }

    /**
     * Tag:  a21a7bf052b41f5b996dc58f7b69770f
     * Line: 60
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL60_a21a7bf052b41f5b996dc58f7b69770f()
    {
        $client = $this->getClient();
        // tag::a21a7bf052b41f5b996dc58f7b69770f[]
        // TODO -- Implement Example
        // POST _ml/set_upgrade_mode?enabled=true
        // end::a21a7bf052b41f5b996dc58f7b69770f[]

        $curl = 'POST _ml/set_upgrade_mode?enabled=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  c0a4b0c1c6eff14da8b152ceb19c1c31
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_c0a4b0c1c6eff14da8b152ceb19c1c31()
    {
        $client = $this->getClient();
        // tag::c0a4b0c1c6eff14da8b152ceb19c1c31[]
        // TODO -- Implement Example
        // GET _cat/health
        // GET _cat/nodes
        // end::c0a4b0c1c6eff14da8b152ceb19c1c31[]

        $curl = 'GET _cat/health'
              . 'GET _cat/nodes';

        // TODO -- make assertion
    }

    /**
     * Tag:  45ef5156dbd2d3fd4fd22b8d99f7aad4
     * Line: 117
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL117_45ef5156dbd2d3fd4fd22b8d99f7aad4()
    {
        $client = $this->getClient();
        // tag::45ef5156dbd2d3fd4fd22b8d99f7aad4[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster.routing.allocation.enable": null
        //   }
        // }
        // end::45ef5156dbd2d3fd4fd22b8d99f7aad4[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster.routing.allocation.enable": null'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2d9b30acd6b5683f39d53494c0dd779c
     * Line: 137
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL137_2d9b30acd6b5683f39d53494c0dd779c()
    {
        $client = $this->getClient();
        // tag::2d9b30acd6b5683f39d53494c0dd779c[]
        // TODO -- Implement Example
        // GET _cat/health
        // GET _cat/recovery
        // end::2d9b30acd6b5683f39d53494c0dd779c[]

        $curl = 'GET _cat/health'
              . 'GET _cat/recovery';

        // TODO -- make assertion
    }

    /**
     * Tag:  3c5d5a5c34a62724942329658c688f5e
     * Line: 154
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL154_3c5d5a5c34a62724942329658c688f5e()
    {
        $client = $this->getClient();
        // tag::3c5d5a5c34a62724942329658c688f5e[]
        // TODO -- Implement Example
        // POST _ml/set_upgrade_mode?enabled=false
        // end::3c5d5a5c34a62724942329658c688f5e[]

        $curl = 'POST _ml/set_upgrade_mode?enabled=false';

        // TODO -- make assertion
    }

// %__METHOD__%








}
