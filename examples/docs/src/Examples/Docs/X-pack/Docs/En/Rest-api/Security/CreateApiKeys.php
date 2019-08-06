<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CreateApiKeys
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/security/create-api-keys.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CreateApiKeys extends SimpleExamplesTester {

    /**
     * Tag:  0c8f24166d0ce7b8792781b268b544a9
     * Line: 60
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL60_0c8f24166d0ce7b8792781b268b544a9()
    {
        $client = $this->getClient();
        // tag::0c8f24166d0ce7b8792781b268b544a9[]
        // TODO -- Implement Example
        // POST /_security/api_key
        // {
        //   "name": "my-api-key",
        //   "expiration": "1d", \<1>
        //   "role_descriptors": { \<2>
        //     "role-a": {
        //       "cluster": ["all"],
        //       "index": [
        //         {
        //           "names": ["index-a*"],
        //           "privileges": ["read"]
        //         }
        //       ]
        //     },
        //     "role-b": {
        //       "cluster": ["all"],
        //       "index": [
        //         {
        //           "names": ["index-b*"],
        //           "privileges": ["all"]
        //         }
        //       ]
        //     }
        //   }
        // }
        // end::0c8f24166d0ce7b8792781b268b544a9[]

        $curl = 'POST /_security/api_key'
              . '{'
              . '  "name": "my-api-key",'
              . '  "expiration": "1d", \<1>'
              . '  "role_descriptors": { \<2>'
              . '    "role-a": {'
              . '      "cluster": ["all"],'
              . '      "index": ['
              . '        {'
              . '          "names": ["index-a*"],'
              . '          "privileges": ["read"]'
              . '        }'
              . '      ]'
              . '    },'
              . '    "role-b": {'
              . '      "cluster": ["all"],'
              . '      "index": ['
              . '        {'
              . '          "names": ["index-b*"],'
              . '          "privileges": ["all"]'
              . '        }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
