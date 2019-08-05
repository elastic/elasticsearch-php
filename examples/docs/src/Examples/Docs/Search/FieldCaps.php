<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FieldCaps
 *
 * Date: 2019-08-05 08:49:20
 *
 * @source   search/field-caps.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FieldCaps extends SimpleExamplesTester {

    /**
     * Tag:  8025830e885c7c0820157e399154a5e0
     * Line: 9
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL9_8025830e885c7c0820157e399154a5e0()
    {
        $client = $this->getClient();
        // tag::8025830e885c7c0820157e399154a5e0[]
        // TODO -- Implement Example
        // GET _field_caps?fields=rating
        // end::8025830e885c7c0820157e399154a5e0[]

        $curl = 'GET _field_caps?fields=rating';

        // TODO -- make assertion
    }

    /**
     * Tag:  614bd49400b6ebf47c5b12839dd1ecb8
     * Line: 17
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL17_614bd49400b6ebf47c5b12839dd1ecb8()
    {
        $client = $this->getClient();
        // tag::614bd49400b6ebf47c5b12839dd1ecb8[]
        // TODO -- Implement Example
        // GET twitter/_field_caps?fields=rating
        // end::614bd49400b6ebf47c5b12839dd1ecb8[]

        $curl = 'GET twitter/_field_caps?fields=rating';

        // TODO -- make assertion
    }

    /**
     * Tag:  a985e6b7b2ead9c3f30a9bc97d8b598e
     * Line: 65
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL65_a985e6b7b2ead9c3f30a9bc97d8b598e()
    {
        $client = $this->getClient();
        // tag::a985e6b7b2ead9c3f30a9bc97d8b598e[]
        // TODO -- Implement Example
        // GET _field_caps?fields=rating,title
        // end::a985e6b7b2ead9c3f30a9bc97d8b598e[]

        $curl = 'GET _field_caps?fields=rating,title';

        // TODO -- make assertion
    }

    /**
     * Tag:  4e931cfac74e46e221cf4a9ab88a182d
     * Line: 114
     * Date: 2019-08-05 08:49:20
     */
    public function testExampleL114_4e931cfac74e46e221cf4a9ab88a182d()
    {
        $client = $this->getClient();
        // tag::4e931cfac74e46e221cf4a9ab88a182d[]
        // TODO -- Implement Example
        // GET _field_caps?fields=rating,title&include_unmapped
        // end::4e931cfac74e46e221cf4a9ab88a182d[]

        $curl = 'GET _field_caps?fields=rating,title&include_unmapped';

        // TODO -- make assertion
    }

// %__METHOD__%





}
