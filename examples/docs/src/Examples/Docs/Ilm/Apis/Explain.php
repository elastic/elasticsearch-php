<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Explain
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/apis/explain.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Explain extends SimpleExamplesTester {

    /**
     * Tag:  0f6fa3a706a7c17858d3dbe329839ea6
     * Line: 92
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL92_0f6fa3a706a7c17858d3dbe329839ea6()
    {
        $client = $this->getClient();
        // tag::0f6fa3a706a7c17858d3dbe329839ea6[]
        // TODO -- Implement Example
        // GET my_index/_ilm/explain
        // end::0f6fa3a706a7c17858d3dbe329839ea6[]

        $curl = 'GET my_index/_ilm/explain';

        // TODO -- make assertion
    }

    /**
     * Tag:  bc42b1c517ff1fc6ad4371bae23d1c57
     * Line: 102
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL102_bc42b1c517ff1fc6ad4371bae23d1c57()
    {
        $client = $this->getClient();
        // tag::bc42b1c517ff1fc6ad4371bae23d1c57[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "my_index": {
        //       "index": "my_index",
        //       "managed": true, \<1>
        //       "policy": "my_policy", \<2>
        //       "lifecycle_date_millis": 1538475653281, \<3>
        //       "age": "15s", \<4>
        //       "phase": "new",
        //       "phase_time_millis": 1538475653317, \<5>
        //       "action": "complete",
        //       "action_time_millis": 1538475653317, \<6>
        //       "step": "complete",
        //       "step_time_millis": 1538475653317 \<7>
        //     }
        //   }
        // }
        // end::bc42b1c517ff1fc6ad4371bae23d1c57[]

        $curl = '{'
              . '  "indices": {'
              . '    "my_index": {'
              . '      "index": "my_index",'
              . '      "managed": true, \<1>'
              . '      "policy": "my_policy", \<2>'
              . '      "lifecycle_date_millis": 1538475653281, \<3>'
              . '      "age": "15s", \<4>'
              . '      "phase": "new",'
              . '      "phase_time_millis": 1538475653317, \<5>'
              . '      "action": "complete",'
              . '      "action_time_millis": 1538475653317, \<6>'
              . '      "step": "complete",'
              . '      "step_time_millis": 1538475653317 \<7>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9cf677738535149f0cdb1796ddafbc8a
     * Line: 138
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL138_9cf677738535149f0cdb1796ddafbc8a()
    {
        $client = $this->getClient();
        // tag::9cf677738535149f0cdb1796ddafbc8a[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "test-000069": {
        //       "index": "test-000069",
        //       "managed": true,
        //       "policy": "my_lifecycle3",
        //       "lifecycle_date_millis": 1538475653281,
        //       "lifecycle_date": "2018-10-15T13:45:21.981Z",
        //       "age": "25.14s",
        //       "phase": "hot",
        //       "phase_time_millis": 1538475653317,
        //       "phase_time": "2018-10-15T13:45:22.577Z",
        //       "action": "rollover",
        //       "action_time_millis": 1538475653317,
        //       "action_time": "2018-10-15T13:45:22.577Z",
        //       "step": "attempt-rollover",
        //       "step_time_millis": 1538475653317,
        //       "step_time": "2018-10-15T13:45:22.577Z",
        //       "phase_execution": {
        //         "policy": "my_lifecycle3",
        //         "phase_definition": { \<1>
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_age": "30s"
        //             }
        //           }
        //         },
        //         "version": 3, \<2>
        //         "modified_date": "2018-10-15T13:21:41.576Z", \<3>
        //         "modified_date_in_millis": 1539609701576 \<4>
        //       }
        //     }
        //   }
        // }
        // end::9cf677738535149f0cdb1796ddafbc8a[]

        $curl = '{'
              . '  "indices": {'
              . '    "test-000069": {'
              . '      "index": "test-000069",'
              . '      "managed": true,'
              . '      "policy": "my_lifecycle3",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "lifecycle_date": "2018-10-15T13:45:21.981Z",'
              . '      "age": "25.14s",'
              . '      "phase": "hot",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "phase_time": "2018-10-15T13:45:22.577Z",'
              . '      "action": "rollover",'
              . '      "action_time_millis": 1538475653317,'
              . '      "action_time": "2018-10-15T13:45:22.577Z",'
              . '      "step": "attempt-rollover",'
              . '      "step_time_millis": 1538475653317,'
              . '      "step_time": "2018-10-15T13:45:22.577Z",'
              . '      "phase_execution": {'
              . '        "policy": "my_lifecycle3",'
              . '        "phase_definition": { \<1>'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_age": "30s"'
              . '            }'
              . '          }'
              . '        },'
              . '        "version": 3, \<2>'
              . '        "modified_date": "2018-10-15T13:21:41.576Z", \<3>'
              . '        "modified_date_in_millis": 1539609701576 \<4>'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0a6dcb918e7d6354c4709505f22a786f
     * Line: 187
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL187_0a6dcb918e7d6354c4709505f22a786f()
    {
        $client = $this->getClient();
        // tag::0a6dcb918e7d6354c4709505f22a786f[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "test-000020": {
        //       "index": "test-000020",
        //       "managed": true,
        //       "policy": "my_lifecycle3",
        //       "lifecycle_date_millis": 1538475653281,
        //       "lifecycle_date": "2018-10-15T13:45:21.981Z",
        //       "age": "4.12m",
        //       "phase": "warm",
        //       "phase_time_millis": 1538475653317,
        //       "phase_time": "2018-10-15T13:45:22.577Z",
        //       "action": "allocate",
        //       "action_time_millis": 1538475653317,
        //       "action_time": "2018-10-15T13:45:22.577Z",
        //       "step": "check-allocation",
        //       "step_time_millis": 1538475653317,
        //       "step_time": "2018-10-15T13:45:22.577Z",
        //       "step_info": { \<1>
        //         "message": "Waiting for all shard copies to be active",
        //         "shards_left_to_allocate": -1,
        //         "all_shards_active": false,
        //         "actual_replicas": 2
        //       },
        //       "phase_execution": {
        //         "policy": "my_lifecycle3",
        //         "phase_definition": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "allocate": {
        //               "number_of_replicas": 2,
        //               "include": {
        //                 "box_type": "warm"
        //               },
        //               "exclude": {},
        //               "require": {}
        //             },
        //             "forcemerge": {
        //               "max_num_segments": 1
        //             }
        //           }
        //         },
        //         "version": 2,
        //         "modified_date": "2018-10-15T13:20:02.489Z",
        //         "modified_date_in_millis": 1539609602489
        //       }
        //     }
        //   }
        // }
        // end::0a6dcb918e7d6354c4709505f22a786f[]

        $curl = '{'
              . '  "indices": {'
              . '    "test-000020": {'
              . '      "index": "test-000020",'
              . '      "managed": true,'
              . '      "policy": "my_lifecycle3",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "lifecycle_date": "2018-10-15T13:45:21.981Z",'
              . '      "age": "4.12m",'
              . '      "phase": "warm",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "phase_time": "2018-10-15T13:45:22.577Z",'
              . '      "action": "allocate",'
              . '      "action_time_millis": 1538475653317,'
              . '      "action_time": "2018-10-15T13:45:22.577Z",'
              . '      "step": "check-allocation",'
              . '      "step_time_millis": 1538475653317,'
              . '      "step_time": "2018-10-15T13:45:22.577Z",'
              . '      "step_info": { \<1>'
              . '        "message": "Waiting for all shard copies to be active",'
              . '        "shards_left_to_allocate": -1,'
              . '        "all_shards_active": false,'
              . '        "actual_replicas": 2'
              . '      },'
              . '      "phase_execution": {'
              . '        "policy": "my_lifecycle3",'
              . '        "phase_definition": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "allocate": {'
              . '              "number_of_replicas": 2,'
              . '              "include": {'
              . '                "box_type": "warm"'
              . '              },'
              . '              "exclude": {},'
              . '              "require": {}'
              . '            },'
              . '            "forcemerge": {'
              . '              "max_num_segments": 1'
              . '            }'
              . '          }'
              . '        },'
              . '        "version": 2,'
              . '        "modified_date": "2018-10-15T13:20:02.489Z",'
              . '        "modified_date_in_millis": 1539609602489'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f5fc9eb5e7300853a3b93236c72e70e3
     * Line: 248
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL248_f5fc9eb5e7300853a3b93236c72e70e3()
    {
        $client = $this->getClient();
        // tag::f5fc9eb5e7300853a3b93236c72e70e3[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "test-000056": {
        //       "index": "test-000056",
        //       "managed": true,
        //       "policy": "my_lifecycle3",
        //       "lifecycle_date_millis": 1538475653281,
        //       "lifecycle_date": "2018-10-15T13:45:21.981Z",
        //       "age": "50.1d",
        //       "phase": "hot",
        //       "phase_time_millis": 1538475653317,
        //       "phase_time": "2018-10-15T13:45:22.577Z",
        //       "action": "rollover",
        //       "action_time_millis": 1538475653317,
        //       "action_time": "2018-10-15T13:45:22.577Z",
        //       "step": "ERROR",
        //       "step_time_millis": 1538475653317,
        //       "step_time": "2018-10-15T13:45:22.577Z",
        //       "failed_step": "attempt-rollover", \<1>
        //       "step_info": { \<2>
        //         "type": "resource_already_exists_exception",
        //         "reason": "index [test-000057/H7lF9n36Rzqa-KfKcnGQMg] already exists",
        //         "index_uuid": "H7lF9n36Rzqa-KfKcnGQMg",
        //         "index": "test-000057"
        //       },
        //       "phase_execution": {
        //         "policy": "my_lifecycle3",
        //         "phase_definition": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_age": "30s"
        //             }
        //           }
        //         },
        //         "version": 3,
        //         "modified_date": "2018-10-15T13:21:41.576Z",
        //         "modified_date_in_millis": 1539609701576
        //       }
        //     }
        //   }
        // }
        // end::f5fc9eb5e7300853a3b93236c72e70e3[]

        $curl = '{'
              . '  "indices": {'
              . '    "test-000056": {'
              . '      "index": "test-000056",'
              . '      "managed": true,'
              . '      "policy": "my_lifecycle3",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "lifecycle_date": "2018-10-15T13:45:21.981Z",'
              . '      "age": "50.1d",'
              . '      "phase": "hot",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "phase_time": "2018-10-15T13:45:22.577Z",'
              . '      "action": "rollover",'
              . '      "action_time_millis": 1538475653317,'
              . '      "action_time": "2018-10-15T13:45:22.577Z",'
              . '      "step": "ERROR",'
              . '      "step_time_millis": 1538475653317,'
              . '      "step_time": "2018-10-15T13:45:22.577Z",'
              . '      "failed_step": "attempt-rollover", \<1>'
              . '      "step_info": { \<2>'
              . '        "type": "resource_already_exists_exception",'
              . '        "reason": "index [test-000057/H7lF9n36Rzqa-KfKcnGQMg] already exists",'
              . '        "index_uuid": "H7lF9n36Rzqa-KfKcnGQMg",'
              . '        "index": "test-000057"'
              . '      },'
              . '      "phase_execution": {'
              . '        "policy": "my_lifecycle3",'
              . '        "phase_definition": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_age": "30s"'
              . '            }'
              . '          }'
              . '        },'
              . '        "version": 3,'
              . '        "modified_date": "2018-10-15T13:21:41.576Z",'
              . '        "modified_date_in_millis": 1539609701576'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
