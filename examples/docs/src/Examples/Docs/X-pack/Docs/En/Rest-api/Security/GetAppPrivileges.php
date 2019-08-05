<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Security;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GetAppPrivileges
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   ../../x-pack/docs/en/rest-api/security/get-app-privileges.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GetAppPrivileges extends SimpleExamplesTester {

    /**
     * Tag:  cd8006165ac64f1ef99af48e5a35a25b
     * Line: 54
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL54_cd8006165ac64f1ef99af48e5a35a25b()
    {
        $client = $this->getClient();
        // tag::cd8006165ac64f1ef99af48e5a35a25b[]
        // TODO -- Implement Example
        // GET /_security/privilege/myapp/read
        // end::cd8006165ac64f1ef99af48e5a35a25b[]

        $curl = 'GET /_security/privilege/myapp/read';

        // TODO -- make assertion
    }

    /**
     * Tag:  3b18e9de638ff0b1c7a1f1f6bf1c24f3
     * Line: 86
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL86_3b18e9de638ff0b1c7a1f1f6bf1c24f3()
    {
        $client = $this->getClient();
        // tag::3b18e9de638ff0b1c7a1f1f6bf1c24f3[]
        // TODO -- Implement Example
        // GET /_security/privilege/myapp/
        // end::3b18e9de638ff0b1c7a1f1f6bf1c24f3[]

        $curl = 'GET /_security/privilege/myapp/';

        // TODO -- make assertion
    }

    /**
     * Tag:  0ddf705317d9c5095b4a1419a2e3bace
     * Line: 94
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL94_0ddf705317d9c5095b4a1419a2e3bace()
    {
        $client = $this->getClient();
        // tag::0ddf705317d9c5095b4a1419a2e3bace[]
        // TODO -- Implement Example
        // GET /_security/privilege/
        // end::0ddf705317d9c5095b4a1419a2e3bace[]

        $curl = 'GET /_security/privilege/';

        // TODO -- make assertion
    }

// %__METHOD__%




}
