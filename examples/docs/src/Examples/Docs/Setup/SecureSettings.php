<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Setup;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SecureSettings
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   setup/secure-settings.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SecureSettings extends SimpleExamplesTester {

    /**
     * Tag:  6e87271a5a10dbb8d27b25c7dbfa868a
     * Line: 108
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL108_6e87271a5a10dbb8d27b25c7dbfa868a()
    {
        $client = $this->getClient();
        // tag::6e87271a5a10dbb8d27b25c7dbfa868a[]
        // TODO -- Implement Example
        // POST _nodes/reload_secure_settings
        // end::6e87271a5a10dbb8d27b25c7dbfa868a[]

        $curl = 'POST _nodes/reload_secure_settings';

        // TODO -- make assertion
    }

// %__METHOD__%


}
