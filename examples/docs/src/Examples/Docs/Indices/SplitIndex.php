<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SplitIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/split-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SplitIndex extends SimpleExamplesTester {

    /**
     * Tag:  76bcb71590ce6acebc8427c4ebcf9521
     * Line: 89
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL89_76bcb71590ce6acebc8427c4ebcf9521()
    {
        $client = $this->getClient();
        // tag::76bcb71590ce6acebc8427c4ebcf9521[]
        // TODO -- Implement Example
        // PUT my_source_index
        // {
        //   "settings": {
        //     "index.number_of_shards" : 1
        //   }
        // }
        // end::76bcb71590ce6acebc8427c4ebcf9521[]

        $curl = 'PUT my_source_index'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_shards" : 1'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  01c0e302f4fd5118faf5e34f4a010ebf
     * Line: 105
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL105_01c0e302f4fd5118faf5e34f4a010ebf()
    {
        $client = $this->getClient();
        // tag::01c0e302f4fd5118faf5e34f4a010ebf[]
        // TODO -- Implement Example
        // PUT /my_source_index/_settings
        // {
        //   "settings": {
        //     "index.blocks.write": true \<1>
        //   }
        // }
        // end::01c0e302f4fd5118faf5e34f4a010ebf[]

        $curl = 'PUT /my_source_index/_settings'
              . '{'
              . '  "settings": {'
              . '    "index.blocks.write": true \<1>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  290a366536875db313d1cbbed61cb9b6
     * Line: 126
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL126_290a366536875db313d1cbbed61cb9b6()
    {
        $client = $this->getClient();
        // tag::290a366536875db313d1cbbed61cb9b6[]
        // TODO -- Implement Example
        // POST my_source_index/_split/my_target_index
        // {
        //   "settings": {
        //     "index.number_of_shards": 2
        //   }
        // }
        // end::290a366536875db313d1cbbed61cb9b6[]

        $curl = 'POST my_source_index/_split/my_target_index'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_shards": 2'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d1a84808a9bca68c9bd7ede0a55a5a9f
     * Line: 161
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL161_d1a84808a9bca68c9bd7ede0a55a5a9f()
    {
        $client = $this->getClient();
        // tag::d1a84808a9bca68c9bd7ede0a55a5a9f[]
        // TODO -- Implement Example
        // POST my_source_index/_split/my_target_index
        // {
        //   "settings": {
        //     "index.number_of_shards": 5 \<1>
        //   },
        //   "aliases": {
        //     "my_search_indices": {}
        //   }
        // }
        // end::d1a84808a9bca68c9bd7ede0a55a5a9f[]

        $curl = 'POST my_source_index/_split/my_target_index'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_shards": 5 \<1>'
              . '  },'
              . '  "aliases": {'
              . '    "my_search_indices": {}'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
