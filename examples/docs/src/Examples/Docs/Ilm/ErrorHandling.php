<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: ErrorHandling
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/error-handling.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class ErrorHandling extends SimpleExamplesTester {

    /**
     * Tag:  9d211c6226d0b4434f01cceb76ab6ffa
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_9d211c6226d0b4434f01cceb76ab6ffa()
    {
        $client = $this->getClient();
        // tag::9d211c6226d0b4434f01cceb76ab6ffa[]
        // TODO -- Implement Example
        // PUT _ilm/policy/shrink-the-index
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "min_age": "5d",
        //         "actions": {
        //           "shrink": {
        //             "number_of_shards": 4
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9d211c6226d0b4434f01cceb76ab6ffa[]

        $curl = 'PUT _ilm/policy/shrink-the-index'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "min_age": "5d",'
              . '        "actions": {'
              . '          "shrink": {'
              . '            "number_of_shards": 4'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3d0b9acdacc7ecec380c57e814256472
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_3d0b9acdacc7ecec380c57e814256472()
    {
        $client = $this->getClient();
        // tag::3d0b9acdacc7ecec380c57e814256472[]
        // TODO -- Implement Example
        // PUT /myindex
        // {
        //   "settings": {
        //     "index.number_of_shards": 2,
        //     "index.lifecycle.name": "shrink-the-index"
        //   }
        // }
        // end::3d0b9acdacc7ecec380c57e814256472[]

        $curl = 'PUT /myindex'
              . '{'
              . '  "settings": {'
              . '    "index.number_of_shards": 2,'
              . '    "index.lifecycle.name": "shrink-the-index"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  943f92e1d3fa566ef23659be2d96f222
     * Line: 62
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL62_943f92e1d3fa566ef23659be2d96f222()
    {
        $client = $this->getClient();
        // tag::943f92e1d3fa566ef23659be2d96f222[]
        // TODO -- Implement Example
        // GET /myindex/_ilm/explain
        // end::943f92e1d3fa566ef23659be2d96f222[]

        $curl = 'GET /myindex/_ilm/explain';

        // TODO -- make assertion
    }

    /**
     * Tag:  e29f69a4bcfe27332cb2bb994a2cb5bf
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_e29f69a4bcfe27332cb2bb994a2cb5bf()
    {
        $client = $this->getClient();
        // tag::e29f69a4bcfe27332cb2bb994a2cb5bf[]
        // TODO -- Implement Example
        // {
        //   "indices" : {
        //     "myindex" : {
        //       "index" : "myindex",
        //       "managed" : true,                         \<1>
        //       "policy" : "shrink-the-index",            \<2>
        //       "lifecycle_date_millis" : 1541717265865,
        //       "age": "5.1d",                            \<3>
        //       "phase" : "warm",                         \<4>
        //       "phase_time_millis" : 1541717272601,
        //       "action" : "shrink",                      \<5>
        //       "action_time_millis" : 1541717272601,
        //       "step" : "ERROR",                         \<6>
        //       "step_time_millis" : 1541717272688,
        //       "failed_step" : "shrink",                 \<7>
        //       "step_info" : {
        //         "type" : "illegal_argument_exception",   \<8>
        //         "reason" : "the number of target shards [4] must be less that the number of source shards [2]" \<9>
        //       },
        //       "phase_execution" : {
        //         "policy" : "shrink-the-index",
        //         "phase_definition" : {                   <10>
        //           "min_age" : "5d",
        //           "actions" : {
        //             "shrink" : {
        //               "number_of_shards" : 4
        //             }
        //           }
        //         },
        //         "version" : 1,
        //         "modified_date_in_millis" : 1541717264230
        //       }
        //     }
        //   }
        // }
        // end::e29f69a4bcfe27332cb2bb994a2cb5bf[]

        $curl = '{'
              . '  "indices" : {'
              . '    "myindex" : {'
              . '      "index" : "myindex",'
              . '      "managed" : true,                         \<1>'
              . '      "policy" : "shrink-the-index",            \<2>'
              . '      "lifecycle_date_millis" : 1541717265865,'
              . '      "age": "5.1d",                            \<3>'
              . '      "phase" : "warm",                         \<4>'
              . '      "phase_time_millis" : 1541717272601,'
              . '      "action" : "shrink",                      \<5>'
              . '      "action_time_millis" : 1541717272601,'
              . '      "step" : "ERROR",                         \<6>'
              . '      "step_time_millis" : 1541717272688,'
              . '      "failed_step" : "shrink",                 \<7>'
              . '      "step_info" : {'
              . '        "type" : "illegal_argument_exception",   \<8>'
              . '        "reason" : "the number of target shards [4] must be less that the number of source shards [2]" \<9>'
              . '      },'
              . '      "phase_execution" : {'
              . '        "policy" : "shrink-the-index",'
              . '        "phase_definition" : {                   <10>'
              . '          "min_age" : "5d",'
              . '          "actions" : {'
              . '            "shrink" : {'
              . '              "number_of_shards" : 4'
              . '            }'
              . '          }'
              . '        },'
              . '        "version" : 1,'
              . '        "modified_date_in_millis" : 1541717264230'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7bee02e8962e355a23559b6eaa6678f2
     * Line: 127
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL127_7bee02e8962e355a23559b6eaa6678f2()
    {
        $client = $this->getClient();
        // tag::7bee02e8962e355a23559b6eaa6678f2[]
        // TODO -- Implement Example
        // PUT _ilm/policy/shrink-the-index
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "min_age": "5d",
        //         "actions": {
        //           "shrink": {
        //             "number_of_shards": 1
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::7bee02e8962e355a23559b6eaa6678f2[]

        $curl = 'PUT _ilm/policy/shrink-the-index'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "min_age": "5d",'
              . '        "actions": {'
              . '          "shrink": {'
              . '            "number_of_shards": 1'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  235513edcb5ce3fe2e38a781eeefa6a0
     * Line: 155
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL155_235513edcb5ce3fe2e38a781eeefa6a0()
    {
        $client = $this->getClient();
        // tag::235513edcb5ce3fe2e38a781eeefa6a0[]
        // TODO -- Implement Example
        // POST /myindex/_ilm/retry
        // end::235513edcb5ce3fe2e38a781eeefa6a0[]

        $curl = 'POST /myindex/_ilm/retry';

        // TODO -- make assertion
    }

// %__METHOD__%







}
