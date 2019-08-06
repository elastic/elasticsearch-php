<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ConcurrencyControl
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/concurrency-control.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ConcurrencyControl extends SimpleExamplesTester {

    /**
     * Tag:  cffc8b207f354beb6d76c8d334cab677
     * Line: 24
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL24_cffc8b207f354beb6d76c8d334cab677()
    {
        $client = $this->getClient();
        // tag::cffc8b207f354beb6d76c8d334cab677[]
        // TODO -- Implement Example
        // PUT products/_doc/1567
        // {
        //     "product" : "r2d2",
        //     "details" : "A resourceful astromech droid"
        // }
        // end::cffc8b207f354beb6d76c8d334cab677[]

        $curl = 'PUT products/_doc/1567'
              . '{'
              . '    "product" : "r2d2",'
              . '    "details" : "A resourceful astromech droid"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  278d5bfa1a01f91d5c84679ef1bca390
     * Line: 62
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL62_278d5bfa1a01f91d5c84679ef1bca390()
    {
        $client = $this->getClient();
        // tag::278d5bfa1a01f91d5c84679ef1bca390[]
        // TODO -- Implement Example
        // GET products/_doc/1567
        // end::278d5bfa1a01f91d5c84679ef1bca390[]

        $curl = 'GET products/_doc/1567';

        // TODO -- make assertion
    }

    /**
     * Tag:  ac24941027452bdafe82b4bd7edf9000
     * Line: 103
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL103_ac24941027452bdafe82b4bd7edf9000()
    {
        $client = $this->getClient();
        // tag::ac24941027452bdafe82b4bd7edf9000[]
        // TODO -- Implement Example
        // PUT products/_doc/1567?if_seq_no=362&if_primary_term=2
        // {
        //     "product" : "r2d2",
        //     "details" : "A resourceful astromech droid",
        //     "tags": ["droid"]
        // }
        // end::ac24941027452bdafe82b4bd7edf9000[]

        $curl = 'PUT products/_doc/1567?if_seq_no=362&if_primary_term=2'
              . '{'
              . '    "product" : "r2d2",'
              . '    "details" : "A resourceful astromech droid",'
              . '    "tags": ["droid"]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
