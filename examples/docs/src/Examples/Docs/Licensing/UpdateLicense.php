<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateLicense
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/update-license.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateLicense extends SimpleExamplesTester {

    /**
     * Tag:  4fb399ee372ae8837cbb9aa66be30f62
     * Line: 59
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL59_4fb399ee372ae8837cbb9aa66be30f62()
    {
        $client = $this->getClient();
        // tag::4fb399ee372ae8837cbb9aa66be30f62[]
        // TODO -- Implement Example
        // POST /_license
        // {
        //   "licenses": [
        //     {
        //       "uid":"893361dc-9749-4997-93cb-802e3d7fa4xx",
        //       "type":"basic",
        //       "issue_date_in_millis":1411948800000,
        //       "expiry_date_in_millis":1914278399999,
        //       "max_nodes":1,
        //       "issued_to":"issuedTo",
        //       "issuer":"issuer",
        //       "signature":"xx"
        //     }
        //     ]
        // }
        // end::4fb399ee372ae8837cbb9aa66be30f62[]

        $curl = 'POST /_license'
              . '{'
              . '  "licenses": ['
              . '    {'
              . '      "uid":"893361dc-9749-4997-93cb-802e3d7fa4xx",'
              . '      "type":"basic",'
              . '      "issue_date_in_millis":1411948800000,'
              . '      "expiry_date_in_millis":1914278399999,'
              . '      "max_nodes":1,'
              . '      "issued_to":"issuedTo",'
              . '      "issuer":"issuer",'
              . '      "signature":"xx"'
              . '    }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  efe30c2a1611afdc85ae522e4f5a457b
     * Line: 136
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL136_efe30c2a1611afdc85ae522e4f5a457b()
    {
        $client = $this->getClient();
        // tag::efe30c2a1611afdc85ae522e4f5a457b[]
        // TODO -- Implement Example
        // POST /_license?acknowledge=true
        // {
        //   "licenses": [
        //     {
        //       "uid":"893361dc-9749-4997-93cb-802e3d7fa4xx",
        //       "type":"basic",
        //       "issue_date_in_millis":1411948800000,
        //       "expiry_date_in_millis":1914278399999,
        //       "max_nodes":1,
        //       "issued_to":"issuedTo",
        //       "issuer":"issuer",
        //       "signature":"xx"
        //     }
        //     ]
        // }
        // end::efe30c2a1611afdc85ae522e4f5a457b[]

        $curl = 'POST /_license?acknowledge=true'
              . '{'
              . '  "licenses": ['
              . '    {'
              . '      "uid":"893361dc-9749-4997-93cb-802e3d7fa4xx",'
              . '      "type":"basic",'
              . '      "issue_date_in_millis":1411948800000,'
              . '      "expiry_date_in_millis":1914278399999,'
              . '      "max_nodes":1,'
              . '      "issued_to":"issuedTo",'
              . '      "issuer":"issuer",'
              . '      "signature":"xx"'
              . '    }'
              . '    ]'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
