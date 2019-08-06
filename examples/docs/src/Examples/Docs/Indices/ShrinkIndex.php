<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ShrinkIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/shrink-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ShrinkIndex extends SimpleExamplesTester {

    /**
     * Tag:  5e93f806cfd459149222b443b7992a51
     * Line: 38
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL38_5e93f806cfd459149222b443b7992a51()
    {
        $client = $this->getClient();
        // tag::5e93f806cfd459149222b443b7992a51[]
        // TODO -- Implement Example
        // PUT /my_source_index/_settings
        // {
        //   "settings": {
        //     "index.routing.allocation.require._name": "shrink_node_name", \<1>
        //     "index.blocks.write": true \<2>
        //   }
        // }
        // end::5e93f806cfd459149222b443b7992a51[]

        $curl = 'PUT /my_source_index/_settings'
              . '{'
              . '  "settings": {'
              . '    "index.routing.allocation.require._name": "shrink_node_name", \<1>'
              . '    "index.blocks.write": true \<2>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0c44dc55c06e882de2947b5e9fa78acc
     * Line: 67
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL67_0c44dc55c06e882de2947b5e9fa78acc()
    {
        $client = $this->getClient();
        // tag::0c44dc55c06e882de2947b5e9fa78acc[]
        // TODO -- Implement Example
        // POST my_source_index/_shrink/my_target_index
        // {
        //   "settings": {
        //     "index.routing.allocation.require._name": null, \<1>
        //     "index.blocks.write": null \<2>
        //   }
        // }
        // end::0c44dc55c06e882de2947b5e9fa78acc[]

        $curl = 'POST my_source_index/_shrink/my_target_index'
              . '{'
              . '  "settings": {'
              . '    "index.routing.allocation.require._name": null, \<1>'
              . '    "index.blocks.write": null \<2>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  324a946abc2c86b5a71dd5cec6c765b3
     * Line: 111
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL111_324a946abc2c86b5a71dd5cec6c765b3()
    {
        $client = $this->getClient();
        // tag::324a946abc2c86b5a71dd5cec6c765b3[]
        // TODO -- Implement Example
        // POST my_source_index/_shrink/my_target_index
        // {
        //   "settings": {
        //     "index.number_of_replicas": 1,
        //     "index.number_of_shards": 1, \<1>
        //     "index.codec": "best_compression" \<2>
        //   },
        //   "aliases": {
        //     "my_search_indices": {}
        //   }
        // }
        // end::324a946abc2c86b5a71dd5cec6c765b3[]

        $curl = 'POST my_source_index/_shrink/my_target_index'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_replicas": 1,'
              . '    "index.number_of_shards": 1, \<1>'
              . '    "index.codec": "best_compression" \<2>'
              . '  },'
              . '  "aliases": {'
              . '    "my_search_indices": {}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
