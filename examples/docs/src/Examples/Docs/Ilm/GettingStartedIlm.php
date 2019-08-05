<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GettingStartedIlm
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/getting-started-ilm.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GettingStartedIlm extends SimpleExamplesTester {

    /**
     * Tag:  993a81c69d26d94810172bee4043f0fd
     * Line: 29
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL29_993a81c69d26d94810172bee4043f0fd()
    {
        $client = $this->getClient();
        // tag::993a81c69d26d94810172bee4043f0fd[]
        // TODO -- Implement Example
        // PUT _ilm/policy/datastream_policy   \<1>
        // {
        //   "policy": {                       \<2>
        //     "phases": {
        //       "hot": {                      \<3>
        //         "actions": {
        //           "rollover": {             \<4>
        //             "max_size": "50GB",
        //             "max_age": "30d"
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "90d",           \<5>
        //         "actions": {
        //           "delete": {}              \<6>
        //         }
        //       }
        //     }
        //   }
        // }
        // end::993a81c69d26d94810172bee4043f0fd[]

        $curl = 'PUT _ilm/policy/datastream_policy   \<1>'
              . '{'
              . '  "policy": {                       \<2>'
              . '    "phases": {'
              . '      "hot": {                      \<3>'
              . '        "actions": {'
              . '          "rollover": {             \<4>'
              . '            "max_size": "50GB",'
              . '            "max_age": "30d"'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "90d",           \<5>'
              . '        "actions": {'
              . '          "delete": {}              \<6>'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e3d7b19f993382750719cdfaad2fdd90
     * Line: 80
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL80_e3d7b19f993382750719cdfaad2fdd90()
    {
        $client = $this->getClient();
        // tag::e3d7b19f993382750719cdfaad2fdd90[]
        // TODO -- Implement Example
        // PUT _template/datastream_template
        // {
        //   "index_patterns": ["datastream-*"],                 \<1>
        //   "settings": {
        //     "number_of_shards": 1,
        //     "number_of_replicas": 1,
        //     "index.lifecycle.name": "datastream_policy",      \<2>
        //     "index.lifecycle.rollover_alias": "datastream"    \<3>
        //   }
        // }
        // end::e3d7b19f993382750719cdfaad2fdd90[]

        $curl = 'PUT _template/datastream_template'
              . '{'
              . '  "index_patterns": ["datastream-*"],                 \<1>'
              . '  "settings": {'
              . '    "number_of_shards": 1,'
              . '    "number_of_replicas": 1,'
              . '    "index.lifecycle.name": "datastream_policy",      \<2>'
              . '    "index.lifecycle.rollover_alias": "datastream"    \<3>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  55ee835d7c28e933ad8fcb9e45af2bf2
     * Line: 113
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL113_55ee835d7c28e933ad8fcb9e45af2bf2()
    {
        $client = $this->getClient();
        // tag::55ee835d7c28e933ad8fcb9e45af2bf2[]
        // TODO -- Implement Example
        // PUT datastream-000001
        // {
        //   "aliases": {
        //     "datastream": {
        //       "is_write_index": true
        //     }
        //   }
        // }
        // end::55ee835d7c28e933ad8fcb9e45af2bf2[]

        $curl = 'PUT datastream-000001'
              . '{'
              . '  "aliases": {'
              . '    "datastream": {'
              . '      "is_write_index": true'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a1dbaff15cf8166f74c443ca58258d7e
     * Line: 157
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL157_a1dbaff15cf8166f74c443ca58258d7e()
    {
        $client = $this->getClient();
        // tag::a1dbaff15cf8166f74c443ca58258d7e[]
        // TODO -- Implement Example
        // GET datastream-*/_ilm/explain
        // end::a1dbaff15cf8166f74c443ca58258d7e[]

        $curl = 'GET datastream-*/_ilm/explain';

        // TODO -- make assertion
    }

    /**
     * Tag:  c0f09a2304109757010e08c8af1f4a5a
     * Line: 168
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL168_c0f09a2304109757010e08c8af1f4a5a()
    {
        $client = $this->getClient();
        // tag::c0f09a2304109757010e08c8af1f4a5a[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "datastream-000001": {
        //       "index": "datastream-000001",
        //       "managed": true,                           \<1>
        //       "policy": "datastream_policy",             \<2>
        //       "lifecycle_date_millis": 1538475653281,
        //       "age": "30s",                              \<3>
        //       "phase": "hot",                            \<4>
        //       "phase_time_millis": 1538475653317,
        //       "action": "rollover",                      \<5>
        //       "action_time_millis": 1538475653317,
        //       "step": "attempt-rollover",                \<6>
        //       "step_time_millis": 1538475653317,
        //       "phase_execution": {
        //         "policy": "datastream_policy",
        //         "phase_definition": {                    \<7>
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_size": "50gb",
        //               "max_age": "30d"
        //             }
        //           }
        //         },
        //         "version": 1,                            \<8>
        //         "modified_date_in_millis": 1539609701576
        //       }
        //     }
        //   }
        // }
        // end::c0f09a2304109757010e08c8af1f4a5a[]

        $curl = '{'
              . '  "indices": {'
              . '    "datastream-000001": {'
              . '      "index": "datastream-000001",'
              . '      "managed": true,                           \<1>'
              . '      "policy": "datastream_policy",             \<2>'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "age": "30s",                              \<3>'
              . '      "phase": "hot",                            \<4>'
              . '      "phase_time_millis": 1538475653317,'
              . '      "action": "rollover",                      \<5>'
              . '      "action_time_millis": 1538475653317,'
              . '      "step": "attempt-rollover",                \<6>'
              . '      "step_time_millis": 1538475653317,'
              . '      "phase_execution": {'
              . '        "policy": "datastream_policy",'
              . '        "phase_definition": {                    \<7>'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_size": "50gb",'
              . '              "max_age": "30d"'
              . '            }'
              . '          }'
              . '        },'
              . '        "version": 1,                            \<8>'
              . '        "modified_date_in_millis": 1539609701576'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
