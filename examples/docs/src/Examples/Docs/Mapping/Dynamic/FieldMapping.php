<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Dynamic;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FieldMapping
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/dynamic/field-mapping.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FieldMapping extends SimpleExamplesTester {

    /**
     * Tag:  4909bf2f9e86b4bdd6af1d0b13c0015d
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_4909bf2f9e86b4bdd6af1d0b13c0015d()
    {
        $client = $this->getClient();
        // tag::4909bf2f9e86b4bdd6af1d0b13c0015d[]
        // TODO -- Implement Example
        // PUT my_index/_doc/1
        // {
        //   "create_date": "2015/09/02"
        // }
        // GET my_index/_mapping \<1>
        // end::4909bf2f9e86b4bdd6af1d0b13c0015d[]

        $curl = 'PUT my_index/_doc/1'
              . '{'
              . '  "create_date": "2015/09/02"'
              . '}'
              . 'GET my_index/_mapping \<1>';

        // TODO -- make assertion
    }

    /**
     * Tag:  95fa846e5d0a75210f9ad1fa1acfa8f3
     * Line: 68
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL68_95fa846e5d0a75210f9ad1fa1acfa8f3()
    {
        $client = $this->getClient();
        // tag::95fa846e5d0a75210f9ad1fa1acfa8f3[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "date_detection": false
        //   }
        // }
        // PUT my_index/_doc/1 \<1>
        // {
        //   "create": "2015/09/02"
        // }
        // end::95fa846e5d0a75210f9ad1fa1acfa8f3[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "date_detection": false'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1 \<1>'
              . '{'
              . '  "create": "2015/09/02"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4eae628c9aaa259f80711c6e9cc6fd25
     * Line: 91
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL91_4eae628c9aaa259f80711c6e9cc6fd25()
    {
        $client = $this->getClient();
        // tag::4eae628c9aaa259f80711c6e9cc6fd25[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_date_formats": ["MM/dd/yyyy"]
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "create_date": "09/25/2015"
        // }
        // end::4eae628c9aaa259f80711c6e9cc6fd25[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_date_formats": ["MM/dd/yyyy"]'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "create_date": "09/25/2015"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa3cd4ffaec8273656a328ae29f32c65
     * Line: 117
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL117_fa3cd4ffaec8273656a328ae29f32c65()
    {
        $client = $this->getClient();
        // tag::fa3cd4ffaec8273656a328ae29f32c65[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "numeric_detection": true
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "my_float":   "1.0", \<1>
        //   "my_integer": "1" \<2>
        // }
        // end::fa3cd4ffaec8273656a328ae29f32c65[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "numeric_detection": true'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "my_float":   "1.0", \<1>'
              . '  "my_integer": "1" \<2>'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
