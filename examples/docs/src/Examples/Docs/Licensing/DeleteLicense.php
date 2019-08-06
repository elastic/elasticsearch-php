<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Licensing;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DeleteLicense
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   licensing/delete-license.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DeleteLicense extends SimpleExamplesTester {

    /**
     * Tag:  4f8a4ad49e2bca6784c88ede18a1a709
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_4f8a4ad49e2bca6784c88ede18a1a709()
    {
        $client = $this->getClient();
        // tag::4f8a4ad49e2bca6784c88ede18a1a709[]
        // TODO -- Implement Example
        // DELETE /_license
        // end::4f8a4ad49e2bca6784c88ede18a1a709[]

        $curl = 'DELETE /_license';

        // TODO -- make assertion
    }

// %__METHOD__%


}
