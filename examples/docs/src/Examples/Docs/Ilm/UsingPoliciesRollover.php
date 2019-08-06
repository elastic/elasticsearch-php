<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UsingPoliciesRollover
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/using-policies-rollover.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UsingPoliciesRollover extends SimpleExamplesTester {

    /**
     * Tag:  aed01ec7b6368fa2c8f86434e176c907
     * Line: 59
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL59_aed01ec7b6368fa2c8f86434e176c907()
    {
        $client = $this->getClient();
        // tag::aed01ec7b6368fa2c8f86434e176c907[]
        // TODO -- Implement Example
        // PUT /_ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover": {
        //             "max_size": "25GB"
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "30d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::aed01ec7b6368fa2c8f86434e176c907[]

        $curl = 'PUT /_ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_size": "25GB"'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "30d",'
              . '        "actions": {'
              . '          "delete": {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f29c02d259065033bd557519d1b21481
     * Line: 88
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL88_f29c02d259065033bd557519d1b21481()
    {
        $client = $this->getClient();
        // tag::f29c02d259065033bd557519d1b21481[]
        // TODO -- Implement Example
        // PUT _template/my_template
        // {
        //   "index_patterns": ["test-*"], \<1>
        //   "settings": {
        //     "number_of_shards": 1,
        //     "number_of_replicas": 1,
        //     "index.lifecycle.name": "my_policy", \<2>
        //     "index.lifecycle.rollover_alias": "test-alias" \<3>
        //   }
        // }
        // end::f29c02d259065033bd557519d1b21481[]

        $curl = 'PUT _template/my_template'
              . '{'
              . '  "index_patterns": ["test-*"], \<1>'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "number_of_replicas": 1,'
              . '    "index.lifecycle.name": "my_policy", \<2>'
              . '    "index.lifecycle.rollover_alias": "test-alias" \<3>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  454e0e11e2bbb4718109a53662f8c45d
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_454e0e11e2bbb4718109a53662f8c45d()
    {
        $client = $this->getClient();
        // tag::454e0e11e2bbb4718109a53662f8c45d[]
        // TODO -- Implement Example
        // PUT test-000001 \<1>
        // {
        //   "aliases": {
        //     "test-alias":{
        //       "is_write_index": true \<2>
        //     }
        //   }
        // }
        // end::454e0e11e2bbb4718109a53662f8c45d[]

        $curl = 'PUT test-000001 \<1>'
              . '{'
              . '  "aliases": {'
              . '    "test-alias":{'
              . '      "is_write_index": true \<2>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
