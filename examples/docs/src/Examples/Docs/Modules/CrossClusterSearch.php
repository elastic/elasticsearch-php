<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: CrossClusterSearch
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/cross-cluster-search.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class CrossClusterSearch extends SimpleExamplesTester {

    /**
     * Tag:  a8d39396d741e768083808bb11443e9b
     * Line: 16
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL16_a8d39396d741e768083808bb11443e9b()
    {
        $client = $this->getClient();
        // tag::a8d39396d741e768083808bb11443e9b[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster": {
        //       "remote": {
        //         "cluster_one": {
        //           "seeds": [
        //             "127.0.0.1:9300"
        //           ]
        //         },
        //         "cluster_two": {
        //           "seeds": [
        //             "127.0.0.1:9301"
        //           ]
        //         },
        //         "cluster_three": {
        //           "seeds": [
        //             "127.0.0.1:9302"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::a8d39396d741e768083808bb11443e9b[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster": {'
              . '      "remote": {'
              . '        "cluster_one": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9300"'
              . '          ]'
              . '        },'
              . '        "cluster_two": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9301"'
              . '          ]'
              . '        },'
              . '        "cluster_three": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9302"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  972c0c1b6c0b8327fadd77cc1c71b532
     * Line: 51
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL51_972c0c1b6c0b8327fadd77cc1c71b532()
    {
        $client = $this->getClient();
        // tag::972c0c1b6c0b8327fadd77cc1c71b532[]
        // TODO -- Implement Example
        // GET /cluster_one:twitter/_search
        // {
        //   "query": {
        //     "match": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::972c0c1b6c0b8327fadd77cc1c71b532[]

        $curl = 'GET /cluster_one:twitter/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  475943160dca26fd77e750eb586f72bb
     * Line: 112
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL112_475943160dca26fd77e750eb586f72bb()
    {
        $client = $this->getClient();
        // tag::475943160dca26fd77e750eb586f72bb[]
        // TODO -- Implement Example
        // GET /cluster_one:twitter,twitter/_search
        // {
        //   "query": {
        //     "match": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::475943160dca26fd77e750eb586f72bb[]

        $curl = 'GET /cluster_one:twitter,twitter/_search'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  530326f2f610142a4a314c49c216045b
     * Line: 197
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL197_530326f2f610142a4a314c49c216045b()
    {
        $client = $this->getClient();
        // tag::530326f2f610142a4a314c49c216045b[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster.remote.cluster_two.skip_unavailable": true \<1>
        //   }
        // }
        // end::530326f2f610142a4a314c49c216045b[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster.remote.cluster_two.skip_unavailable": true \<1>'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  89a950acef646a65bb947c862743ac61
     * Line: 210
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL210_89a950acef646a65bb947c862743ac61()
    {
        $client = $this->getClient();
        // tag::89a950acef646a65bb947c862743ac61[]
        // TODO -- Implement Example
        // GET /cluster_one:twitter,cluster_two:twitter,twitter/_search \<1>
        // {
        //   "query": {
        //     "match": {
        //       "user": "kimchy"
        //     }
        //   }
        // }
        // end::89a950acef646a65bb947c862743ac61[]

        $curl = 'GET /cluster_one:twitter,cluster_two:twitter,twitter/_search \<1>'
              . '{'
              . '  "query": {'
              . '    "match": {'
              . '      "user": "kimchy"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
