<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Params;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: EagerGlobalOrdinals
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/params/eager-global-ordinals.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class EagerGlobalOrdinals extends SimpleExamplesTester {

    /**
     * Tag:  f7682345a4e36a4c6e553902039a9410
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_f7682345a4e36a4c6e553902039a9410()
    {
        $client = $this->getClient();
        // tag::f7682345a4e36a4c6e553902039a9410[]
        // TODO -- Implement Example
        // PUT my_index/_mapping
        // {
        //   "properties": {
        //     "tags": {
        //       "type": "keyword",
        //       "eager_global_ordinals": true
        //     }
        //   }
        // }
        // end::f7682345a4e36a4c6e553902039a9410[]

        $curl = 'PUT my_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "tags": {'
              . '      "type": "keyword",'
              . '      "eager_global_ordinals": true'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9c9221059c06dd26041a95b93ec9b6df
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_9c9221059c06dd26041a95b93ec9b6df()
    {
        $client = $this->getClient();
        // tag::9c9221059c06dd26041a95b93ec9b6df[]
        // TODO -- Implement Example
        // PUT my_index/_mapping
        // {
        //   "properties": {
        //     "tags": {
        //       "type": "keyword",
        //       "eager_global_ordinals": false
        //     }
        //   }
        // }
        // end::9c9221059c06dd26041a95b93ec9b6df[]

        $curl = 'PUT my_index/_mapping'
              . '{'
              . '  "properties": {'
              . '    "tags": {'
              . '      "type": "keyword",'
              . '      "eager_global_ordinals": false'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
