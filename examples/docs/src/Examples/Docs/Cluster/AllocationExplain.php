<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: AllocationExplain
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/allocation-explain.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class AllocationExplain extends SimpleExamplesTester {

    /**
     * Tag:  e4cd381f35dcaa151dd93cf259e50ae6
     * Line: 19
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL19_e4cd381f35dcaa151dd93cf259e50ae6()
    {
        $client = $this->getClient();
        // tag::e4cd381f35dcaa151dd93cf259e50ae6[]
        // TODO -- Implement Example
        // PUT /myindex
        // end::e4cd381f35dcaa151dd93cf259e50ae6[]

        $curl = 'PUT /myindex';

        // TODO -- make assertion
    }

    /**
     * Tag:  2663038cfc46b106edaef607d553c99c
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_2663038cfc46b106edaef607d553c99c()
    {
        $client = $this->getClient();
        // tag::2663038cfc46b106edaef607d553c99c[]
        // TODO -- Implement Example
        // GET /_cluster/allocation/explain
        // {
        //   "index": "myindex",
        //   "shard": 0,
        //   "primary": true
        // }
        // end::2663038cfc46b106edaef607d553c99c[]

        $curl = 'GET /_cluster/allocation/explain'
              . '{'
              . '  "index": "myindex",'
              . '  "shard": 0,'
              . '  "primary": true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  75fb2de2b47c564833ab14049c295384
     * Line: 48
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL48_75fb2de2b47c564833ab14049c295384()
    {
        $client = $this->getClient();
        // tag::75fb2de2b47c564833ab14049c295384[]
        // TODO -- Implement Example
        // GET /_cluster/allocation/explain
        // {
        //   "index": "myindex",
        //   "shard": 0,
        //   "primary": false,
        //   "current_node": "nodeA"                         \<1>
        // }
        // end::75fb2de2b47c564833ab14049c295384[]

        $curl = 'GET /_cluster/allocation/explain'
              . '{'
              . '  "index": "myindex",'
              . '  "shard": 0,'
              . '  "primary": false,'
              . '  "current_node": "nodeA"                         \<1>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  45803e6cb9fee2b430dcf63d50fb7a2b
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_45803e6cb9fee2b430dcf63d50fb7a2b()
    {
        $client = $this->getClient();
        // tag::45803e6cb9fee2b430dcf63d50fb7a2b[]
        // TODO -- Implement Example
        // GET /_cluster/allocation/explain
        // end::45803e6cb9fee2b430dcf63d50fb7a2b[]

        $curl = 'GET /_cluster/allocation/explain';

        // TODO -- make assertion
    }

    /**
     * Tag:  fb99aaf2e89e70c96c2c79c2ce7a36f1
     * Line: 145
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL145_fb99aaf2e89e70c96c2c79c2ce7a36f1()
    {
        $client = $this->getClient();
        // tag::fb99aaf2e89e70c96c2c79c2ce7a36f1[]
        // TODO -- Implement Example
        // GET /_cluster/allocation/explain?include_disk_info=true
        // end::fb99aaf2e89e70c96c2c79c2ce7a36f1[]

        $curl = 'GET /_cluster/allocation/explain?include_disk_info=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  681419ddc44c9f7914f88be834ae2b44
     * Line: 154
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL154_681419ddc44c9f7914f88be834ae2b44()
    {
        $client = $this->getClient();
        // tag::681419ddc44c9f7914f88be834ae2b44[]
        // TODO -- Implement Example
        // GET /_cluster/allocation/explain?include_yes_decisions=true
        // end::681419ddc44c9f7914f88be834ae2b44[]

        $curl = 'GET /_cluster/allocation/explain?include_yes_decisions=true';

        // TODO -- make assertion
    }

// %__METHOD__%







}
