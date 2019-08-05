<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Requestcache
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/indices/request_cache.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Requestcache extends SimpleExamplesTester {

    /**
     * Tag:  00629ea43db6ee1704183170df085495
     * Line: 44
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL44_00629ea43db6ee1704183170df085495()
    {
        $client = $this->getClient();
        // tag::00629ea43db6ee1704183170df085495[]
        // TODO -- Implement Example
        // POST /kimchy,elasticsearch/_cache/clear?request=true
        // end::00629ea43db6ee1704183170df085495[]

        $curl = 'POST /kimchy,elasticsearch/_cache/clear?request=true';

        // TODO -- make assertion
    }

    /**
     * Tag:  adebfecf7485326e9f7fae9de9169abc
     * Line: 57
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL57_adebfecf7485326e9f7fae9de9169abc()
    {
        $client = $this->getClient();
        // tag::adebfecf7485326e9f7fae9de9169abc[]
        // TODO -- Implement Example
        // PUT /my_index
        // {
        //   "settings": {
        //     "index.requests.cache.enable": false
        //   }
        // }
        // end::adebfecf7485326e9f7fae9de9169abc[]

        $curl = 'PUT /my_index'
              . '{'
              . '  "settings": {'
              . '    "index.requests.cache.enable": false'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f22e069bc0c6f9dae57e084c662a86fd
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_f22e069bc0c6f9dae57e084c662a86fd()
    {
        $client = $this->getClient();
        // tag::f22e069bc0c6f9dae57e084c662a86fd[]
        // TODO -- Implement Example
        // PUT /my_index/_settings
        // { "index.requests.cache.enable": true }
        // end::f22e069bc0c6f9dae57e084c662a86fd[]

        $curl = 'PUT /my_index/_settings'
              . '{ "index.requests.cache.enable": true }';

        // TODO -- make assertion
    }

    /**
     * Tag:  13e9c7cdd43161f1336c94fd70a0db0c
     * Line: 86
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL86_13e9c7cdd43161f1336c94fd70a0db0c()
    {
        $client = $this->getClient();
        // tag::13e9c7cdd43161f1336c94fd70a0db0c[]
        // TODO -- Implement Example
        // GET /my_index/_search?request_cache=true
        // {
        //   "size": 0,
        //   "aggs": {
        //     "popular_colors": {
        //       "terms": {
        //         "field": "colors"
        //       }
        //     }
        //   }
        // }
        // end::13e9c7cdd43161f1336c94fd70a0db0c[]

        $curl = 'GET /my_index/_search?request_cache=true'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "popular_colors": {'
              . '      "terms": {'
              . '        "field": "colors"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  36da9668fef56910370f16bfb772cc40
     * Line: 144
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL144_36da9668fef56910370f16bfb772cc40()
    {
        $client = $this->getClient();
        // tag::36da9668fef56910370f16bfb772cc40[]
        // TODO -- Implement Example
        // GET /_stats/request_cache?human
        // end::36da9668fef56910370f16bfb772cc40[]

        $curl = 'GET /_stats/request_cache?human';

        // TODO -- make assertion
    }

    /**
     * Tag:  90631797c7fbda43902abf2cc0ea8304
     * Line: 152
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL152_90631797c7fbda43902abf2cc0ea8304()
    {
        $client = $this->getClient();
        // tag::90631797c7fbda43902abf2cc0ea8304[]
        // TODO -- Implement Example
        // GET /_nodes/stats/indices/request_cache?human
        // end::90631797c7fbda43902abf2cc0ea8304[]

        $curl = 'GET /_nodes/stats/indices/request_cache?human';

        // TODO -- make assertion
    }

// %__METHOD__%







}
