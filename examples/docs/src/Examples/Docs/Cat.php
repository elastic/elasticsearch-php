<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Cat
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Cat extends SimpleExamplesTester {

    /**
     * Tag:  45bde49f35ffae3f3dabc77a592241b4
     * Line: 28
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL28_45bde49f35ffae3f3dabc77a592241b4()
    {
        $client = $this->getClient();
        // tag::45bde49f35ffae3f3dabc77a592241b4[]
        // TODO -- Implement Example
        // GET /_cat/master?v
        // end::45bde49f35ffae3f3dabc77a592241b4[]

        $curl = 'GET /_cat/master?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  179dabbc531ede7a1813d1a11ce5b5fd
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_179dabbc531ede7a1813d1a11ce5b5fd()
    {
        $client = $this->getClient();
        // tag::179dabbc531ede7a1813d1a11ce5b5fd[]
        // TODO -- Implement Example
        // GET /_cat/master?help
        // end::179dabbc531ede7a1813d1a11ce5b5fd[]

        $curl = 'GET /_cat/master?help';

        // TODO -- make assertion
    }

    /**
     * Tag:  d940059e16675a40e3d278073331eeed
     * Line: 79
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL79_d940059e16675a40e3d278073331eeed()
    {
        $client = $this->getClient();
        // tag::d940059e16675a40e3d278073331eeed[]
        // TODO -- Implement Example
        // GET /_cat/nodes?h=ip,port,heapPercent,name
        // end::d940059e16675a40e3d278073331eeed[]

        $curl = 'GET /_cat/nodes?h=ip,port,heapPercent,name';

        // TODO -- make assertion
    }

    /**
     * Tag:  794fa23d07c42900b5e97fb9bf323941
     * Line: 195
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL195_794fa23d07c42900b5e97fb9bf323941()
    {
        $client = $this->getClient();
        // tag::794fa23d07c42900b5e97fb9bf323941[]
        // TODO -- Implement Example
        // GET _cat/templates?v&s=order:desc,index_patterns
        // end::794fa23d07c42900b5e97fb9bf323941[]

        $curl = 'GET _cat/templates?v&s=order:desc,index_patterns';

        // TODO -- make assertion
    }

// %__METHOD__%





}
