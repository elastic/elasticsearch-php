<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\How-to;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: SearchSpeed
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   how-to/search-speed.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class SearchSpeed extends SimpleExamplesTester {

    /**
     * Tag:  12facf3617a41551ce2f0c4d005cb1c7
     * Line: 52
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL52_12facf3617a41551ce2f0c4d005cb1c7()
    {
        $client = $this->getClient();
        // tag::12facf3617a41551ce2f0c4d005cb1c7[]
        // TODO -- Implement Example
        // PUT movies
        // {
        //   "mappings": {
        //     "properties": {
        //       "name_and_plot": {
        //         "type": "text"
        //       },
        //       "name": {
        //         "type": "text",
        //         "copy_to": "name_and_plot"
        //       },
        //       "plot": {
        //         "type": "text",
        //         "copy_to": "name_and_plot"
        //       }
        //     }
        //   }
        // }
        // end::12facf3617a41551ce2f0c4d005cb1c7[]

        $curl = 'PUT movies'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "name_and_plot": {'
              . '        "type": "text"'
              . '      },'
              . '      "name": {'
              . '        "type": "text",'
              . '        "copy_to": "name_and_plot"'
              . '      },'
              . '      "plot": {'
              . '        "type": "text",'
              . '        "copy_to": "name_and_plot"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a008f42379930edc354b4074e0a33344
     * Line: 87
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL87_a008f42379930edc354b4074e0a33344()
    {
        $client = $this->getClient();
        // tag::a008f42379930edc354b4074e0a33344[]
        // TODO -- Implement Example
        // PUT index/_doc/1
        // {
        //   "designation": "spoon",
        //   "price": 13
        // }
        // end::a008f42379930edc354b4074e0a33344[]

        $curl = 'PUT index/_doc/1'
              . '{'
              . '  "designation": "spoon",'
              . '  "price": 13'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a0a7557bb7e2aff7918557cd648f41af
     * Line: 99
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL99_a0a7557bb7e2aff7918557cd648f41af()
    {
        $client = $this->getClient();
        // tag::a0a7557bb7e2aff7918557cd648f41af[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "aggs": {
        //     "price_ranges": {
        //       "range": {
        //         "field": "price",
        //         "ranges": [
        //           { "to": 10 },
        //           { "from": 10, "to": 100 },
        //           { "from": 100 }
        //         ]
        //       }
        //     }
        //   }
        // }
        // end::a0a7557bb7e2aff7918557cd648f41af[]

        $curl = 'GET index/_search'
              . '{'
              . '  "aggs": {'
              . '    "price_ranges": {'
              . '      "range": {'
              . '        "field": "price",'
              . '        "ranges": ['
              . '          { "to": 10 },'
              . '          { "from": 10, "to": 100 },'
              . '          { "from": 100 }'
              . '        ]'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a4bae4d956bc0a663f42cfec36bf8e0b
     * Line: 123
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL123_a4bae4d956bc0a663f42cfec36bf8e0b()
    {
        $client = $this->getClient();
        // tag::a4bae4d956bc0a663f42cfec36bf8e0b[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "price_range": {
        //         "type": "keyword"
        //       }
        //     }
        //   }
        // }
        // PUT index/_doc/1
        // {
        //   "designation": "spoon",
        //   "price": 13,
        //   "price_range": "10-100"
        // }
        // end::a4bae4d956bc0a663f42cfec36bf8e0b[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "price_range": {'
              . '        "type": "keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}'
              . 'PUT index/_doc/1'
              . '{'
              . '  "designation": "spoon",'
              . '  "price": 13,'
              . '  "price_range": "10-100"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7dedb148ff74912de81b8f8275f0d7f3
     * Line: 148
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL148_7dedb148ff74912de81b8f8275f0d7f3()
    {
        $client = $this->getClient();
        // tag::7dedb148ff74912de81b8f8275f0d7f3[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "aggs": {
        //     "price_ranges": {
        //       "terms": {
        //         "field": "price_range"
        //       }
        //     }
        //   }
        // }
        // end::7dedb148ff74912de81b8f8275f0d7f3[]

        $curl = 'GET index/_search'
              . '{'
              . '  "aggs": {'
              . '    "price_ranges": {'
              . '      "terms": {'
              . '        "field": "price_range"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  102c7de25d13c87cf28839ada9f63c95
     * Line: 192
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL192_102c7de25d13c87cf28839ada9f63c95()
    {
        $client = $this->getClient();
        // tag::102c7de25d13c87cf28839ada9f63c95[]
        // TODO -- Implement Example
        // PUT index/_doc/1
        // {
        //   "my_date": "2016-05-11T16:30:55.328Z"
        // }
        // GET index/_search
        // {
        //   "query": {
        //     "constant_score": {
        //       "filter": {
        //         "range": {
        //           "my_date": {
        //             "gte": "now-1h",
        //             "lte": "now"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::102c7de25d13c87cf28839ada9f63c95[]

        $curl = 'PUT index/_doc/1'
              . '{'
              . '  "my_date": "2016-05-11T16:30:55.328Z"'
              . '}'
              . 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "constant_score": {'
              . '      "filter": {'
              . '        "range": {'
              . '          "my_date": {'
              . '            "gte": "now-1h",'
              . '            "lte": "now"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  17dd67a66c49f7eb618dd17430e48dfa
     * Line: 219
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL219_17dd67a66c49f7eb618dd17430e48dfa()
    {
        $client = $this->getClient();
        // tag::17dd67a66c49f7eb618dd17430e48dfa[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "query": {
        //     "constant_score": {
        //       "filter": {
        //         "range": {
        //           "my_date": {
        //             "gte": "now-1h/m",
        //             "lte": "now/m"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::17dd67a66c49f7eb618dd17430e48dfa[]

        $curl = 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "constant_score": {'
              . '      "filter": {'
              . '        "range": {'
              . '          "my_date": {'
              . '            "gte": "now-1h/m",'
              . '            "lte": "now/m"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  abc7a670a47516b58b6b07d7497b140c
     * Line: 253
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL253_abc7a670a47516b58b6b07d7497b140c()
    {
        $client = $this->getClient();
        // tag::abc7a670a47516b58b6b07d7497b140c[]
        // TODO -- Implement Example
        // GET index/_search
        // {
        //   "query": {
        //     "constant_score": {
        //       "filter": {
        //         "bool": {
        //           "should": [
        //             {
        //               "range": {
        //                 "my_date": {
        //                   "gte": "now-1h",
        //                   "lte": "now-1h/m"
        //                 }
        //               }
        //             },
        //             {
        //               "range": {
        //                 "my_date": {
        //                   "gt": "now-1h/m",
        //                   "lt": "now/m"
        //                 }
        //               }
        //             },
        //             {
        //               "range": {
        //                 "my_date": {
        //                   "gte": "now/m",
        //                   "lte": "now"
        //                 }
        //               }
        //             }
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::abc7a670a47516b58b6b07d7497b140c[]

        $curl = 'GET index/_search'
              . '{'
              . '  "query": {'
              . '    "constant_score": {'
              . '      "filter": {'
              . '        "bool": {'
              . '          "should": ['
              . '            {'
              . '              "range": {'
              . '                "my_date": {'
              . '                  "gte": "now-1h",'
              . '                  "lte": "now-1h/m"'
              . '                }'
              . '              }'
              . '            },'
              . '            {'
              . '              "range": {'
              . '                "my_date": {'
              . '                  "gt": "now-1h/m",'
              . '                  "lt": "now/m"'
              . '                }'
              . '              }'
              . '            },'
              . '            {'
              . '              "range": {'
              . '                "my_date": {'
              . '                  "gte": "now/m",'
              . '                  "lte": "now"'
              . '                }'
              . '              }'
              . '            }'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  971c7a36ee79f2b3aa82c64ea338de70
     * Line: 326
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL326_971c7a36ee79f2b3aa82c64ea338de70()
    {
        $client = $this->getClient();
        // tag::971c7a36ee79f2b3aa82c64ea338de70[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "keyword",
        //         "eager_global_ordinals": true
        //       }
        //     }
        //   }
        // }
        // end::971c7a36ee79f2b3aa82c64ea338de70[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "keyword",'
              . '        "eager_global_ordinals": true'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
