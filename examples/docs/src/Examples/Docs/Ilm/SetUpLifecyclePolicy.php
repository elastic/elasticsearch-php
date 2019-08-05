<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SetUpLifecyclePolicy
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/set-up-lifecycle-policy.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SetUpLifecyclePolicy extends SimpleExamplesTester {

    /**
     * Tag:  7ecf197610e30c20f7206513ce393822
     * Line: 12
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL12_7ecf197610e30c20f7206513ce393822()
    {
        $client = $this->getClient();
        // tag::7ecf197610e30c20f7206513ce393822[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover": {
        //             "max_size": "25GB" \<1>
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "30d",
        //         "actions": {
        //           "delete": {} \<2>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::7ecf197610e30c20f7206513ce393822[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_size": "25GB" \<1>'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "30d",'
              . '        "actions": {'
              . '          "delete": {} \<2>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3c9d99215a7020ab478bdf5c8287a14f
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_3c9d99215a7020ab478bdf5c8287a14f()
    {
        $client = $this->getClient();
        // tag::3c9d99215a7020ab478bdf5c8287a14f[]
        // TODO -- Implement Example
        // PUT _template/my_template
        // {
        //   "index_patterns": ["test-*"], \<1>
        //   "settings": {
        //     "number_of_shards": 1,
        //     "number_of_replicas": 1,
        //     "index.lifecycle.name": "my_policy", \<2>
        //     "index.lifecycle.rollover_alias": "test-alias"
        //   }
        // }
        // end::3c9d99215a7020ab478bdf5c8287a14f[]

        $curl = 'PUT _template/my_template'
              . '{'
              . '  "index_patterns": ["test-*"], \<1>'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "number_of_replicas": 1,'
              . '    "index.lifecycle.name": "my_policy", \<2>'
              . '    "index.lifecycle.rollover_alias": "test-alias"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  25737fd456fd317cc4cc2db76b6cf28e
     * Line: 75
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL75_25737fd456fd317cc4cc2db76b6cf28e()
    {
        $client = $this->getClient();
        // tag::25737fd456fd317cc4cc2db76b6cf28e[]
        // TODO -- Implement Example
        // PUT test-000001
        // {
        //   "aliases": {
        //     "test-alias":{
        //       "is_write_index": true \<1>
        //     }
        //   }
        // }
        // end::25737fd456fd317cc4cc2db76b6cf28e[]

        $curl = 'PUT test-000001'
              . '{'
              . '  "aliases": {'
              . '    "test-alias":{'
              . '      "is_write_index": true \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  160d259243d0800900b065c4b9d2b187
     * Line: 98
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL98_160d259243d0800900b065c4b9d2b187()
    {
        $client = $this->getClient();
        // tag::160d259243d0800900b065c4b9d2b187[]
        // TODO -- Implement Example
        // PUT test-index
        // {
        //   "settings": {
        //     "number_of_shards": 1,
        //     "number_of_replicas": 1,
        //     "index.lifecycle.name": "my_policy"
        //   }
        // }
        // end::160d259243d0800900b065c4b9d2b187[]

        $curl = 'PUT test-index'
              . '{'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "number_of_replicas": 1,'
              . '    "index.lifecycle.name": "my_policy"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
