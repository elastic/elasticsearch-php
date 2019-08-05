<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Clearcache
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/clearcache.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Clearcache extends SimpleExamplesTester {

    /**
     * Tag:  486eee2c8e75520f825fec08c1fbd67e
     * Line: 8
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL8_486eee2c8e75520f825fec08c1fbd67e()
    {
        $client = $this->getClient();
        // tag::486eee2c8e75520f825fec08c1fbd67e[]
        // TODO -- Implement Example
        // POST /twitter/_cache/clear
        // end::486eee2c8e75520f825fec08c1fbd67e[]

        $curl = 'POST /twitter/_cache/clear';

        // TODO -- make assertion
    }

    /**
     * Tag:  e4a86070ec20da0a7f604e17a12f482e
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_e4a86070ec20da0a7f604e17a12f482e()
    {
        $client = $this->getClient();
        // tag::e4a86070ec20da0a7f604e17a12f482e[]
        // TODO -- Implement Example
        // POST /twitter/_cache/clear?query=true      \<1>
        // POST /twitter/_cache/clear?request=true    \<2>
        // POST /twitter/_cache/clear?fielddata=true   \<3>
        // end::e4a86070ec20da0a7f604e17a12f482e[]

        $curl = 'POST /twitter/_cache/clear?query=true      \<1>'
              . 'POST /twitter/_cache/clear?request=true    \<2>'
              . 'POST /twitter/_cache/clear?fielddata=true   \<3>';

        // TODO -- make assertion
    }

    /**
     * Tag:  62069c4118d79daf9612b29659b16627
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_62069c4118d79daf9612b29659b16627()
    {
        $client = $this->getClient();
        // tag::62069c4118d79daf9612b29659b16627[]
        // TODO -- Implement Example
        // POST /twitter/_cache/clear?fields=foo,bar   \<1>
        // end::62069c4118d79daf9612b29659b16627[]

        $curl = 'POST /twitter/_cache/clear?fields=foo,bar   \<1>';

        // TODO -- make assertion
    }

    /**
     * Tag:  389d962b8aa57186c7f94b83aea16c4b
     * Line: 49
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL49_389d962b8aa57186c7f94b83aea16c4b()
    {
        $client = $this->getClient();
        // tag::389d962b8aa57186c7f94b83aea16c4b[]
        // TODO -- Implement Example
        // POST /kimchy,elasticsearch/_cache/clear
        // POST /_cache/clear
        // end::389d962b8aa57186c7f94b83aea16c4b[]

        $curl = 'POST /kimchy,elasticsearch/_cache/clear'
              . 'POST /_cache/clear';

        // TODO -- make assertion
    }

// %__METHOD__%





}
