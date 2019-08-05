<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Termvectors
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/termvectors.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Termvectors extends SimpleExamplesTester {

    /**
     * Tag:  4c9b1db368186091c1a660bcd52890b8
     * Line: 10
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL10_4c9b1db368186091c1a660bcd52890b8()
    {
        $client = $this->getClient();
        // tag::4c9b1db368186091c1a660bcd52890b8[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors/1
        // end::4c9b1db368186091c1a660bcd52890b8[]

        $curl = 'GET /twitter/_termvectors/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  a15ca7faa8ba282679396de3c7b90485
     * Line: 20
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL20_a15ca7faa8ba282679396de3c7b90485()
    {
        $client = $this->getClient();
        // tag::a15ca7faa8ba282679396de3c7b90485[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors/1?fields=message
        // end::a15ca7faa8ba282679396de3c7b90485[]

        $curl = 'GET /twitter/_termvectors/1?fields=message';

        // TODO -- make assertion
    }

    /**
     * Tag:  587dd0c1aebbc1d93190bf117959cb73
     * Line: 127
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL127_587dd0c1aebbc1d93190bf117959cb73()
    {
        $client = $this->getClient();
        // tag::587dd0c1aebbc1d93190bf117959cb73[]
        // TODO -- Implement Example
        // PUT /twitter
        // { "mappings": {
        //     "properties": {
        //       "text": {
        //         "type": "text",
        //         "term_vector": "with_positions_offsets_payloads",
        //         "store" : true,
        //         "analyzer" : "fulltext_analyzer"
        //        },
        //        "fullname": {
        //         "type": "text",
        //         "term_vector": "with_positions_offsets_payloads",
        //         "analyzer" : "fulltext_analyzer"
        //       }
        //     }
        //   },
        //   "settings" : {
        //     "index" : {
        //       "number_of_shards" : 1,
        //       "number_of_replicas" : 0
        //     },
        //     "analysis": {
        //       "analyzer": {
        //         "fulltext_analyzer": {
        //           "type": "custom",
        //           "tokenizer": "whitespace",
        //           "filter": [
        //             "lowercase",
        //             "type_as_payload"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::587dd0c1aebbc1d93190bf117959cb73[]

        $curl = 'PUT /twitter'
              . '{ "mappings": {'
              . '    "properties": {'
              . '      "text": {'
              . '        "type": "text",'
              . '        "term_vector": "with_positions_offsets_payloads",'
              . '        "store" : true,'
              . '        "analyzer" : "fulltext_analyzer"'
              . '       },'
              . '       "fullname": {'
              . '        "type": "text",'
              . '        "term_vector": "with_positions_offsets_payloads",'
              . '        "analyzer" : "fulltext_analyzer"'
              . '      }'
              . '    }'
              . '  },'
              . '  "settings" : {'
              . '    "index" : {'
              . '      "number_of_shards" : 1,'
              . '      "number_of_replicas" : 0'
              . '    },'
              . '    "analysis": {'
              . '      "analyzer": {'
              . '        "fulltext_analyzer": {'
              . '          "type": "custom",'
              . '          "tokenizer": "whitespace",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "type_as_payload"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3dbccd70f0a20ff7a8a2a4ee7ec406ed
     * Line: 169
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL169_3dbccd70f0a20ff7a8a2a4ee7ec406ed()
    {
        $client = $this->getClient();
        // tag::3dbccd70f0a20ff7a8a2a4ee7ec406ed[]
        // TODO -- Implement Example
        // PUT /twitter/_doc/1
        // {
        //   "fullname" : "John Doe",
        //   "text" : "twitter test test test "
        // }
        // PUT /twitter/_doc/2
        // {
        //   "fullname" : "Jane Doe",
        //   "text" : "Another twitter test ..."
        // }
        // end::3dbccd70f0a20ff7a8a2a4ee7ec406ed[]

        $curl = 'PUT /twitter/_doc/1'
              . '{'
              . '  "fullname" : "John Doe",'
              . '  "text" : "twitter test test test "'
              . '}'
              . 'PUT /twitter/_doc/2'
              . '{'
              . '  "fullname" : "Jane Doe",'
              . '  "text" : "Another twitter test ..."'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8dfecbb38a81fb5b42f63d6fe9bf9278
     * Line: 189
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL189_8dfecbb38a81fb5b42f63d6fe9bf9278()
    {
        $client = $this->getClient();
        // tag::8dfecbb38a81fb5b42f63d6fe9bf9278[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors/1
        // {
        //   "fields" : ["text"],
        //   "offsets" : true,
        //   "payloads" : true,
        //   "positions" : true,
        //   "term_statistics" : true,
        //   "field_statistics" : true
        // }
        // end::8dfecbb38a81fb5b42f63d6fe9bf9278[]

        $curl = 'GET /twitter/_termvectors/1'
              . '{'
              . '  "fields" : ["text"],'
              . '  "offsets" : true,'
              . '  "payloads" : true,'
              . '  "positions" : true,'
              . '  "term_statistics" : true,'
              . '  "field_statistics" : true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  487d12bb3e3036c4493dcbe43191b6f0
     * Line: 276
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL276_487d12bb3e3036c4493dcbe43191b6f0()
    {
        $client = $this->getClient();
        // tag::487d12bb3e3036c4493dcbe43191b6f0[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors/1
        // {
        //   "fields" : ["text", "some_field_without_term_vectors"],
        //   "offsets" : true,
        //   "positions" : true,
        //   "term_statistics" : true,
        //   "field_statistics" : true
        // }
        // end::487d12bb3e3036c4493dcbe43191b6f0[]

        $curl = 'GET /twitter/_termvectors/1'
              . '{'
              . '  "fields" : ["text", "some_field_without_term_vectors"],'
              . '  "offsets" : true,'
              . '  "positions" : true,'
              . '  "term_statistics" : true,'
              . '  "field_statistics" : true'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1f580df38ae517800d0c62d9648ebcb9
     * Line: 301
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL301_1f580df38ae517800d0c62d9648ebcb9()
    {
        $client = $this->getClient();
        // tag::1f580df38ae517800d0c62d9648ebcb9[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors
        // {
        //   "doc" : {
        //     "fullname" : "John Doe",
        //     "text" : "twitter test test test"
        //   }
        // }
        // end::1f580df38ae517800d0c62d9648ebcb9[]

        $curl = 'GET /twitter/_termvectors'
              . '{'
              . '  "doc" : {'
              . '    "fullname" : "John Doe",'
              . '    "text" : "twitter test test test"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8304a9c1ae8d0329b66ba57fb8263485
     * Line: 324
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL324_8304a9c1ae8d0329b66ba57fb8263485()
    {
        $client = $this->getClient();
        // tag::8304a9c1ae8d0329b66ba57fb8263485[]
        // TODO -- Implement Example
        // GET /twitter/_termvectors
        // {
        //   "doc" : {
        //     "fullname" : "John Doe",
        //     "text" : "twitter test test test"
        //   },
        //   "fields": ["fullname"],
        //   "per_field_analyzer" : {
        //     "fullname": "keyword"
        //   }
        // }
        // end::8304a9c1ae8d0329b66ba57fb8263485[]

        $curl = 'GET /twitter/_termvectors'
              . '{'
              . '  "doc" : {'
              . '    "fullname" : "John Doe",'
              . '    "text" : "twitter test test test"'
              . '  },'
              . '  "fields": ["fullname"],'
              . '  "per_field_analyzer" : {'
              . '    "fullname": "keyword"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ef3b210782fe58df252d0e805b8ef644
     * Line: 390
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL390_ef3b210782fe58df252d0e805b8ef644()
    {
        $client = $this->getClient();
        // tag::ef3b210782fe58df252d0e805b8ef644[]
        // TODO -- Implement Example
        // GET /imdb/_termvectors
        // {
        //     "doc": {
        //       "plot": "When wealthy industrialist Tony Stark is forced to build an armored suit after a life-threatening incident, he ultimately decides to use its technology to fight against evil."
        //     },
        //     "term_statistics" : true,
        //     "field_statistics" : true,
        //     "positions": false,
        //     "offsets": false,
        //     "filter" : {
        //       "max_num_terms" : 3,
        //       "min_term_freq" : 1,
        //       "min_doc_freq" : 1
        //     }
        // }
        // end::ef3b210782fe58df252d0e805b8ef644[]

        $curl = 'GET /imdb/_termvectors'
              . '{'
              . '    "doc": {'
              . '      "plot": "When wealthy industrialist Tony Stark is forced to build an armored suit after a life-threatening incident, he ultimately decides to use its technology to fight against evil."'
              . '    },'
              . '    "term_statistics" : true,'
              . '    "field_statistics" : true,'
              . '    "positions": false,'
              . '    "offsets": false,'
              . '    "filter" : {'
              . '      "max_num_terms" : 3,'
              . '      "min_term_freq" : 1,'
              . '      "min_doc_freq" : 1'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%










}
