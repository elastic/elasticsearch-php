<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Setup;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: LoggingConfig
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   setup/logging-config.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class LoggingConfig extends SimpleExamplesTester {

    /**
     * Tag:  8e6bfb4441ffa15c86d5dc20fa083571
     * Line: 155
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL155_8e6bfb4441ffa15c86d5dc20fa083571()
    {
        $client = $this->getClient();
        // tag::8e6bfb4441ffa15c86d5dc20fa083571[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //   "transient": {
        //     "logger.org.elasticsearch.transport": "trace"
        //   }
        // }
        // end::8e6bfb4441ffa15c86d5dc20fa083571[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '  "transient": {'
              . '    "logger.org.elasticsearch.transport": "trace"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
