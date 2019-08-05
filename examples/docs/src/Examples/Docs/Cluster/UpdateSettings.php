<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Cluster;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateSettings
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   cluster/update-settings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateSettings extends SimpleExamplesTester {

    /**
     * Tag:  4029af36cb3f8202549017f7378803b4
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_4029af36cb3f8202549017f7378803b4()
    {
        $client = $this->getClient();
        // tag::4029af36cb3f8202549017f7378803b4[]
        // TODO -- Implement Example
        // GET /_cluster/settings
        // end::4029af36cb3f8202549017f7378803b4[]

        $curl = 'GET /_cluster/settings';

        // TODO -- make assertion
    }

    /**
     * Tag:  37f4bd6dd220db648998fc340b3dfa69
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_37f4bd6dd220db648998fc340b3dfa69()
    {
        $client = $this->getClient();
        // tag::37f4bd6dd220db648998fc340b3dfa69[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //     "persistent" : {
        //         "indices.recovery.max_bytes_per_sec" : "50mb"
        //     }
        // }
        // end::37f4bd6dd220db648998fc340b3dfa69[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '    "persistent" : {'
              . '        "indices.recovery.max_bytes_per_sec" : "50mb"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8c05281b724106e703c05df661188c4f
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_8c05281b724106e703c05df661188c4f()
    {
        $client = $this->getClient();
        // tag::8c05281b724106e703c05df661188c4f[]
        // TODO -- Implement Example
        // PUT /_cluster/settings?flat_settings=true
        // {
        //     "transient" : {
        //         "indices.recovery.max_bytes_per_sec" : "20mb"
        //     }
        // }
        // end::8c05281b724106e703c05df661188c4f[]

        $curl = 'PUT /_cluster/settings?flat_settings=true'
              . '{'
              . '    "transient" : {'
              . '        "indices.recovery.max_bytes_per_sec" : "20mb"'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1f25c9ef11f574f1ba0ad974bf653cd4
     * Line: 67
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL67_1f25c9ef11f574f1ba0ad974bf653cd4()
    {
        $client = $this->getClient();
        // tag::1f25c9ef11f574f1ba0ad974bf653cd4[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //     "transient" : {
        //         "indices.recovery.max_bytes_per_sec" : null
        //     }
        // }
        // end::1f25c9ef11f574f1ba0ad974bf653cd4[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '    "transient" : {'
              . '        "indices.recovery.max_bytes_per_sec" : null'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  32496570a397852bece96f4da5d17a7e
     * Line: 93
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL93_32496570a397852bece96f4da5d17a7e()
    {
        $client = $this->getClient();
        // tag::32496570a397852bece96f4da5d17a7e[]
        // TODO -- Implement Example
        // PUT /_cluster/settings
        // {
        //     "transient" : {
        //         "indices.recovery.*" : null
        //     }
        // }
        // end::32496570a397852bece96f4da5d17a7e[]

        $curl = 'PUT /_cluster/settings'
              . '{'
              . '    "transient" : {'
              . '        "indices.recovery.*" : null'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
