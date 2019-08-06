<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FieldNamesField
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   mapping/fields/field-names-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FieldNamesField extends SimpleExamplesTester {

    /**
     * Tag:  e4fc720e1f7f2f9a7edf48184fd4a0dd
     * Line: 24
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL24_e4fc720e1f7f2f9a7edf48184fd4a0dd()
    {
        $client = $this->getClient();
        // tag::e4fc720e1f7f2f9a7edf48184fd4a0dd[]
        // TODO -- Implement Example
        // PUT tweets
        // {
        //   "mappings": {
        //     "_field_names": {
        //       "enabled": false
        //     }
        //   }
        // }
        // end::e4fc720e1f7f2f9a7edf48184fd4a0dd[]

        $curl = 'PUT tweets'
              . '{'
              . '  "mappings": {'
              . '    "_field_names": {'
              . '      "enabled": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
