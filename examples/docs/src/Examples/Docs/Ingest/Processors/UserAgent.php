<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ingest\Processors;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: UserAgent
 *
 * Date: 2019-08-06 06:59:53
 *
 * @source   ingest/processors/user-agent.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class UserAgent extends SimpleExamplesTester {

    /**
     * Tag:  9c504b5c486d9df689a22b11412e61a3
     * Line: 27
     * Date: 2019-08-06 06:59:53
     */
    public function testExampleL27_9c504b5c486d9df689a22b11412e61a3()
    {
        $client = $this->getClient();
        // tag::9c504b5c486d9df689a22b11412e61a3[]
        // TODO -- Implement Example
        // PUT _ingest/pipeline/user_agent
        // {
        //   "description" : "Add user agent information",
        //   "processors" : [
        //     {
        //       "user_agent" : {
        //         "field" : "agent"
        //       }
        //     }
        //   ]
        // }
        // PUT my_index/_doc/my_id?pipeline=user_agent
        // {
        //   "agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36"
        // }
        // GET my_index/_doc/my_id
        // end::9c504b5c486d9df689a22b11412e61a3[]

        $curl = 'PUT _ingest/pipeline/user_agent'
              . '{'
              . '  "description" : "Add user agent information",'
              . '  "processors" : ['
              . '    {'
              . '      "user_agent" : {'
              . '        "field" : "agent"'
              . '      }'
              . '    }'
              . '  ]'
              . '}'
              . 'PUT my_index/_doc/my_id?pipeline=user_agent'
              . '{'
              . '  "agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36"'
              . '}'
              . 'GET my_index/_doc/my_id';

        // TODO -- make assertion
    }

// %__METHOD__%


}
