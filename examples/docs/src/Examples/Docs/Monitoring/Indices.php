<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Monitoring;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Indices
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   monitoring/indices.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Indices extends SimpleExamplesTester {

    /**
     * Tag:  83dfd0852101eca3ba8174c9c38b4e73
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_83dfd0852101eca3ba8174c9c38b4e73()
    {
        $client = $this->getClient();
        // tag::83dfd0852101eca3ba8174c9c38b4e73[]
        // TODO -- Implement Example
        // GET /_template/.monitoring-*
        // end::83dfd0852101eca3ba8174c9c38b4e73[]

        $curl = 'GET /_template/.monitoring-*';

        // TODO -- make assertion
    }

    /**
     * Tag:  a63906c63a8681c72d53ee0fcf2ffd35
     * Line: 30
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL30_a63906c63a8681c72d53ee0fcf2ffd35()
    {
        $client = $this->getClient();
        // tag::a63906c63a8681c72d53ee0fcf2ffd35[]
        // TODO -- Implement Example
        // PUT /_template/custom_monitoring
        // {
        //     "index_patterns": ".monitoring-*",
        //     "order": 1,
        //     "settings": {
        //         "number_of_shards": 5,
        //         "number_of_replicas": 2
        //     }
        // }
        // end::a63906c63a8681c72d53ee0fcf2ffd35[]

        $curl = 'PUT /_template/custom_monitoring'
              . '{'
              . '    "index_patterns": ".monitoring-*",'
              . '    "order": 1,'
              . '    "settings": {'
              . '        "number_of_shards": 5,'
              . '        "number_of_replicas": 2'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
