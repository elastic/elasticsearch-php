<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\How-to;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: DiskUsage
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   how-to/disk-usage.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class DiskUsage extends SimpleExamplesTester {

    /**
     * Tag:  e273060a675c959fd5f3cde27c8aff07
     * Line: 14
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL14_e273060a675c959fd5f3cde27c8aff07()
    {
        $client = $this->getClient();
        // tag::e273060a675c959fd5f3cde27c8aff07[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "integer",
        //         "index": false
        //       }
        //     }
        //   }
        // }
        // end::e273060a675c959fd5f3cde27c8aff07[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "integer",'
              . '        "index": false'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c8568f4f02f75db9afd669880db98a16
     * Line: 35
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL35_c8568f4f02f75db9afd669880db98a16()
    {
        $client = $this->getClient();
        // tag::c8568f4f02f75db9afd669880db98a16[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "text",
        //         "norms": false
        //       }
        //     }
        //   }
        // }
        // end::c8568f4f02f75db9afd669880db98a16[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "text",'
              . '        "norms": false'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1a5cd30017368fe4888454a13c6e8561
     * Line: 56
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL56_1a5cd30017368fe4888454a13c6e8561()
    {
        $client = $this->getClient();
        // tag::1a5cd30017368fe4888454a13c6e8561[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "text",
        //         "index_options": "freqs"
        //       }
        //     }
        //   }
        // }
        // end::1a5cd30017368fe4888454a13c6e8561[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "text",'
              . '        "index_options": "freqs"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ae3ae58724c413734b67a90a6ddb319f
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_ae3ae58724c413734b67a90a6ddb319f()
    {
        $client = $this->getClient();
        // tag::ae3ae58724c413734b67a90a6ddb319f[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "properties": {
        //       "foo": {
        //         "type": "text",
        //         "norms": false,
        //         "index_options": "freqs"
        //       }
        //     }
        //   }
        // }
        // end::ae3ae58724c413734b67a90a6ddb319f[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "properties": {'
              . '      "foo": {'
              . '        "type": "text",'
              . '        "norms": false,'
              . '        "index_options": "freqs"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  597d456edfcb3d410954a3e9b5babf9a
     * Line: 110
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL110_597d456edfcb3d410954a3e9b5babf9a()
    {
        $client = $this->getClient();
        // tag::597d456edfcb3d410954a3e9b5babf9a[]
        // TODO -- Implement Example
        // PUT index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "strings": {
        //           "match_mapping_type": "string",
        //           "mapping": {
        //             "type": "keyword"
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::597d456edfcb3d410954a3e9b5babf9a[]

        $curl = 'PUT index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "strings": {'
              . '          "match_mapping_type": "string",'
              . '          "mapping": {'
              . '            "type": "keyword"'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%






}
