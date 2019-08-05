<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Misc
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/cluster/misc.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Misc extends SimpleExamplesTester {

    /**
     * Tag:  4207219a892339e8f3abe0df8723dd27
     * Line: 79
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL79_4207219a892339e8f3abe0df8723dd27()
    {
        $client = $this->getClient();
        // tag::4207219a892339e8f3abe0df8723dd27[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //   "persistent": {
        //     "cluster.metadata.administrator": "sysadmin@example.com"
        //   }
        // }
        // end::4207219a892339e8f3abe0df8723dd27[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster.metadata.administrator": "sysadmin@example.com"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c3fa14da3d0b0f93fb59bb5386b7e776
     * Line: 120
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL120_c3fa14da3d0b0f93fb59bb5386b7e776()
    {
        $client = $this->getClient();
        // tag::c3fa14da3d0b0f93fb59bb5386b7e776[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //   "transient": {
        //     "logger.org.elasticsearch.indices.recovery": "DEBUG"
        //   }
        // }
        // end::c3fa14da3d0b0f93fb59bb5386b7e776[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '  "transient": {'
              . '    "logger.org.elasticsearch.indices.recovery": "DEBUG"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
