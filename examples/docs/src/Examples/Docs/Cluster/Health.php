<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Health
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/health.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Health extends SimpleExamplesTester {

    /**
     * Tag:  b02e4907c9936c1adc16ccce9d49900d
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_b02e4907c9936c1adc16ccce9d49900d()
    {
        $client = $this->getClient();
        // tag::b02e4907c9936c1adc16ccce9d49900d[]
        // TODO -- Implement Example
        // GET _cluster/health
        // end::b02e4907c9936c1adc16ccce9d49900d[]

        $curl = 'GET _cluster/health';

        // TODO -- make assertion
    }

    /**
     * Tag:  1dc474520122c524016c14a4418934b6
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_1dc474520122c524016c14a4418934b6()
    {
        $client = $this->getClient();
        // tag::1dc474520122c524016c14a4418934b6[]
        // TODO -- Implement Example
        // GET /_cluster/health/test1,test2
        // end::1dc474520122c524016c14a4418934b6[]

        $curl = 'GET /_cluster/health/test1,test2';

        // TODO -- make assertion
    }

    /**
     * Tag:  04f5dd677c777bcb15d7d5fa63275fc8
     * Line: 66
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL66_04f5dd677c777bcb15d7d5fa63275fc8()
    {
        $client = $this->getClient();
        // tag::04f5dd677c777bcb15d7d5fa63275fc8[]
        // TODO -- Implement Example
        // GET /_cluster/health?wait_for_status=yellow&timeout=50s
        // end::04f5dd677c777bcb15d7d5fa63275fc8[]

        $curl = 'GET /_cluster/health?wait_for_status=yellow&timeout=50s';

        // TODO -- make assertion
    }

    /**
     * Tag:  c48264ec5d9b9679fddd72e5c44425b9
     * Line: 129
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL129_c48264ec5d9b9679fddd72e5c44425b9()
    {
        $client = $this->getClient();
        // tag::c48264ec5d9b9679fddd72e5c44425b9[]
        // TODO -- Implement Example
        // GET /_cluster/health/twitter?level=shards
        // end::c48264ec5d9b9679fddd72e5c44425b9[]

        $curl = 'GET /_cluster/health/twitter?level=shards';

        // TODO -- make assertion
    }

// %__METHOD__%





}
