<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Fields;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MetaField
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/fields/meta-field.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MetaField extends SimpleExamplesTester {

    /**
     * Tag:  e10d7f411744eb1d5ddaa2f70a368490
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_e10d7f411744eb1d5ddaa2f70a368490()
    {
        $client = $this->getClient();
        // tag::e10d7f411744eb1d5ddaa2f70a368490[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "_meta": { \<1>
        //       "class": "MyApp::User",
        //       "version": {
        //         "min": "1.0",
        //         "max": "1.3"
        //       }
        //     }
        //   }
        // }
        // end::e10d7f411744eb1d5ddaa2f70a368490[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "_meta": { \<1>'
              . '      "class": "MyApp::User",'
              . '      "version": {'
              . '        "min": "1.0",'
              . '        "max": "1.3"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  019eab381444c3d77ad3bb4e39edfac6
     * Line: 31
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL31_019eab381444c3d77ad3bb4e39edfac6()
    {
        $client = $this->getClient();
        // tag::019eab381444c3d77ad3bb4e39edfac6[]
        // TODO -- Implement Example
        // PUT my_index/_mapping
        // {
        //   "_meta": {
        //     "class": "MyApp2::User3",
        //     "version": {
        //       "min": "1.3",
        //       "max": "1.5"
        //     }
        //   }
        // }
        // end::019eab381444c3d77ad3bb4e39edfac6[]

        $curl = 'PUT my_index/_mapping'
              . '{'
              . '  "_meta": {'
              . '    "class": "MyApp2::User3",'
              . '    "version": {'
              . '      "min": "1.3",'
              . '      "max": "1.5"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
