<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IdField
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/fields/id-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IdField extends SimpleExamplesTester {

    /**
     * Tag:  3abdbdc99e203e87332d387cfbdeafaa
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_3abdbdc99e203e87332d387cfbdeafaa()
    {
        $client = $this->getClient();
        // tag::3abdbdc99e203e87332d387cfbdeafaa[]
        // TODO -- Implement Example
        // # Example documents
        // PUT my_index/_doc/1
        // {
        //   "text": "Document with ID 1"
        // }
        // PUT my_index/_doc/2&refresh=true
        // {
        //   "text": "Document with ID 2"
        // }
        // GET my_index/_search
        // {
        //   "query": {
        //     "terms": {
        //       "_id": [ "1", "2" ] \<1>
        //     }
        //   }
        // }
        // end::3abdbdc99e203e87332d387cfbdeafaa[]

        $curl = '# Example documents'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "text": "Document with ID 1"'
              . '}'
              . 'PUT my_index/_doc/2&refresh=true'
              . '{'
              . '  "text": "Document with ID 2"'
              . '}'
              . 'GET my_index/_search'
              . '{'
              . '  "query": {'
              . '    "terms": {'
              . '      "_id": [ "1", "2" ] \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
