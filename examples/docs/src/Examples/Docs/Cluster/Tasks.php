<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Tasks
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/tasks.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Tasks extends SimpleExamplesTester {

    /**
     * Tag:  166bcfc6d5d39defec7ad6aa44d0914b
     * Line: 13
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL13_166bcfc6d5d39defec7ad6aa44d0914b()
    {
        $client = $this->getClient();
        // tag::166bcfc6d5d39defec7ad6aa44d0914b[]
        // TODO -- Implement Example
        // GET _tasks \<1>
        // GET _tasks?nodes=nodeId1,nodeId2 \<2>
        // GET _tasks?nodes=nodeId1,nodeId2&actions=cluster:* \<3>
        // end::166bcfc6d5d39defec7ad6aa44d0914b[]

        $curl = 'GET _tasks \<1>'
              . 'GET _tasks?nodes=nodeId1,nodeId2 \<2>'
              . 'GET _tasks?nodes=nodeId1,nodeId2&actions=cluster:* \<3>';

        // TODO -- make assertion
    }

    /**
     * Tag:  33610800d9de3c3e6d6b3c611ace7330
     * Line: 67
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL67_33610800d9de3c3e6d6b3c611ace7330()
    {
        $client = $this->getClient();
        // tag::33610800d9de3c3e6d6b3c611ace7330[]
        // TODO -- Implement Example
        // GET _tasks/oTUltX4IQMOUUVeiohTt8A:124
        // end::33610800d9de3c3e6d6b3c611ace7330[]

        $curl = 'GET _tasks/oTUltX4IQMOUUVeiohTt8A:124';

        // TODO -- make assertion
    }

    /**
     * Tag:  29824032d7d64512d17458fdd687b1f6
     * Line: 78
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL78_29824032d7d64512d17458fdd687b1f6()
    {
        $client = $this->getClient();
        // tag::29824032d7d64512d17458fdd687b1f6[]
        // TODO -- Implement Example
        // GET _tasks?parent_task_id=oTUltX4IQMOUUVeiohTt8A:123
        // end::29824032d7d64512d17458fdd687b1f6[]

        $curl = 'GET _tasks?parent_task_id=oTUltX4IQMOUUVeiohTt8A:123';

        // TODO -- make assertion
    }

    /**
     * Tag:  8f4a7f68f2ca3698abdf20026a2d8c5f
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_8f4a7f68f2ca3698abdf20026a2d8c5f()
    {
        $client = $this->getClient();
        // tag::8f4a7f68f2ca3698abdf20026a2d8c5f[]
        // TODO -- Implement Example
        // GET _tasks?actions=*search&detailed
        // end::8f4a7f68f2ca3698abdf20026a2d8c5f[]

        $curl = 'GET _tasks?actions=*search&detailed';

        // TODO -- make assertion
    }

    /**
     * Tag:  93fb59d3204f37af952198b331fb6bb7
     * Line: 153
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL153_93fb59d3204f37af952198b331fb6bb7()
    {
        $client = $this->getClient();
        // tag::93fb59d3204f37af952198b331fb6bb7[]
        // TODO -- Implement Example
        // GET _tasks/oTUltX4IQMOUUVeiohTt8A:12345?wait_for_completion=true&timeout=10s
        // end::93fb59d3204f37af952198b331fb6bb7[]

        $curl = 'GET _tasks/oTUltX4IQMOUUVeiohTt8A:12345?wait_for_completion=true&timeout=10s';

        // TODO -- make assertion
    }

    /**
     * Tag:  77447e2966708e92f5e219d43ac3f00d
     * Line: 163
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL163_77447e2966708e92f5e219d43ac3f00d()
    {
        $client = $this->getClient();
        // tag::77447e2966708e92f5e219d43ac3f00d[]
        // TODO -- Implement Example
        // GET _tasks?actions=*reindex&wait_for_completion=true&timeout=10s
        // end::77447e2966708e92f5e219d43ac3f00d[]

        $curl = 'GET _tasks?actions=*reindex&wait_for_completion=true&timeout=10s';

        // TODO -- make assertion
    }

    /**
     * Tag:  927fc3b86302afb2fc41785261771663
     * Line: 172
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL172_927fc3b86302afb2fc41785261771663()
    {
        $client = $this->getClient();
        // tag::927fc3b86302afb2fc41785261771663[]
        // TODO -- Implement Example
        // GET _cat/tasks
        // GET _cat/tasks?detailed
        // end::927fc3b86302afb2fc41785261771663[]

        $curl = 'GET _cat/tasks'
              . 'GET _cat/tasks?detailed';

        // TODO -- make assertion
    }

    /**
     * Tag:  d89d36741d906a71eca6c144e8d83889
     * Line: 186
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL186_d89d36741d906a71eca6c144e8d83889()
    {
        $client = $this->getClient();
        // tag::d89d36741d906a71eca6c144e8d83889[]
        // TODO -- Implement Example
        // POST _tasks/oTUltX4IQMOUUVeiohTt8A:12345/_cancel
        // end::d89d36741d906a71eca6c144e8d83889[]

        $curl = 'POST _tasks/oTUltX4IQMOUUVeiohTt8A:12345/_cancel';

        // TODO -- make assertion
    }

    /**
     * Tag:  612c2e975f833de9815651135735eae5
     * Line: 196
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL196_612c2e975f833de9815651135735eae5()
    {
        $client = $this->getClient();
        // tag::612c2e975f833de9815651135735eae5[]
        // TODO -- Implement Example
        // POST _tasks/_cancel?nodes=nodeId1,nodeId2&actions=*reindex
        // end::612c2e975f833de9815651135735eae5[]

        $curl = 'POST _tasks/_cancel?nodes=nodeId1,nodeId2&actions=*reindex';

        // TODO -- make assertion
    }

    /**
     * Tag:  bd3d710ec50a151453e141691163af72
     * Line: 208
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL208_bd3d710ec50a151453e141691163af72()
    {
        $client = $this->getClient();
        // tag::bd3d710ec50a151453e141691163af72[]
        // TODO -- Implement Example
        // GET _tasks?group_by=parents
        // end::bd3d710ec50a151453e141691163af72[]

        $curl = 'GET _tasks?group_by=parents';

        // TODO -- make assertion
    }

    /**
     * Tag:  a3ce0cfe2176f3d8a36959a5916995f0
     * Line: 216
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL216_a3ce0cfe2176f3d8a36959a5916995f0()
    {
        $client = $this->getClient();
        // tag::a3ce0cfe2176f3d8a36959a5916995f0[]
        // TODO -- Implement Example
        // GET _tasks?group_by=none
        // end::a3ce0cfe2176f3d8a36959a5916995f0[]

        $curl = 'GET _tasks?group_by=none';

        // TODO -- make assertion
    }

// %__METHOD__%












}
