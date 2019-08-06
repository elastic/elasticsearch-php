<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UpdateLifecyclePolicy
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/update-lifecycle-policy.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UpdateLifecyclePolicy extends SimpleExamplesTester {

    /**
     * Tag:  0c44088f251488432966131135f1bd1c
     * Line: 29
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL29_0c44088f251488432966131135f1bd1c()
    {
        $client = $this->getClient();
        // tag::0c44088f251488432966131135f1bd1c[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
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
        // end::0c44088f251488432966131135f1bd1c[]

        $curl = 'PUT _ilm/policy/my_policy'
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
     * Tag:  2c37ed0b33658d73a712e7942ea7433a
     * Line: 61
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL61_2c37ed0b33658d73a712e7942ea7433a()
    {
        $client = $this->getClient();
        // tag::2c37ed0b33658d73a712e7942ea7433a[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
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
        //         "min_age": "10d", \<1>
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::2c37ed0b33658d73a712e7942ea7433a[]

        $curl = 'PUT _ilm/policy/my_policy'
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
              . '        "min_age": "10d", \<1>'
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
     * Tag:  7251639b2c1267d7c76ab397bbe43bbd
     * Line: 100
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL100_7251639b2c1267d7c76ab397bbe43bbd()
    {
        $client = $this->getClient();
        // tag::7251639b2c1267d7c76ab397bbe43bbd[]
        // TODO -- Implement Example
        // {
        //   "my_policy": {
        //     "version": 2, \<1>
        //     "modified_date": 82392349, \<2>
        //     "policy": {
        //       "phases": {
        //         "hot": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_size": "25gb"
        //             }
        //           }
        //         },
        //         "delete": {
        //           "min_age": "10d",
        //           "actions": {
        //             "delete": {}
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::7251639b2c1267d7c76ab397bbe43bbd[]

        $curl = '{'
              . '  "my_policy": {'
              . '    "version": 2, \<1>'
              . '    "modified_date": 82392349, \<2>'
              . '    "policy": {'
              . '      "phases": {'
              . '        "hot": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_size": "25gb"'
              . '            }'
              . '          }'
              . '        },'
              . '        "delete": {'
              . '          "min_age": "10d",'
              . '          "actions": {'
              . '            "delete": {}'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fc541f5741c1fe052439ededa84ffe8a
     * Line: 144
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL144_fc541f5741c1fe052439ededa84ffe8a()
    {
        $client = $this->getClient();
        // tag::fc541f5741c1fe052439ededa84ffe8a[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_executing_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover": {
        //             "max_docs": 1
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "10d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::fc541f5741c1fe052439ededa84ffe8a[]

        $curl = 'PUT _ilm/policy/my_executing_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_docs": 1'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "10d",'
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
     * Tag:  0f6fa3a706a7c17858d3dbe329839ea6
     * Line: 186
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL186_0f6fa3a706a7c17858d3dbe329839ea6()
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
     * Tag:  d5e55676f5242766ebb035b87ce660e2
     * Line: 193
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL193_d5e55676f5242766ebb035b87ce660e2()
    {
        $client = $this->getClient();
        // tag::d5e55676f5242766ebb035b87ce660e2[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "my_index": {
        //       "index": "my_index",
        //       "managed": true,
        //       "policy": "my_executing_policy",
        //       "lifecycle_date_millis": 1538475653281,
        //       "age": "30s",
        //       "phase": "hot",
        //       "phase_time_millis": 1538475653317,
        //       "action": "rollover",
        //       "action_time_millis": 1538475653317,
        //       "step": "check-rollover-ready",
        //       "step_time_millis": 1538475653317,
        //       "phase_execution": {
        //         "policy": "my_executing_policy",
        //         "modified_date_in_millis": 1538475653317,
        //         "version": 1,
        //         "phase_definition": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_docs": 1
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d5e55676f5242766ebb035b87ce660e2[]

        $curl = '{'
              . '  "indices": {'
              . '    "my_index": {'
              . '      "index": "my_index",'
              . '      "managed": true,'
              . '      "policy": "my_executing_policy",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "age": "30s",'
              . '      "phase": "hot",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "action": "rollover",'
              . '      "action_time_millis": 1538475653317,'
              . '      "step": "check-rollover-ready",'
              . '      "step_time_millis": 1538475653317,'
              . '      "phase_execution": {'
              . '        "policy": "my_executing_policy",'
              . '        "modified_date_in_millis": 1538475653317,'
              . '        "version": 1,'
              . '        "phase_definition": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_docs": 1'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f94601bc9cd640adb939af67116a40c8
     * Line: 231
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL231_f94601bc9cd640adb939af67116a40c8()
    {
        $client = $this->getClient();
        // tag::f94601bc9cd640adb939af67116a40c8[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_executing_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "min_age": "1d", \<1>
        //         "actions": {
        //           "rollover": {
        //             "max_docs": 1
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "10d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f94601bc9cd640adb939af67116a40c8[]

        $curl = 'PUT _ilm/policy/my_executing_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "min_age": "1d", \<1>'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_docs": 1'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "10d",'
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
     * Tag:  aada9dd17e7b08f3c5a279920c84333e
     * Line: 271
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL271_aada9dd17e7b08f3c5a279920c84333e()
    {
        $client = $this->getClient();
        // tag::aada9dd17e7b08f3c5a279920c84333e[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "my_index": {
        //       "index": "my_index",
        //       "managed": true,
        //       "policy": "my_executing_policy",
        //       "lifecycle_date_millis": 1538475653281,
        //       "age": "30s",
        //       "phase": "hot",
        //       "phase_time_millis": 1538475653317,
        //       "action": "rollover",
        //       "action_time_millis": 1538475653317,
        //       "step": "check-rollover-ready",
        //       "step_time_millis": 1538475653317,
        //       "phase_execution": {
        //         "policy": "my_executing_policy",
        //         "modified_date_in_millis": 1538475653317,
        //         "version": 1, \<1>
        //         "phase_definition": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_docs": 1
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::aada9dd17e7b08f3c5a279920c84333e[]

        $curl = '{'
              . '  "indices": {'
              . '    "my_index": {'
              . '      "index": "my_index",'
              . '      "managed": true,'
              . '      "policy": "my_executing_policy",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "age": "30s",'
              . '      "phase": "hot",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "action": "rollover",'
              . '      "action_time_millis": 1538475653317,'
              . '      "step": "check-rollover-ready",'
              . '      "step_time_millis": 1538475653317,'
              . '      "phase_execution": {'
              . '        "policy": "my_executing_policy",'
              . '        "modified_date_in_millis": 1538475653317,'
              . '        "version": 1, \<1>'
              . '        "phase_definition": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_docs": 1'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  416c65c55a53d0161426cc09ae999c72
     * Line: 311
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL311_416c65c55a53d0161426cc09ae999c72()
    {
        $client = $this->getClient();
        // tag::416c65c55a53d0161426cc09ae999c72[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_executing_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "min_age": "1d",
        //         "actions": {
        //           "forcemerge": {
        //             "max_num_segments": 1
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "10d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::416c65c55a53d0161426cc09ae999c72[]

        $curl = 'PUT _ilm/policy/my_executing_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "min_age": "1d",'
              . '        "actions": {'
              . '          "forcemerge": {'
              . '            "max_num_segments": 1'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "10d",'
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
     * Tag:  aada9dd17e7b08f3c5a279920c84333e
     * Line: 351
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL351_aada9dd17e7b08f3c5a279920c84333e()
    {
        $client = $this->getClient();
        // tag::aada9dd17e7b08f3c5a279920c84333e[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "my_index": {
        //       "index": "my_index",
        //       "managed": true,
        //       "policy": "my_executing_policy",
        //       "lifecycle_date_millis": 1538475653281,
        //       "age": "30s",
        //       "phase": "hot",
        //       "phase_time_millis": 1538475653317,
        //       "action": "rollover",
        //       "action_time_millis": 1538475653317,
        //       "step": "check-rollover-ready",
        //       "step_time_millis": 1538475653317,
        //       "phase_execution": {
        //         "policy": "my_executing_policy",
        //         "modified_date_in_millis": 1538475653317,
        //         "version": 1, \<1>
        //         "phase_definition": {
        //           "min_age": "0ms",
        //           "actions": {
        //             "rollover": {
        //               "max_docs": 1
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::aada9dd17e7b08f3c5a279920c84333e[]

        $curl = '{'
              . '  "indices": {'
              . '    "my_index": {'
              . '      "index": "my_index",'
              . '      "managed": true,'
              . '      "policy": "my_executing_policy",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "age": "30s",'
              . '      "phase": "hot",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "action": "rollover",'
              . '      "action_time_millis": 1538475653317,'
              . '      "step": "check-rollover-ready",'
              . '      "step_time_millis": 1538475653317,'
              . '      "phase_execution": {'
              . '        "policy": "my_executing_policy",'
              . '        "modified_date_in_millis": 1538475653317,'
              . '        "version": 1, \<1>'
              . '        "phase_definition": {'
              . '          "min_age": "0ms",'
              . '          "actions": {'
              . '            "rollover": {'
              . '              "max_docs": 1'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  84935bf612d1aa402a7e16dae1ab99f5
     * Line: 406
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL406_84935bf612d1aa402a7e16dae1ab99f5()
    {
        $client = $this->getClient();
        // tag::84935bf612d1aa402a7e16dae1ab99f5[]
        // TODO -- Implement Example
        // {
        //   "indices": {
        //     "my_index": {
        //       "index": "my_index",
        //       "managed": true,
        //       "policy": "my_executing_policy",
        //       "lifecycle_date_millis": 1538475653281,
        //       "age": "30s",
        //       "phase": "warm",
        //       "phase_time_millis": 1538475653317,
        //       "action": "forcemerge",
        //       "action_time_millis": 1538475653317,
        //       "step": "forcemerge",
        //       "step_time_millis": 1538475653317,
        //       "phase_execution": {
        //         "policy": "my_executing_policy",
        //         "modified_date_in_millis": 1538475653317,
        //         "version": 3, \<1>
        //         "phase_definition": {
        //           "min_age": "1d",
        //           "actions": {
        //             "forcemerge": {
        //               "max_num_segments": 1
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::84935bf612d1aa402a7e16dae1ab99f5[]

        $curl = '{'
              . '  "indices": {'
              . '    "my_index": {'
              . '      "index": "my_index",'
              . '      "managed": true,'
              . '      "policy": "my_executing_policy",'
              . '      "lifecycle_date_millis": 1538475653281,'
              . '      "age": "30s",'
              . '      "phase": "warm",'
              . '      "phase_time_millis": 1538475653317,'
              . '      "action": "forcemerge",'
              . '      "action_time_millis": 1538475653317,'
              . '      "step": "forcemerge",'
              . '      "step_time_millis": 1538475653317,'
              . '      "phase_execution": {'
              . '        "policy": "my_executing_policy",'
              . '        "modified_date_in_millis": 1538475653317,'
              . '        "version": 3, \<1>'
              . '        "phase_definition": {'
              . '          "min_age": "1d",'
              . '          "actions": {'
              . '            "forcemerge": {'
              . '              "max_num_segments": 1'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  552b6761ef052efa1e83f8a3c30d6f78
     * Line: 505
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL505_552b6761ef052efa1e83f8a3c30d6f78()
    {
        $client = $this->getClient();
        // tag::552b6761ef052efa1e83f8a3c30d6f78[]
        // TODO -- Implement Example
        // PUT my_index/_settings
        // {
        //   "lifecycle.name": "my_other_policy"
        // }
        // end::552b6761ef052efa1e83f8a3c30d6f78[]

        $curl = 'PUT my_index/_settings'
              . '{'
              . '  "lifecycle.name": "my_other_policy"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%













}
