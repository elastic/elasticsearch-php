<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Transport
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/transport.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Transport extends SimpleExamplesTester {

    /**
     * Tag:  939e79dee613238f9512fb9cbf0be816
     * Line: 140
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL140_939e79dee613238f9512fb9cbf0be816()
    {
        $client = $this->getClient();
        // tag::939e79dee613238f9512fb9cbf0be816[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //    "transient" : {
        //       "logger.org.elasticsearch.transport.TransportService.tracer" : "TRACE"
        //    }
        // }
        // end::939e79dee613238f9512fb9cbf0be816[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '   "transient" : {'
              . '      "logger.org.elasticsearch.transport.TransportService.tracer" : "TRACE"'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cecbbd7b4ec1bf82fd84ae96099febcc
     * Line: 154
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL154_cecbbd7b4ec1bf82fd84ae96099febcc()
    {
        $client = $this->getClient();
        // tag::cecbbd7b4ec1bf82fd84ae96099febcc[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //    "transient" : {
        //       "transport.tracer.include" : "*",
        //       "transport.tracer.exclude" : "internal:coordination/fault_detection/*"
        //    }
        // }
        // end::cecbbd7b4ec1bf82fd84ae96099febcc[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '   "transient" : {'
              . '      "transport.tracer.include" : "*",'
              . '      "transport.tracer.exclude" : "internal:coordination/fault_detection/*"'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
