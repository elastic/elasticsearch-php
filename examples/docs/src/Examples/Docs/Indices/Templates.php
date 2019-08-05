<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Indices;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Templates
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   indices/templates.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Templates extends SimpleExamplesTester {

    /**
     * Tag:  e5f50b31f165462d883ecbff45f74985
     * Line: 18
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL18_e5f50b31f165462d883ecbff45f74985()
    {
        $client = $this->getClient();
        // tag::e5f50b31f165462d883ecbff45f74985[]
        // TODO -- Implement Example
        // PUT _template/template_1
        // {
        //   "index_patterns": ["te*", "bar*"],
        //   "settings": {
        //     "number_of_shards": 1
        //   },
        //   "mappings": {
        //     "_source": {
        //       "enabled": false
        //     },
        //     "properties": {
        //       "host_name": {
        //         "type": "keyword"
        //       },
        //       "created_at": {
        //         "type": "date",
        //         "format": "EEE MMM dd HH:mm:ss Z yyyy"
        //       }
        //     }
        //   }
        // }
        // end::e5f50b31f165462d883ecbff45f74985[]

        $curl = 'PUT _template/template_1'
              . '{'
              . '  "index_patterns": ["te*", "bar*"],'
              . '  "settings": {'
              . '    "number_of_shards": 1'
              . '  },'
              . '  "mappings": {'
              . '    "_source": {'
              . '      "enabled": false'
              . '    },'
              . '    "properties": {'
              . '      "host_name": {'
              . '        "type": "keyword"'
              . '      },'
              . '      "created_at": {'
              . '        "type": "date",'
              . '        "format": "EEE MMM dd HH:mm:ss Z yyyy"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1b8caf0a6741126c6d0ad83b56fce290
     * Line: 54
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL54_1b8caf0a6741126c6d0ad83b56fce290()
    {
        $client = $this->getClient();
        // tag::1b8caf0a6741126c6d0ad83b56fce290[]
        // TODO -- Implement Example
        // PUT _template/template_1
        // {
        //     "index_patterns" : ["te*"],
        //     "settings" : {
        //         "number_of_shards" : 1
        //     },
        //     "aliases" : {
        //         "alias1" : {},
        //         "alias2" : {
        //             "filter" : {
        //                 "term" : {"user" : "kimchy" }
        //             },
        //             "routing" : "kimchy"
        //         },
        //         "{index}-alias" : {} \<1>
        //     }
        // }
        // end::1b8caf0a6741126c6d0ad83b56fce290[]

        $curl = 'PUT _template/template_1'
              . '{'
              . '    "index_patterns" : ["te*"],'
              . '    "settings" : {'
              . '        "number_of_shards" : 1'
              . '    },'
              . '    "aliases" : {'
              . '        "alias1" : {},'
              . '        "alias2" : {'
              . '            "filter" : {'
              . '                "term" : {"user" : "kimchy" }'
              . '            },'
              . '            "routing" : "kimchy"'
              . '        },'
              . '        "{index}-alias" : {} \<1>'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0f0fba0061d26602cd5f401ca4a19be3
     * Line: 87
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL87_0f0fba0061d26602cd5f401ca4a19be3()
    {
        $client = $this->getClient();
        // tag::0f0fba0061d26602cd5f401ca4a19be3[]
        // TODO -- Implement Example
        // DELETE /_template/template_1
        // end::0f0fba0061d26602cd5f401ca4a19be3[]

        $curl = 'DELETE /_template/template_1';

        // TODO -- make assertion
    }

    /**
     * Tag:  02f65c6bab8f40bf3ce18160623d1870
     * Line: 100
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL100_02f65c6bab8f40bf3ce18160623d1870()
    {
        $client = $this->getClient();
        // tag::02f65c6bab8f40bf3ce18160623d1870[]
        // TODO -- Implement Example
        // GET /_template/template_1
        // end::02f65c6bab8f40bf3ce18160623d1870[]

        $curl = 'GET /_template/template_1';

        // TODO -- make assertion
    }

    /**
     * Tag:  f1a1ce2bbd82b7b2a8df2796cd2f0c98
     * Line: 108
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL108_f1a1ce2bbd82b7b2a8df2796cd2f0c98()
    {
        $client = $this->getClient();
        // tag::f1a1ce2bbd82b7b2a8df2796cd2f0c98[]
        // TODO -- Implement Example
        // GET /_template/temp*
        // GET /_template/template_1,template_2
        // end::f1a1ce2bbd82b7b2a8df2796cd2f0c98[]

        $curl = 'GET /_template/temp*'
              . 'GET /_template/template_1,template_2';

        // TODO -- make assertion
    }

    /**
     * Tag:  fd2d289e6b725fcc3cbe8fe7ffe02ea0
     * Line: 117
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL117_fd2d289e6b725fcc3cbe8fe7ffe02ea0()
    {
        $client = $this->getClient();
        // tag::fd2d289e6b725fcc3cbe8fe7ffe02ea0[]
        // TODO -- Implement Example
        // GET /_template
        // end::fd2d289e6b725fcc3cbe8fe7ffe02ea0[]

        $curl = 'GET /_template';

        // TODO -- make assertion
    }

    /**
     * Tag:  aea94bf2da993bfde1c73bd552eee2ae
     * Line: 129
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL129_aea94bf2da993bfde1c73bd552eee2ae()
    {
        $client = $this->getClient();
        // tag::aea94bf2da993bfde1c73bd552eee2ae[]
        // TODO -- Implement Example
        // HEAD _template/template_1
        // end::aea94bf2da993bfde1c73bd552eee2ae[]

        $curl = 'HEAD _template/template_1';

        // TODO -- make assertion
    }

    /**
     * Tag:  b5f95bc097a201b29c7200fc8d3d31c1
     * Line: 153
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL153_b5f95bc097a201b29c7200fc8d3d31c1()
    {
        $client = $this->getClient();
        // tag::b5f95bc097a201b29c7200fc8d3d31c1[]
        // TODO -- Implement Example
        // PUT /_template/template_1
        // {
        //     "index_patterns" : ["*"],
        //     "order" : 0,
        //     "settings" : {
        //         "number_of_shards" : 1
        //     },
        //     "mappings" : {
        //         "_source" : { "enabled" : false }
        //     }
        // }
        // PUT /_template/template_2
        // {
        //     "index_patterns" : ["te*"],
        //     "order" : 1,
        //     "settings" : {
        //         "number_of_shards" : 1
        //     },
        //     "mappings" : {
        //         "_source" : { "enabled" : true }
        //     }
        // }
        // end::b5f95bc097a201b29c7200fc8d3d31c1[]

        $curl = 'PUT /_template/template_1'
              . '{'
              . '    "index_patterns" : ["*"],'
              . '    "order" : 0,'
              . '    "settings" : {'
              . '        "number_of_shards" : 1'
              . '    },'
              . '    "mappings" : {'
              . '        "_source" : { "enabled" : false }'
              . '    }'
              . '}'
              . 'PUT /_template/template_2'
              . '{'
              . '    "index_patterns" : ["te*"],'
              . '    "order" : 1,'
              . '    "settings" : {'
              . '        "number_of_shards" : 1'
              . '    },'
              . '    "mappings" : {'
              . '        "_source" : { "enabled" : true }'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9166cf38427d5cde5d2ec12a2012b669
     * Line: 201
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL201_9166cf38427d5cde5d2ec12a2012b669()
    {
        $client = $this->getClient();
        // tag::9166cf38427d5cde5d2ec12a2012b669[]
        // TODO -- Implement Example
        // PUT /_template/template_1
        // {
        //     "index_patterns" : ["*"],
        //     "order" : 0,
        //     "settings" : {
        //         "number_of_shards" : 1
        //     },
        //     "version": 123
        // }
        // end::9166cf38427d5cde5d2ec12a2012b669[]

        $curl = 'PUT /_template/template_1'
              . '{'
              . '    "index_patterns" : ["*"],'
              . '    "order" : 0,'
              . '    "settings" : {'
              . '        "number_of_shards" : 1'
              . '    },'
              . '    "version": 123'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  46658f00edc4865dfe472a392374cd0f
     * Line: 219
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL219_46658f00edc4865dfe472a392374cd0f()
    {
        $client = $this->getClient();
        // tag::46658f00edc4865dfe472a392374cd0f[]
        // TODO -- Implement Example
        // GET /_template/template_1?filter_path=*.version
        // end::46658f00edc4865dfe472a392374cd0f[]

        $curl = 'GET /_template/template_1?filter_path=*.version';

        // TODO -- make assertion
    }

// %__METHOD__%











}
