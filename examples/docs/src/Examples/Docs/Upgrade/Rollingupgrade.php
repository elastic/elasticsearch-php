<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Upgrade;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Rollingupgrade
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   upgrade/rolling_upgrade.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Rollingupgrade extends SimpleExamplesTester {

    /**
     * Tag:  1cd3b9d65576a9212eef898eb3105758
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_1cd3b9d65576a9212eef898eb3105758()
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
     * Line: 37
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL37_31b4eec9ac4c2c3fdfbaeee8d2f83513()
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
     * Line: 70
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL70_a21a7bf052b41f5b996dc58f7b69770f()
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
     * Tag:  7e49705769c42895fb7b1e2ca028ff47
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_7e49705769c42895fb7b1e2ca028ff47()
    {
        $client = $this->getClient();
        // tag::7e49705769c42895fb7b1e2ca028ff47[]
        // TODO -- Implement Example
        // GET _cat/nodes
        // end::7e49705769c42895fb7b1e2ca028ff47[]

        $curl = 'GET _cat/nodes';

        // TODO -- make assertion
    }

    /**
     * Tag:  45ef5156dbd2d3fd4fd22b8d99f7aad4
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_45ef5156dbd2d3fd4fd22b8d99f7aad4()
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
     * Tag:  5c53944aec2ce3e55854e315f0482029
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_5c53944aec2ce3e55854e315f0482029()
    {
        $client = $this->getClient();
        // tag::5c53944aec2ce3e55854e315f0482029[]
        // TODO -- Implement Example
        // GET _cat/health?v
        // end::5c53944aec2ce3e55854e315f0482029[]

        $curl = 'GET _cat/health?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  6b74ff6df5d7583add837b34a6c80a43
     * Line: 141
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL141_6b74ff6df5d7583add837b34a6c80a43()
    {
        $client = $this->getClient();
        // tag::6b74ff6df5d7583add837b34a6c80a43[]
        // TODO -- Implement Example
        // GET _cat/recovery
        // end::6b74ff6df5d7583add837b34a6c80a43[]

        $curl = 'GET _cat/recovery';

        // TODO -- make assertion
    }

    /**
     * Tag:  3c5d5a5c34a62724942329658c688f5e
     * Line: 168
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL168_3c5d5a5c34a62724942329658c688f5e()
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
