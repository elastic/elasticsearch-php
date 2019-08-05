<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search\Request;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PostFilter
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/request/post-filter.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PostFilter extends SimpleExamplesTester {

    /**
     * Tag:  35390274db3acad03eb77b2376c57e40
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_35390274db3acad03eb77b2376c57e40()
    {
        $client = $this->getClient();
        // tag::35390274db3acad03eb77b2376c57e40[]
        // TODO -- Implement Example
        // PUT /shirts
        // {
        //     "mappings": {
        //         "properties": {
        //             "brand": { "type": "keyword"},
        //             "color": { "type": "keyword"},
        //             "model": { "type": "keyword"}
        //         }
        //     }
        // }
        // PUT /shirts/_doc/1?refresh
        // {
        //     "brand": "gucci",
        //     "color": "red",
        //     "model": "slim"
        // }
        // end::35390274db3acad03eb77b2376c57e40[]

        $curl = 'PUT /shirts'
              . '{'
              . '    "mappings": {'
              . '        "properties": {'
              . '            "brand": { "type": "keyword"},'
              . '            "color": { "type": "keyword"},'
              . '            "model": { "type": "keyword"}'
              . '        }'
              . '    }'
              . '}'
              . 'PUT /shirts/_doc/1?refresh'
              . '{'
              . '    "brand": "gucci",'
              . '    "color": "red",'
              . '    "model": "slim"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f83eb6605c7c56e297a494b318400ef0
     * Line: 41
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL41_f83eb6605c7c56e297a494b318400ef0()
    {
        $client = $this->getClient();
        // tag::f83eb6605c7c56e297a494b318400ef0[]
        // TODO -- Implement Example
        // GET /shirts/_search
        // {
        //   "query": {
        //     "bool": {
        //       "filter": [
        //         { "term": { "color": "red"   }},
        //         { "term": { "brand": "gucci" }}
        //       ]
        //     }
        //   }
        // }
        // end::f83eb6605c7c56e297a494b318400ef0[]

        $curl = 'GET /shirts/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "filter": ['
              . '        { "term": { "color": "red"   }},'
              . '        { "term": { "brand": "gucci" }}'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  81f1b1e1d5c81683b6bf471c469e6046
     * Line: 65
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL65_81f1b1e1d5c81683b6bf471c469e6046()
    {
        $client = $this->getClient();
        // tag::81f1b1e1d5c81683b6bf471c469e6046[]
        // TODO -- Implement Example
        // GET /shirts/_search
        // {
        //   "query": {
        //     "bool": {
        //       "filter": [
        //         { "term": { "color": "red"   }},
        //         { "term": { "brand": "gucci" }}
        //       ]
        //     }
        //   },
        //   "aggs": {
        //     "models": {
        //       "terms": { "field": "model" } \<1>
        //     }
        //   }
        // }
        // end::81f1b1e1d5c81683b6bf471c469e6046[]

        $curl = 'GET /shirts/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "filter": ['
              . '        { "term": { "color": "red"   }},'
              . '        { "term": { "brand": "gucci" }}'
              . '      ]'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "models": {'
              . '      "terms": { "field": "model" } \<1>'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  48313f620c2871b6f4019b66be730109
     * Line: 96
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL96_48313f620c2871b6f4019b66be730109()
    {
        $client = $this->getClient();
        // tag::48313f620c2871b6f4019b66be730109[]
        // TODO -- Implement Example
        // GET /shirts/_search
        // {
        //   "query": {
        //     "bool": {
        //       "filter": {
        //         "term": { "brand": "gucci" } \<1>
        //       }
        //     }
        //   },
        //   "aggs": {
        //     "colors": {
        //       "terms": { "field": "color" } \<2>
        //     },
        //     "color_red": {
        //       "filter": {
        //         "term": { "color": "red" } \<3>
        //       },
        //       "aggs": {
        //         "models": {
        //           "terms": { "field": "model" } \<3>
        //         }
        //       }
        //     }
        //   },
        //   "post_filter": { \<4>
        //     "term": { "color": "red" }
        //   }
        // }
        // end::48313f620c2871b6f4019b66be730109[]

        $curl = 'GET /shirts/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "filter": {'
              . '        "term": { "brand": "gucci" } \<1>'
              . '      }'
              . '    }'
              . '  },'
              . '  "aggs": {'
              . '    "colors": {'
              . '      "terms": { "field": "color" } \<2>'
              . '    },'
              . '    "color_red": {'
              . '      "filter": {'
              . '        "term": { "color": "red" } \<3>'
              . '      },'
              . '      "aggs": {'
              . '        "models": {'
              . '          "terms": { "field": "model" } \<3>'
              . '        }'
              . '      }'
              . '    }'
              . '  },'
              . '  "post_filter": { \<4>'
              . '    "term": { "color": "red" }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%





}
