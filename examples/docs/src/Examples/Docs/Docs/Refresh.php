<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Refresh
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/refresh.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Refresh extends SimpleExamplesTester {

    /**
     * Tag:  92d343eb755971c44a939d0660bf5ac2
     * Line: 87
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL87_92d343eb755971c44a939d0660bf5ac2()
    {
        $client = $this->getClient();
        // tag::92d343eb755971c44a939d0660bf5ac2[]
        // TODO -- Implement Example
        // PUT /test/_doc/1?refresh
        // {"test": "test"}
        // PUT /test/_doc/2?refresh=true
        // {"test": "test"}
        // end::92d343eb755971c44a939d0660bf5ac2[]

        $curl = 'PUT /test/_doc/1?refresh'
              . '{"test": "test"}'
              . 'PUT /test/_doc/2?refresh=true'
              . '{"test": "test"}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1070e59ba144cdf309fd9b2591612b95
     * Line: 99
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL99_1070e59ba144cdf309fd9b2591612b95()
    {
        $client = $this->getClient();
        // tag::1070e59ba144cdf309fd9b2591612b95[]
        // TODO -- Implement Example
        // PUT /test/_doc/3
        // {"test": "test"}
        // PUT /test/_doc/4?refresh=false
        // {"test": "test"}
        // end::1070e59ba144cdf309fd9b2591612b95[]

        $curl = 'PUT /test/_doc/3'
              . '{"test": "test"}'
              . 'PUT /test/_doc/4?refresh=false'
              . '{"test": "test"}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e4b2b5e0aaedf3cbbcde3d61eb1f13fc
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_e4b2b5e0aaedf3cbbcde3d61eb1f13fc()
    {
        $client = $this->getClient();
        // tag::e4b2b5e0aaedf3cbbcde3d61eb1f13fc[]
        // TODO -- Implement Example
        // PUT /test/_doc/4?refresh=wait_for
        // {"test": "test"}
        // end::e4b2b5e0aaedf3cbbcde3d61eb1f13fc[]

        $curl = 'PUT /test/_doc/4?refresh=wait_for'
              . '{"test": "test"}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
