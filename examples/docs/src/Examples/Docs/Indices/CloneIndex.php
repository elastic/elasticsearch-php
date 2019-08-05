<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CloneIndex
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/clone-index.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CloneIndex extends SimpleExamplesTester {

    /**
     * Tag:  f95b3b415480b2fb4d90e5e576f74c90
     * Line: 29
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL29_f95b3b415480b2fb4d90e5e576f74c90()
    {
        $client = $this->getClient();
        // tag::f95b3b415480b2fb4d90e5e576f74c90[]
        // TODO -- Implement Example
        // PUT my_source_index
        // {
        //   "settings": {
        //     "index.number_of_shards" : 5
        //   }
        // }
        // end::f95b3b415480b2fb4d90e5e576f74c90[]

        $curl = 'PUT my_source_index'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_shards" : 5'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  01c0e302f4fd5118faf5e34f4a010ebf
     * Line: 45
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL45_01c0e302f4fd5118faf5e34f4a010ebf()
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
     * Tag:  f17b925eace96b699996ad20ae7dd3e2
     * Line: 66
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL66_f17b925eace96b699996ad20ae7dd3e2()
    {
        $client = $this->getClient();
        // tag::f17b925eace96b699996ad20ae7dd3e2[]
        // TODO -- Implement Example
        // POST my_source_index/_clone/my_target_index
        // end::f17b925eace96b699996ad20ae7dd3e2[]

        $curl = 'POST my_source_index/_clone/my_target_index';

        // TODO -- make assertion
    }

    /**
     * Tag:  e405fe0c10af890c997d6be8d51aa940
     * Line: 93
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL93_e405fe0c10af890c997d6be8d51aa940()
    {
        $client = $this->getClient();
        // tag::e405fe0c10af890c997d6be8d51aa940[]
        // TODO -- Implement Example
        // POST my_source_index/_clone/my_target_index
        // {
        //   "settings": {
        //     "index.number_of_shards": 5 \<1>
        //   },
        //   "aliases": {
        //     "my_search_indices": {}
        //   }
        // }
        // end::e405fe0c10af890c997d6be8d51aa940[]

        $curl = 'POST my_source_index/_clone/my_target_index'
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
