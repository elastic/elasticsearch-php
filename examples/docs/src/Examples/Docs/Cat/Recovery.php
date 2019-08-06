<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cat;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Recovery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cat/recovery.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Recovery extends SimpleExamplesTester {

    /**
     * Tag:  0497361415e63295f2151b34818ad1ab
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_0497361415e63295f2151b34818ad1ab()
    {
        $client = $this->getClient();
        // tag::0497361415e63295f2151b34818ad1ab[]
        // TODO -- Implement Example
        // GET _cat/recovery?v
        // end::0497361415e63295f2151b34818ad1ab[]

        $curl = 'GET _cat/recovery?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  be9390dd19d724364b72bf081b3593d7
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_be9390dd19d724364b72bf081b3593d7()
    {
        $client = $this->getClient();
        // tag::be9390dd19d724364b72bf081b3593d7[]
        // TODO -- Implement Example
        // GET _cat/recovery?v&h=i,s,t,ty,st,shost,thost,f,fp,b,bp
        // end::be9390dd19d724364b72bf081b3593d7[]

        $curl = 'GET _cat/recovery?v&h=i,s,t,ty,st,shost,thost,f,fp,b,bp';

        // TODO -- make assertion
    }

    /**
     * Tag:  a213728fa704ca23c5983809332d3fb3
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_a213728fa704ca23c5983809332d3fb3()
    {
        $client = $this->getClient();
        // tag::a213728fa704ca23c5983809332d3fb3[]
        // TODO -- Implement Example
        // GET _cat/recovery?v&h=i,s,t,ty,st,rep,snap,f,fp,b,bp
        // end::a213728fa704ca23c5983809332d3fb3[]

        $curl = 'GET _cat/recovery?v&h=i,s,t,ty,st,rep,snap,f,fp,b,bp';

        // TODO -- make assertion
    }

// %__METHOD__%




}
