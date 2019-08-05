<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Segments
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/segments.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Segments extends SimpleExamplesTester {

    /**
     * Tag:  940e8c2c7ff92d71f489bdb7183c1ce6
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_940e8c2c7ff92d71f489bdb7183c1ce6()
    {
        $client = $this->getClient();
        // tag::940e8c2c7ff92d71f489bdb7183c1ce6[]
        // TODO -- Implement Example
        // GET /test/_segments
        // end::940e8c2c7ff92d71f489bdb7183c1ce6[]

        $curl = 'GET /test/_segments';

        // TODO -- make assertion
    }

    /**
     * Tag:  975b4b92464d52068516aa2f0f955cc1
     * Line: 22
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL22_975b4b92464d52068516aa2f0f955cc1()
    {
        $client = $this->getClient();
        // tag::975b4b92464d52068516aa2f0f955cc1[]
        // TODO -- Implement Example
        // GET /test1,test2/_segments
        // end::975b4b92464d52068516aa2f0f955cc1[]

        $curl = 'GET /test1,test2/_segments';

        // TODO -- make assertion
    }

    /**
     * Tag:  6414b9276ba1c63898c3ff5cbe03c54e
     * Line: 31
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL31_6414b9276ba1c63898c3ff5cbe03c54e()
    {
        $client = $this->getClient();
        // tag::6414b9276ba1c63898c3ff5cbe03c54e[]
        // TODO -- Implement Example
        // GET /_segments
        // end::6414b9276ba1c63898c3ff5cbe03c54e[]

        $curl = 'GET /_segments';

        // TODO -- make assertion
    }

    /**
     * Tag:  1b21d886f6e9619c73079d14581ccbe4
     * Line: 129
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL129_1b21d886f6e9619c73079d14581ccbe4()
    {
        $client = $this->getClient();
        // tag::1b21d886f6e9619c73079d14581ccbe4[]
        // TODO -- Implement Example
        // GET /test/_segments?verbose=true
        // end::1b21d886f6e9619c73079d14581ccbe4[]

        $curl = 'GET /test/_segments?verbose=true';

        // TODO -- make assertion
    }

// %__METHOD__%





}
