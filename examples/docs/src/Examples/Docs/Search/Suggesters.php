<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Search;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Suggesters
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   search/suggesters.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Suggesters extends SimpleExamplesTester {

    /**
     * Tag:  626f8c4b3e2cd3d9beaa63a7f5799d7a
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_626f8c4b3e2cd3d9beaa63a7f5799d7a()
    {
        $client = $this->getClient();
        // tag::626f8c4b3e2cd3d9beaa63a7f5799d7a[]
        // TODO -- Implement Example
        // POST twitter/_search
        // {
        //   "query" : {
        //     "match": {
        //       "message": "tring out Elasticsearch"
        //     }
        //   },
        //   "suggest" : {
        //     "my-suggestion" : {
        //       "text" : "tring out Elasticsearch",
        //       "term" : {
        //         "field" : "message"
        //       }
        //     }
        //   }
        // }
        // end::626f8c4b3e2cd3d9beaa63a7f5799d7a[]

        $curl = 'POST twitter/_search'
              . '{'
              . '  "query" : {'
              . '    "match": {'
              . '      "message": "tring out Elasticsearch"'
              . '    }'
              . '  },'
              . '  "suggest" : {'
              . '    "my-suggestion" : {'
              . '      "text" : "tring out Elasticsearch",'
              . '      "term" : {'
              . '        "field" : "message"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2533e4b36ae837eaecda08407ecb6383
     * Line: 43
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL43_2533e4b36ae837eaecda08407ecb6383()
    {
        $client = $this->getClient();
        // tag::2533e4b36ae837eaecda08407ecb6383[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "suggest": {
        //     "my-suggest-1" : {
        //       "text" : "tring out Elasticsearch",
        //       "term" : {
        //         "field" : "message"
        //       }
        //     },
        //     "my-suggest-2" : {
        //       "text" : "kmichy",
        //       "term" : {
        //         "field" : "user"
        //       }
        //     }
        //   }
        // }
        // end::2533e4b36ae837eaecda08407ecb6383[]

        $curl = 'POST _search'
              . '{'
              . '  "suggest": {'
              . '    "my-suggest-1" : {'
              . '      "text" : "tring out Elasticsearch",'
              . '      "term" : {'
              . '        "field" : "message"'
              . '      }'
              . '    },'
              . '    "my-suggest-2" : {'
              . '      "text" : "kmichy",'
              . '      "term" : {'
              . '        "field" : "user"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5275842787967b6db876025f4a1c6942
     * Line: 119
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL119_5275842787967b6db876025f4a1c6942()
    {
        $client = $this->getClient();
        // tag::5275842787967b6db876025f4a1c6942[]
        // TODO -- Implement Example
        // POST _search
        // {
        //   "suggest": {
        //     "text" : "tring out Elasticsearch",
        //     "my-suggest-1" : {
        //       "term" : {
        //         "field" : "message"
        //       }
        //     },
        //     "my-suggest-2" : {
        //        "term" : {
        //         "field" : "user"
        //        }
        //     }
        //   }
        // }
        // end::5275842787967b6db876025f4a1c6942[]

        $curl = 'POST _search'
              . '{'
              . '  "suggest": {'
              . '    "text" : "tring out Elasticsearch",'
              . '    "my-suggest-1" : {'
              . '      "term" : {'
              . '        "field" : "message"'
              . '      }'
              . '    },'
              . '    "my-suggest-2" : {'
              . '       "term" : {'
              . '        "field" : "user"'
              . '       }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
