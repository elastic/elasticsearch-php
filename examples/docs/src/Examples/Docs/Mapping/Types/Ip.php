<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Types;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Ip
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/types/ip.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Ip extends SimpleExamplesTester {

    /**
     * Tag:  ef38d941f9d914c095e729046a2e2d95
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_ef38d941f9d914c095e729046a2e2d95()
    {
        $client = $this->getClient();
        // tag::ef38d941f9d914c095e729046a2e2d95[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "properties": {
        //       "ip_addr": {
        //         "type": "ip"
        //       }
        //     }
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "ip_addr": "192.168.1.1"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "ip_addr": "192.168.0.0/16"
        //     }
        //   }
        // }
        // end::ef38d941f9d914c095e729046a2e2d95[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "ip_addr": {'
              . '        "type": "ip"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "ip_addr": "192.168.1.1"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "ip_addr": "192.168.0.0/16"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  96d3e3ee5d410507ca6ffb64a7e3d88e
     * Line: 83
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL83_96d3e3ee5d410507ca6ffb64a7e3d88e()
    {
        $client = $this->getClient();
        // tag::96d3e3ee5d410507ca6ffb64a7e3d88e[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "ip_addr": "192.168.0.0/16"
        //     }
        //   }
        // }
        // end::96d3e3ee5d410507ca6ffb64a7e3d88e[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "ip_addr": "192.168.0.0/16"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f880cf334c8d355edc3abf196d9a8b67
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_f880cf334c8d355edc3abf196d9a8b67()
    {
        $client = $this->getClient();
        // tag::f880cf334c8d355edc3abf196d9a8b67[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "term": {
        //       "ip_addr": "2001:db8::/48"
        //     }
        //   }
        // }
        // end::f880cf334c8d355edc3abf196d9a8b67[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "term": {'
              . '      "ip_addr": "2001:db8::/48"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  db5fe7de772a7607b8d104cc35a6bc6c
     * Line: 116
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL116_db5fe7de772a7607b8d104cc35a6bc6c()
    {
        $client = $this->getClient();
        // tag::db5fe7de772a7607b8d104cc35a6bc6c[]
        // TODO -- Implement Example
        // GET my_index/_search
        // {
        //   "query": {
        //     "query_string" : {
        //       "query": "ip_addr:\"2001:db8::/48\""
        //     }
        //   }
        // }
        // end::db5fe7de772a7607b8d104cc35a6bc6c[]

        $curl = 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "query_string" : {'
              . '      "query": "ip_addr:\"2001:db8::/48\""'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
