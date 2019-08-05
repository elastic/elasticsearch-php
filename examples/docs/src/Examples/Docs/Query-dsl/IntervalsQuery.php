<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: IntervalsQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/intervals-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class IntervalsQuery extends SimpleExamplesTester {

    /**
     * Tag:  5d59e61b35103a17e262a625503f896b
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_5d59e61b35103a17e262a625503f896b()
    {
        $client = $this->getClient();
        // tag::5d59e61b35103a17e262a625503f896b[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "all_of" : {
        //           "ordered" : true,
        //           "intervals" : [
        //             {
        //               "match" : {
        //                 "query" : "my favourite food",
        //                 "max_gaps" : 0,
        //                 "ordered" : true
        //               }
        //             },
        //             {
        //               "any_of" : {
        //                 "intervals" : [
        //                   { "match" : { "query" : "hot water" } },
        //                   { "match" : { "query" : "cold porridge" } }
        //                 ]
        //               }
        //             }
        //           ]
        //         },
        //         "_name" : "favourite_food"
        //       }
        //     }
        //   }
        // }
        // end::5d59e61b35103a17e262a625503f896b[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "all_of" : {'
              . '          "ordered" : true,'
              . '          "intervals" : ['
              . '            {'
              . '              "match" : {'
              . '                "query" : "my favourite food",'
              . '                "max_gaps" : 0,'
              . '                "ordered" : true'
              . '              }'
              . '            },'
              . '            {'
              . '              "any_of" : {'
              . '                "intervals" : ['
              . '                  { "match" : { "query" : "hot water" } },'
              . '                  { "match" : { "query" : "cold porridge" } }'
              . '                ]'
              . '              }'
              . '            }'
              . '          ]'
              . '        },'
              . '        "_name" : "favourite_food"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7471e97aaaf21c3a200abdd89f15c3cc
     * Line: 175
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL175_7471e97aaaf21c3a200abdd89f15c3cc()
    {
        $client = $this->getClient();
        // tag::7471e97aaaf21c3a200abdd89f15c3cc[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "match" : {
        //           "query" : "hot porridge",
        //           "max_gaps" : 10,
        //           "filter" : {
        //             "not_containing" : {
        //               "match" : {
        //                 "query" : "salty"
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::7471e97aaaf21c3a200abdd89f15c3cc[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "match" : {'
              . '          "query" : "hot porridge",'
              . '          "max_gaps" : 10,'
              . '          "filter" : {'
              . '            "not_containing" : {'
              . '              "match" : {'
              . '                "query" : "salty"'
              . '              }'
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
     * Tag:  2de6885bacb8769b8f22dce253c96b0c
     * Line: 226
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL226_2de6885bacb8769b8f22dce253c96b0c()
    {
        $client = $this->getClient();
        // tag::2de6885bacb8769b8f22dce253c96b0c[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "match" : {
        //           "query" : "hot porridge",
        //           "filter" : {
        //             "script" : {
        //               "source" : "interval.start > 10 && interval.end < 20 && interval.gaps == 0"
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::2de6885bacb8769b8f22dce253c96b0c[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "match" : {'
              . '          "query" : "hot porridge",'
              . '          "filter" : {'
              . '            "script" : {'
              . '              "source" : "interval.start > 10 && interval.end < 20 && interval.gaps == 0"'
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
     * Tag:  e2a22c6fd58cc0becf4c383134a08f8b
     * Line: 257
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL257_e2a22c6fd58cc0becf4c383134a08f8b()
    {
        $client = $this->getClient();
        // tag::e2a22c6fd58cc0becf4c383134a08f8b[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "match" : {
        //           "query" : "salty",
        //           "filter" : {
        //             "contained_by" : {
        //               "match" : {
        //                 "query" : "hot porridge"
        //               }
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::e2a22c6fd58cc0becf4c383134a08f8b[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "match" : {'
              . '          "query" : "salty",'
              . '          "filter" : {'
              . '            "contained_by" : {'
              . '              "match" : {'
              . '                "query" : "hot porridge"'
              . '              }'
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
     * Tag:  5f79c42b0f74fdf71359cef82843fad3
     * Line: 293
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL293_5f79c42b0f74fdf71359cef82843fad3()
    {
        $client = $this->getClient();
        // tag::5f79c42b0f74fdf71359cef82843fad3[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "all_of" : {
        //           "intervals" : [
        //             { "match" : { "query" : "the" } },
        //             { "any_of" : {
        //                 "intervals" : [
        //                     { "match" : { "query" : "big" } },
        //                     { "match" : { "query" : "big bad" } }
        //                 ] } },
        //             { "match" : { "query" : "wolf" } }
        //           ],
        //           "max_gaps" : 0,
        //           "ordered" : true
        //         }
        //       }
        //     }
        //   }
        // }
        // end::5f79c42b0f74fdf71359cef82843fad3[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "all_of" : {'
              . '          "intervals" : ['
              . '            { "match" : { "query" : "the" } },'
              . '            { "any_of" : {'
              . '                "intervals" : ['
              . '                    { "match" : { "query" : "big" } },'
              . '                    { "match" : { "query" : "big bad" } }'
              . '                ] } },'
              . '            { "match" : { "query" : "wolf" } }'
              . '          ],'
              . '          "max_gaps" : 0,'
              . '          "ordered" : true'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e7811867397b305efbbe8925d8a01c1a
     * Line: 327
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL327_e7811867397b305efbbe8925d8a01c1a()
    {
        $client = $this->getClient();
        // tag::e7811867397b305efbbe8925d8a01c1a[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "query": {
        //     "intervals" : {
        //       "my_text" : {
        //         "any_of" : {
        //           "intervals" : [
        //             { "match" : {
        //                 "query" : "the big bad wolf",
        //                 "ordered" : true,
        //                 "max_gaps" : 0 } },
        //             { "match" : {
        //                 "query" : "the big wolf",
        //                 "ordered" : true,
        //                 "max_gaps" : 0 } }
        //            ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::e7811867397b305efbbe8925d8a01c1a[]

        $curl = 'POST _search'
              . '{'
              . '  "query": {'
              . '    "intervals" : {'
              . '      "my_text" : {'
              . '        "any_of" : {'
              . '          "intervals" : ['
              . '            { "match" : {'
              . '                "query" : "the big bad wolf",'
              . '                "ordered" : true,'
              . '                "max_gaps" : 0 } },'
              . '            { "match" : {'
              . '                "query" : "the big wolf",'
              . '                "ordered" : true,'
              . '                "max_gaps" : 0 } }'
              . '           ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%







}
