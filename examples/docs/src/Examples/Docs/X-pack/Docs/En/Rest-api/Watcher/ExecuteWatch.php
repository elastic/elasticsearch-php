<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ExecuteWatch
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/execute-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ExecuteWatch extends SimpleExamplesTester {

    /**
     * Tag:  01dc7bdc223bd651574ed2d3954a5b1c
     * Line: 142
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL142_01dc7bdc223bd651574ed2d3954a5b1c()
    {
        $client = $this->getClient();
        // tag::01dc7bdc223bd651574ed2d3954a5b1c[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_execute
        // end::01dc7bdc223bd651574ed2d3954a5b1c[]

        $curl = 'POST _watcher/watch/my_watch/_execute';

        // TODO -- make assertion
    }

    /**
     * Tag:  f6eff830fb0fad200ebfb1e3e46f6f0e
     * Line: 151
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL151_f6eff830fb0fad200ebfb1e3e46f6f0e()
    {
        $client = $this->getClient();
        // tag::f6eff830fb0fad200ebfb1e3e46f6f0e[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_execute
        // {
        //   "trigger_data" : { \<1>
        //      "triggered_time" : "now",
        //      "scheduled_time" : "now"
        //   },
        //   "alternative_input" : { \<2>
        //     "foo" : "bar"
        //   },
        //   "ignore_condition" : true, \<3>
        //   "action_modes" : {
        //     "my-action" : "force_simulate" \<4>
        //   },
        //   "record_execution" : true \<5>
        // }
        // end::f6eff830fb0fad200ebfb1e3e46f6f0e[]

        $curl = 'POST _watcher/watch/my_watch/_execute'
              . '{'
              . '  "trigger_data" : { \<1>'
              . '     "triggered_time" : "now",'
              . '     "scheduled_time" : "now"'
              . '  },'
              . '  "alternative_input" : { \<2>'
              . '    "foo" : "bar"'
              . '  },'
              . '  "ignore_condition" : true, \<3>'
              . '  "action_modes" : {'
              . '    "my-action" : "force_simulate" \<4>'
              . '  },'
              . '  "record_execution" : true \<5>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7f37031fb40b68a61255b7c71d7eed0b
     * Line: 294
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL294_7f37031fb40b68a61255b7c71d7eed0b()
    {
        $client = $this->getClient();
        // tag::7f37031fb40b68a61255b7c71d7eed0b[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_execute
        // {
        //   "action_modes" : {
        //     "action1" : "force_simulate",
        //     "action2" : "skip"
        //   }
        // }
        // end::7f37031fb40b68a61255b7c71d7eed0b[]

        $curl = 'POST _watcher/watch/my_watch/_execute'
              . '{'
              . '  "action_modes" : {'
              . '    "action1" : "force_simulate",'
              . '    "action2" : "skip"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9cf6c7012a4f2bb562bc256aa28c3409
     * Line: 310
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL310_9cf6c7012a4f2bb562bc256aa28c3409()
    {
        $client = $this->getClient();
        // tag::9cf6c7012a4f2bb562bc256aa28c3409[]
        // TODO -- Implement Example
        // POST _watcher/watch/my_watch/_execute
        // {
        //   "action_modes" : {
        //     "_all" : "force_execute"
        //   }
        // }
        // end::9cf6c7012a4f2bb562bc256aa28c3409[]

        $curl = 'POST _watcher/watch/my_watch/_execute'
              . '{'
              . '  "action_modes" : {'
              . '    "_all" : "force_execute"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9cd37d0ccbc66ad47ddb626564b27cc8
     * Line: 324
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL324_9cd37d0ccbc66ad47ddb626564b27cc8()
    {
        $client = $this->getClient();
        // tag::9cd37d0ccbc66ad47ddb626564b27cc8[]
        // TODO -- Implement Example
        // POST _watcher/watch/_execute
        // {
        //   "watch" : {
        //     "trigger" : { "schedule" : { "interval" : "10s" } },
        //     "input" : {
        //       "search" : {
        //         "request" : {
        //           "indices" : [ "logs" ],
        //           "body" : {
        //             "query" : {
        //               "match" : { "message": "error" }
        //             }
        //           }
        //         }
        //       }
        //     },
        //     "condition" : {
        //       "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}
        //     },
        //     "actions" : {
        //       "log_error" : {
        //         "logging" : {
        //           "text" : "Found {{ctx.payload.hits.total}} errors in the logs"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9cd37d0ccbc66ad47ddb626564b27cc8[]

        $curl = 'POST _watcher/watch/_execute'
              . '{'
              . '  "watch" : {'
              . '    "trigger" : { "schedule" : { "interval" : "10s" } },'
              . '    "input" : {'
              . '      "search" : {'
              . '        "request" : {'
              . '          "indices" : [ "logs" ],'
              . '          "body" : {'
              . '            "query" : {'
              . '              "match" : { "message": "error" }'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    },'
              . '    "condition" : {'
              . '      "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}'
              . '    },'
              . '    "actions" : {'
              . '      "log_error" : {'
              . '        "logging" : {'
              . '          "text" : "Found {{ctx.payload.hits.total}} errors in the logs"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  10b924bf6298aa6157ed00ce12f8edc1
     * Line: 361
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL361_10b924bf6298aa6157ed00ce12f8edc1()
    {
        $client = $this->getClient();
        // tag::10b924bf6298aa6157ed00ce12f8edc1[]
        // TODO -- Implement Example
        // POST _watcher/watch/_execute
        // {
        //   "ignore_condition" : true,
        //   "watch" : {
        //     "trigger" : { "schedule" : { "interval" : "10s" } },
        //     "input" : {
        //       "search" : {
        //         "request" : {
        //           "indices" : [ "logs" ],
        //           "body" : {
        //             "query" : {
        //               "match" : { "message": "error" }
        //             }
        //           }
        //         }
        //       }
        //     },
        //     "condition" : {
        //       "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}
        //     },
        //     "actions" : {
        //       "log_error" : {
        //         "logging" : {
        //           "text" : "Found {{ctx.payload.hits.total}} errors in the logs"
        //         }
        //       }
        //     }
        //   }
        // }
        // end::10b924bf6298aa6157ed00ce12f8edc1[]

        $curl = 'POST _watcher/watch/_execute'
              . '{'
              . '  "ignore_condition" : true,'
              . '  "watch" : {'
              . '    "trigger" : { "schedule" : { "interval" : "10s" } },'
              . '    "input" : {'
              . '      "search" : {'
              . '        "request" : {'
              . '          "indices" : [ "logs" ],'
              . '          "body" : {'
              . '            "query" : {'
              . '              "match" : { "message": "error" }'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    },'
              . '    "condition" : {'
              . '      "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}'
              . '    },'
              . '    "actions" : {'
              . '      "log_error" : {'
              . '        "logging" : {'
              . '          "text" : "Found {{ctx.payload.hits.total}} errors in the logs"'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
