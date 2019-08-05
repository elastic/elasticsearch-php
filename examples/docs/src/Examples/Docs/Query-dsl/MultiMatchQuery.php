<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Query-dsl;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: MultiMatchQuery
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   query-dsl/multi-match-query.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class MultiMatchQuery extends SimpleExamplesTester {

    /**
     * Tag:  53b908c3432118c5a6e460f74d32006b
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_53b908c3432118c5a6e460f74d32006b()
    {
        $client = $this->getClient();
        // tag::53b908c3432118c5a6e460f74d32006b[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":    "this is a test", \<1>
        //       "fields": [ "subject", "message" ] \<2>
        //     }
        //   }
        // }
        // end::53b908c3432118c5a6e460f74d32006b[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":    "this is a test", \<1>'
              . '      "fields": [ "subject", "message" ] \<2>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a1702dd50690cae833572e48a0ddf25
     * Line: 33
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL33_6a1702dd50690cae833572e48a0ddf25()
    {
        $client = $this->getClient();
        // tag::6a1702dd50690cae833572e48a0ddf25[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":    "Will Smith",
        //       "fields": [ "title", "*_name" ] \<1>
        //     }
        //   }
        // }
        // end::6a1702dd50690cae833572e48a0ddf25[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":    "Will Smith",'
              . '      "fields": [ "title", "*_name" ] \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e30ea6e3823a139d7693d8cce1920a06
     * Line: 50
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL50_e30ea6e3823a139d7693d8cce1920a06()
    {
        $client = $this->getClient();
        // tag::e30ea6e3823a139d7693d8cce1920a06[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query" : "this is a test",
        //       "fields" : [ "subject^3", "message" ] \<1>
        //     }
        //   }
        // }
        // end::e30ea6e3823a139d7693d8cce1920a06[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query" : "this is a test",'
              . '      "fields" : [ "subject^3", "message" ] \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5da6efd5b038ada64c9e853c88c1ec47
     * Line: 114
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL114_5da6efd5b038ada64c9e853c88c1ec47()
    {
        $client = $this->getClient();
        // tag::5da6efd5b038ada64c9e853c88c1ec47[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "brown fox",
        //       "type":       "best_fields",
        //       "fields":     [ "subject", "message" ],
        //       "tie_breaker": 0.3
        //     }
        //   }
        // }
        // end::5da6efd5b038ada64c9e853c88c1ec47[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "brown fox",'
              . '      "type":       "best_fields",'
              . '      "fields":     [ "subject", "message" ],'
              . '      "tie_breaker": 0.3'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b0eaf67e5cce24ef8889bf20951ccec1
     * Line: 132
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL132_b0eaf67e5cce24ef8889bf20951ccec1()
    {
        $client = $this->getClient();
        // tag::b0eaf67e5cce24ef8889bf20951ccec1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "dis_max": {
        //       "queries": [
        //         { "match": { "subject": "brown fox" }},
        //         { "match": { "message": "brown fox" }}
        //       ],
        //       "tie_breaker": 0.3
        //     }
        //   }
        // }
        // end::b0eaf67e5cce24ef8889bf20951ccec1[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "dis_max": {'
              . '      "queries": ['
              . '        { "match": { "subject": "brown fox" }},'
              . '        { "match": { "message": "brown fox" }}'
              . '      ],'
              . '      "tie_breaker": 0.3'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e270f3f721a5712cd11a5ca03554f5b0
     * Line: 173
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL173_e270f3f721a5712cd11a5ca03554f5b0()
    {
        $client = $this->getClient();
        // tag::e270f3f721a5712cd11a5ca03554f5b0[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "Will Smith",
        //       "type":       "best_fields",
        //       "fields":     [ "first_name", "last_name" ],
        //       "operator":   "and" \<1>
        //     }
        //   }
        // }
        // end::e270f3f721a5712cd11a5ca03554f5b0[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "Will Smith",'
              . '      "type":       "best_fields",'
              . '      "fields":     [ "first_name", "last_name" ],'
              . '      "operator":   "and" \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  7b908b1189f076942de8cd497ff1fa59
     * Line: 216
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL216_7b908b1189f076942de8cd497ff1fa59()
    {
        $client = $this->getClient();
        // tag::7b908b1189f076942de8cd497ff1fa59[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "quick brown fox",
        //       "type":       "most_fields",
        //       "fields":     [ "title", "title.original", "title.shingles" ]
        //     }
        //   }
        // }
        // end::7b908b1189f076942de8cd497ff1fa59[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "quick brown fox",'
              . '      "type":       "most_fields",'
              . '      "fields":     [ "title", "title.original", "title.shingles" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6bbc613bd4f9aec1bbdbabf5db021d28
     * Line: 233
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL233_6bbc613bd4f9aec1bbdbabf5db021d28()
    {
        $client = $this->getClient();
        // tag::6bbc613bd4f9aec1bbdbabf5db021d28[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "bool": {
        //       "should": [
        //         { "match": { "title":          "quick brown fox" }},
        //         { "match": { "title.original": "quick brown fox" }},
        //         { "match": { "title.shingles": "quick brown fox" }}
        //       ]
        //     }
        //   }
        // }
        // end::6bbc613bd4f9aec1bbdbabf5db021d28[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "should": ['
              . '        { "match": { "title":          "quick brown fox" }},'
              . '        { "match": { "title.original": "quick brown fox" }},'
              . '        { "match": { "title.shingles": "quick brown fox" }}'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0e118857b815b62118a30c042f079db1
     * Line: 264
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL264_0e118857b815b62118a30c042f079db1()
    {
        $client = $this->getClient();
        // tag::0e118857b815b62118a30c042f079db1[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "quick brown f",
        //       "type":       "phrase_prefix",
        //       "fields":     [ "subject", "message" ]
        //     }
        //   }
        // }
        // end::0e118857b815b62118a30c042f079db1[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "quick brown f",'
              . '      "type":       "phrase_prefix",'
              . '      "fields":     [ "subject", "message" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  33f148e3d8676de6cc52f58749898a13
     * Line: 281
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL281_33f148e3d8676de6cc52f58749898a13()
    {
        $client = $this->getClient();
        // tag::33f148e3d8676de6cc52f58749898a13[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "dis_max": {
        //       "queries": [
        //         { "match_phrase_prefix": { "subject": "quick brown f" }},
        //         { "match_phrase_prefix": { "message": "quick brown f" }}
        //       ]
        //     }
        //   }
        // }
        // end::33f148e3d8676de6cc52f58749898a13[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "dis_max": {'
              . '      "queries": ['
              . '        { "match_phrase_prefix": { "subject": "quick brown f" }},'
              . '        { "match_phrase_prefix": { "message": "quick brown f" }}'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  047266b0d20fdb62ebc72d51952c8f6d
     * Line: 348
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL348_047266b0d20fdb62ebc72d51952c8f6d()
    {
        $client = $this->getClient();
        // tag::047266b0d20fdb62ebc72d51952c8f6d[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "Will Smith",
        //       "type":       "cross_fields",
        //       "fields":     [ "first_name", "last_name" ],
        //       "operator":   "and"
        //     }
        //   }
        // }
        // end::047266b0d20fdb62ebc72d51952c8f6d[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "Will Smith",'
              . '      "type":       "cross_fields",'
              . '      "fields":     [ "first_name", "last_name" ],'
              . '      "operator":   "and"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ad0dcbc7fc619e952c8825b8f307b7b2
     * Line: 408
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL408_ad0dcbc7fc619e952c8825b8f307b7b2()
    {
        $client = $this->getClient();
        // tag::ad0dcbc7fc619e952c8825b8f307b7b2[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "Jon",
        //       "type":       "cross_fields",
        //       "fields":     [
        //         "first", "first.edge",
        //         "last",  "last.edge"
        //       ]
        //     }
        //   }
        // }
        // end::ad0dcbc7fc619e952c8825b8f307b7b2[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "Jon",'
              . '      "type":       "cross_fields",'
              . '      "fields":     ['
              . '        "first", "first.edge",'
              . '        "last",  "last.edge"'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3cd50a789b8e1f0ebbbc53a8d7ecf656
     * Line: 447
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL447_3cd50a789b8e1f0ebbbc53a8d7ecf656()
    {
        $client = $this->getClient();
        // tag::3cd50a789b8e1f0ebbbc53a8d7ecf656[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "bool": {
        //       "should": [
        //         {
        //           "multi_match" : {
        //             "query":      "Will Smith",
        //             "type":       "cross_fields",
        //             "fields":     [ "first", "last" ],
        //             "minimum_should_match": "50%" \<1>
        //           }
        //         },
        //         {
        //           "multi_match" : {
        //             "query":      "Will Smith",
        //             "type":       "cross_fields",
        //             "fields":     [ "*.edge" ]
        //           }
        //         }
        //       ]
        //     }
        //   }
        // }
        // end::3cd50a789b8e1f0ebbbc53a8d7ecf656[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "should": ['
              . '        {'
              . '          "multi_match" : {'
              . '            "query":      "Will Smith",'
              . '            "type":       "cross_fields",'
              . '            "fields":     [ "first", "last" ],'
              . '            "minimum_should_match": "50%" \<1>'
              . '          }'
              . '        },'
              . '        {'
              . '          "multi_match" : {'
              . '            "query":      "Will Smith",'
              . '            "type":       "cross_fields",'
              . '            "fields":     [ "*.edge" ]'
              . '          }'
              . '        }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  179f0a3e84ff4bbac18787a018eabf89
     * Line: 482
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL482_179f0a3e84ff4bbac18787a018eabf89()
    {
        $client = $this->getClient();
        // tag::179f0a3e84ff4bbac18787a018eabf89[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //    "multi_match" : {
        //       "query":      "Jon",
        //       "type":       "cross_fields",
        //       "analyzer":   "standard", \<1>
        //       "fields":     [ "first", "last", "*.edge" ]
        //     }
        //   }
        // }
        // end::179f0a3e84ff4bbac18787a018eabf89[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '   "multi_match" : {'
              . '      "query":      "Jon",'
              . '      "type":       "cross_fields",'
              . '      "analyzer":   "standard", \<1>'
              . '      "fields":     [ "first", "last", "*.edge" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  68721288dc9ad8aa1b55099b4d303051
     * Line: 535
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL535_68721288dc9ad8aa1b55099b4d303051()
    {
        $client = $this->getClient();
        // tag::68721288dc9ad8aa1b55099b4d303051[]
        // TODO -- Implement Example
        // GET /_search
        // {
        //   "query": {
        //     "multi_match" : {
        //       "query":      "quick brown f",
        //       "type":       "bool_prefix",
        //       "fields":     [ "subject", "message" ]
        //     }
        //   }
        // }
        // end::68721288dc9ad8aa1b55099b4d303051[]

        $curl = 'GET /_search'
              . '{'
              . '  "query": {'
              . '    "multi_match" : {'
              . '      "query":      "quick brown f",'
              . '      "type":       "bool_prefix",'
              . '      "fields":     [ "subject", "message" ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%
















}
