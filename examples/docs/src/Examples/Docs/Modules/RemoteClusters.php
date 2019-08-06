<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Modules;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: RemoteClusters
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   modules/remote-clusters.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class RemoteClusters extends SimpleExamplesTester {

    /**
     * Tag:  d4ce5a9672f85094e6d833d08debc018
     * Line: 103
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL103_d4ce5a9672f85094e6d833d08debc018()
    {
        $client = $this->getClient();
        // tag::d4ce5a9672f85094e6d833d08debc018[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster": {
        //       "remote": {
        //         "cluster_one": {
        //           "seeds": [
        //             "127.0.0.1:9300"
        //           ],
        //           "transport.ping_schedule": "30s"
        //         },
        //         "cluster_two": {
        //           "seeds": [
        //             "127.0.0.1:9301"
        //           ],
        //           "transport.compress": true,
        //           "skip_unavailable": true
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
        // end::d4ce5a9672f85094e6d833d08debc018[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster": {'
              . '      "remote": {'
              . '        "cluster_one": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9300"'
              . '          ],'
              . '          "transport.ping_schedule": "30s"'
              . '        },'
              . '        "cluster_two": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9301"'
              . '          ],'
              . '          "transport.compress": true,'
              . '          "skip_unavailable": true'
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
     * Tag:  328b7b4d0de6fac3a91205251de6e9b5
     * Line: 140
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL140_328b7b4d0de6fac3a91205251de6e9b5()
    {
        $client = $this->getClient();
        // tag::328b7b4d0de6fac3a91205251de6e9b5[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster": {
        //       "remote": {
        //         "cluster_one": {
        //           "seeds": [
        //             "127.0.0.1:9300"
        //           ],
        //           "transport.ping_schedule": "60s"
        //         },
        //         "cluster_two": {
        //           "seeds": [
        //             "127.0.0.1:9301"
        //           ],
        //           "transport.compress": false
        //         }
        //       }
        //     }
        //   }
        // }
        // end::328b7b4d0de6fac3a91205251de6e9b5[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster": {'
              . '      "remote": {'
              . '        "cluster_one": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9300"'
              . '          ],'
              . '          "transport.ping_schedule": "60s"'
              . '        },'
              . '        "cluster_two": {'
              . '          "seeds": ['
              . '            "127.0.0.1:9301"'
              . '          ],'
              . '          "transport.compress": false'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2a0d451f9e13aca39467883b16270cc2
     * Line: 173
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL173_2a0d451f9e13aca39467883b16270cc2()
    {
        $client = $this->getClient();
        // tag::2a0d451f9e13aca39467883b16270cc2[]
        // TODO -- Implement Example
        // PUT _cluster/settings
        // {
        //   "persistent": {
        //     "cluster": {
        //       "remote": {
        //         "cluster_two": { \<1>
        //           "seeds": null,
        //           "skip_unavailable": null,
        //           "transport": {
        //             "compress": null
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::2a0d451f9e13aca39467883b16270cc2[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '  "persistent": {'
              . '    "cluster": {'
              . '      "remote": {'
              . '        "cluster_two": { \<1>'
              . '          "seeds": null,'
              . '          "skip_unavailable": null,'
              . '          "transport": {'
              . '            "compress": null'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%




}
