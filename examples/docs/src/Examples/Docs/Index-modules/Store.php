<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Index-modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Store
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   index-modules/store.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Store extends SimpleExamplesTester {

    /**
     * Tag:  509322c2cfd2bcb2f4cbfd14666e1f43
     * Line: 26
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL26_509322c2cfd2bcb2f4cbfd14666e1f43()
    {
        $client = $this->getClient();
        // tag::509322c2cfd2bcb2f4cbfd14666e1f43[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //   "settings": {
        //     "index.store.type": "niofs"
        //   }
        // }
        // end::509322c2cfd2bcb2f4cbfd14666e1f43[]

        $curl = 'PUT /my_index'
              . '{'
              . '  "settings": {'
              . '    "index.store.type": "niofs"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9ba2e779fe3e9d12ed5fca1ba3f8be97
     * Line: 116
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL116_9ba2e779fe3e9d12ed5fca1ba3f8be97()
    {
        $client = $this->getClient();
        // tag::9ba2e779fe3e9d12ed5fca1ba3f8be97[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //   "settings": {
        //     "index.store.preload": ["nvd", "dvd"]
        //   }
        // }
        // end::9ba2e779fe3e9d12ed5fca1ba3f8be97[]

        $curl = 'PUT /my_index'
              . '{'
              . '  "settings": {'
              . '    "index.store.preload": ["nvd", "dvd"]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



}
