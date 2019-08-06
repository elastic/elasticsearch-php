<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\X-pack\Docs\En\Rest-api\Watcher;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PutWatch
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ../../x-pack/docs/en/rest-api/watcher/put-watch.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PutWatch extends SimpleExamplesTester {

    /**
     * Tag:  3a12feb0de224bfaaf518d95b9f516ff
     * Line: 101
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL101_3a12feb0de224bfaaf518d95b9f516ff()
    {
        $client = $this->getClient();
        // tag::3a12feb0de224bfaaf518d95b9f516ff[]
        // TODO -- Implement Example
        // PUT _watcher/watch/my-watch
        // {
        //   "trigger" : {
        //     "schedule" : { "cron" : "0 0/1 * * * ?" }
        //   },
        //   "input" : {
        //     "search" : {
        //       "request" : {
        //         "indices" : [
        //           "logstash*"
        //         ],
        //         "body" : {
        //           "query" : {
        //             "bool" : {
        //               "must" : {
        //                 "match": {
        //                    "response": 404
        //                 }
        //               },
        //               "filter" : {
        //                 "range": {
        //                   "@timestamp": {
        //                     "from": "{{ctx.trigger.scheduled_time}}||-5m",
        //                     "to": "{{ctx.trigger.triggered_time}}"
        //                   }
        //                 }
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   },
        //   "condition" : {
        //     "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}
        //   },
        //   "actions" : {
        //     "email_admin" : {
        //       "email" : {
        //         "to" : "admin@domain.host.com",
        //         "subject" : "404 recently encountered"
        //       }
        //     }
        //   }
        // }
        // end::3a12feb0de224bfaaf518d95b9f516ff[]

        $curl = 'PUT _watcher/watch/my-watch'
              . '{'
              . '  "trigger" : {'
              . '    "schedule" : { "cron" : "0 0/1 * * * ?" }'
              . '  },'
              . '  "input" : {'
              . '    "search" : {'
              . '      "request" : {'
              . '        "indices" : ['
              . '          "logstash*"'
              . '        ],'
              . '        "body" : {'
              . '          "query" : {'
              . '            "bool" : {'
              . '              "must" : {'
              . '                "match": {'
              . '                   "response": 404'
              . '                }'
              . '              },'
              . '              "filter" : {'
              . '                "range": {'
              . '                  "@timestamp": {'
              . '                    "from": "{{ctx.trigger.scheduled_time}}||-5m",'
              . '                    "to": "{{ctx.trigger.triggered_time}}"'
              . '                  }'
              . '                }'
              . '              }'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "condition" : {'
              . '    "compare" : { "ctx.payload.hits.total" : { "gt" : 0 }}'
              . '  },'
              . '  "actions" : {'
              . '    "email_admin" : {'
              . '      "email" : {'
              . '        "to" : "admin@domain.host.com",'
              . '        "subject" : "404 recently encountered"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
