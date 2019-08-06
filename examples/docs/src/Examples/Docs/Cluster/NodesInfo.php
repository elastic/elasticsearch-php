<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: NodesInfo
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/nodes-info.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class NodesInfo extends SimpleExamplesTester {

    /**
     * Tag:  baeaa5e7d4388eeb6350bca18d2a7712
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_baeaa5e7d4388eeb6350bca18d2a7712()
    {
        $client = $this->getClient();
        // tag::baeaa5e7d4388eeb6350bca18d2a7712[]
        // TODO -- Implement Example
        // GET /_nodes
        // GET /_nodes/nodeId1,nodeId2
        // end::baeaa5e7d4388eeb6350bca18d2a7712[]

        $curl = 'GET /_nodes'
              . 'GET /_nodes/nodeId1,nodeId2';

        // TODO -- make assertion
    }

    /**
     * Tag:  3c4d7ef8422d2db423a8f23effcddaa1
     * Line: 55
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL55_3c4d7ef8422d2db423a8f23effcddaa1()
    {
        $client = $this->getClient();
        // tag::3c4d7ef8422d2db423a8f23effcddaa1[]
        // TODO -- Implement Example
        // # return just process
        // GET /_nodes/process
        // # same as above
        // GET /_nodes/_all/process
        // # return just jvm and process of only nodeId1 and nodeId2
        // GET /_nodes/nodeId1,nodeId2/jvm,process
        // # same as above
        // GET /_nodes/nodeId1,nodeId2/info/jvm,process
        // # return all the information of only nodeId1 and nodeId2
        // GET /_nodes/nodeId1,nodeId2/_all
        // end::3c4d7ef8422d2db423a8f23effcddaa1[]

        $curl = '# return just process'
              . 'GET /_nodes/process'
              . '# same as above'
              . 'GET /_nodes/_all/process'
              . '# return just jvm and process of only nodeId1 and nodeId2'
              . 'GET /_nodes/nodeId1,nodeId2/jvm,process'
              . '# same as above'
              . 'GET /_nodes/nodeId1,nodeId2/info/jvm,process'
              . '# return all the information of only nodeId1 and nodeId2'
              . 'GET /_nodes/nodeId1,nodeId2/_all';

        // TODO -- make assertion
    }

    /**
     * Tag:  68b64313bf89ec3f2c645da61999dbb4
     * Line: 125
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL125_68b64313bf89ec3f2c645da61999dbb4()
    {
        $client = $this->getClient();
        // tag::68b64313bf89ec3f2c645da61999dbb4[]
        // TODO -- Implement Example
        // GET /_nodes/plugins
        // end::68b64313bf89ec3f2c645da61999dbb4[]

        $curl = 'GET /_nodes/plugins';

        // TODO -- make assertion
    }

    /**
     * Tag:  0c464965126cc09e6812716a145991d4
     * Line: 206
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL206_0c464965126cc09e6812716a145991d4()
    {
        $client = $this->getClient();
        // tag::0c464965126cc09e6812716a145991d4[]
        // TODO -- Implement Example
        // GET /_nodes/ingest
        // end::0c464965126cc09e6812716a145991d4[]

        $curl = 'GET /_nodes/ingest';

        // TODO -- make assertion
    }

// %__METHOD__%





}
