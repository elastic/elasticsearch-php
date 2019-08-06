<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Grok
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/grok.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Grok extends SimpleExamplesTester {

    /**
     * Tag:  77828fcaecc3f058c48b955928198ff6
     * Line: 159
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL159_77828fcaecc3f058c48b955928198ff6()
    {
        $client = $this->getClient();
        // tag::77828fcaecc3f058c48b955928198ff6[]
        // TODO -- Implement Example
        // POST _ingest/pipeline/_simulate
        // {
        //   "pipeline": {
        //   "description" : "parse multiple patterns",
        //   "processors": [
        //     {
        //       "grok": {
        //         "field": "message",
        //         "patterns": ["%{FAVORITE_DOG:pet}", "%{FAVORITE_CAT:pet}"],
        //         "pattern_definitions" : {
        //           "FAVORITE_DOG" : "beagle",
        //           "FAVORITE_CAT" : "burmese"
        //         }
        //       }
        //     }
        //   ]
        // },
        // "docs":[
        //   {
        //     "_source": {
        //       "message": "I love burmese cats!"
        //     }
        //   }
        //   ]
        // }
        // end::77828fcaecc3f058c48b955928198ff6[]

        $curl = 'POST _ingest/pipeline/_simulate'
              . '{'
              . '  "pipeline": {'
              . '  "description" : "parse multiple patterns",'
              . '  "processors": ['
              . '    {'
              . '      "grok": {'
              . '        "field": "message",'
              . '        "patterns": ["%{FAVORITE_DOG:pet}", "%{FAVORITE_CAT:pet}"],'
              . '        "pattern_definitions" : {'
              . '          "FAVORITE_DOG" : "beagle",'
              . '          "FAVORITE_CAT" : "burmese"'
              . '        }'
              . '      }'
              . '    }'
              . '  ]'
              . '},'
              . '"docs":['
              . '  {'
              . '    "_source": {'
              . '      "message": "I love burmese cats!"'
              . '    }'
              . '  }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  98574a419b6be603a0af8f7f22a92d23
     * Line: 287
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL287_98574a419b6be603a0af8f7f22a92d23()
    {
        $client = $this->getClient();
        // tag::98574a419b6be603a0af8f7f22a92d23[]
        // TODO -- Implement Example
        // GET _ingest/processor/grok
        // end::98574a419b6be603a0af8f7f22a92d23[]

        $curl = 'GET _ingest/processor/grok';

        // TODO -- make assertion
    }

// %__METHOD__%



}
