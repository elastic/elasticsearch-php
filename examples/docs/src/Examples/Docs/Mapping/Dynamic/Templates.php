<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Mapping\Dynamic;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Templates
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   mapping/dynamic/templates.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Templates extends SimpleExamplesTester {

    /**
     * Tag:  bb33e638fdeded7d721d9bbac2305fda
     * Line: 71
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL71_bb33e638fdeded7d721d9bbac2305fda()
    {
        $client = $this->getClient();
        // tag::bb33e638fdeded7d721d9bbac2305fda[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "integers": {
        //           "match_mapping_type": "long",
        //           "mapping": {
        //             "type": "integer"
        //           }
        //         }
        //       },
        //       {
        //         "strings": {
        //           "match_mapping_type": "string",
        //           "mapping": {
        //             "type": "text",
        //             "fields": {
        //               "raw": {
        //                 "type":  "keyword",
        //                 "ignore_above": 256
        //               }
        //             }
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "my_integer": 5, \<1>
        //   "my_string": "Some string" \<2>
        // }
        // end::bb33e638fdeded7d721d9bbac2305fda[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "integers": {'
              . '          "match_mapping_type": "long",'
              . '          "mapping": {'
              . '            "type": "integer"'
              . '          }'
              . '        }'
              . '      },'
              . '      {'
              . '        "strings": {'
              . '          "match_mapping_type": "string",'
              . '          "mapping": {'
              . '            "type": "text",'
              . '            "fields": {'
              . '              "raw": {'
              . '                "type":  "keyword",'
              . '                "ignore_above": 256'
              . '              }'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "my_integer": 5, \<1>'
              . '  "my_string": "Some string" \<2>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  4f54b88e05c7a62901062e9e0ed13e5a
     * Line: 125
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL125_4f54b88e05c7a62901062e9e0ed13e5a()
    {
        $client = $this->getClient();
        // tag::4f54b88e05c7a62901062e9e0ed13e5a[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "longs_as_strings": {
        //           "match_mapping_type": "string",
        //           "match":   "long_*",
        //           "unmatch": "*_text",
        //           "mapping": {
        //             "type": "long"
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "long_num": "5", \<1>
        //   "long_text": "foo" \<2>
        // }
        // end::4f54b88e05c7a62901062e9e0ed13e5a[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "longs_as_strings": {'
              . '          "match_mapping_type": "string",'
              . '          "match":   "long_*",'
              . '          "unmatch": "*_text",'
              . '          "mapping": {'
              . '            "type": "long"'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "long_num": "5", \<1>'
              . '  "long_text": "foo" \<2>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0b91c082258ce623cc716b679aace653
     * Line: 179
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL179_0b91c082258ce623cc716b679aace653()
    {
        $client = $this->getClient();
        // tag::0b91c082258ce623cc716b679aace653[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "full_name": {
        //           "path_match":   "name.*",
        //           "path_unmatch": "*.middle",
        //           "mapping": {
        //             "type":       "text",
        //             "copy_to":    "full_name"
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "name": {
        //     "first":  "John",
        //     "middle": "Winston",
        //     "last":   "Lennon"
        //   }
        // }
        // end::0b91c082258ce623cc716b679aace653[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "full_name": {'
              . '          "path_match":   "name.*",'
              . '          "path_unmatch": "*.middle",'
              . '          "mapping": {'
              . '            "type":       "text",'
              . '            "copy_to":    "full_name"'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "name": {'
              . '    "first":  "John",'
              . '    "middle": "Winston",'
              . '    "last":   "Lennon"'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  be51ed37c8425d281a8153abe56b04cb
     * Line: 215
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL215_be51ed37c8425d281a8153abe56b04cb()
    {
        $client = $this->getClient();
        // tag::be51ed37c8425d281a8153abe56b04cb[]
        // TODO -- Implement Example
        // PUT my_index/_doc/2
        // {
        //   "name": {
        //     "first":  "Paul",
        //     "last":   "McCartney",
        //     "title": {
        //       "value": "Sir",
        //       "category": "order of chivalry"
        //     }
        //   }
        // }
        // end::be51ed37c8425d281a8153abe56b04cb[]

        $curl = 'PUT my_index/_doc/2'
              . '{'
              . '  "name": {'
              . '    "first":  "Paul",'
              . '    "last":   "McCartney",'
              . '    "title": {'
              . '      "value": "Sir",'
              . '      "category": "order of chivalry"'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6873971eb4e4577d76d0a5bd7cd15ef9
     * Line: 241
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL241_6873971eb4e4577d76d0a5bd7cd15ef9()
    {
        $client = $this->getClient();
        // tag::6873971eb4e4577d76d0a5bd7cd15ef9[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "named_analyzers": {
        //           "match_mapping_type": "string",
        //           "match": "*",
        //           "mapping": {
        //             "type": "text",
        //             "analyzer": "{name}"
        //           }
        //         }
        //       },
        //       {
        //         "no_doc_values": {
        //           "match_mapping_type":"*",
        //           "mapping": {
        //             "type": "{dynamic_type}",
        //             "doc_values": false
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // PUT my_index/_doc/1
        // {
        //   "english": "Some English text", \<1>
        //   "count":   5 \<2>
        // }
        // end::6873971eb4e4577d76d0a5bd7cd15ef9[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "named_analyzers": {'
              . '          "match_mapping_type": "string",'
              . '          "match": "*",'
              . '          "mapping": {'
              . '            "type": "text",'
              . '            "analyzer": "{name}"'
              . '          }'
              . '        }'
              . '      },'
              . '      {'
              . '        "no_doc_values": {'
              . '          "match_mapping_type":"*",'
              . '          "mapping": {'
              . '            "type": "{dynamic_type}",'
              . '            "doc_values": false'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}'
              . 'PUT my_index/_doc/1'
              . '{'
              . '  "english": "Some English text", \<1>'
              . '  "count":   5 \<2>'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  87f85bb49d18f73d0eed0b704e05eb90
     * Line: 293
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL293_87f85bb49d18f73d0eed0b704e05eb90()
    {
        $client = $this->getClient();
        // tag::87f85bb49d18f73d0eed0b704e05eb90[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "strings_as_keywords": {
        //           "match_mapping_type": "string",
        //           "mapping": {
        //             "type": "keyword"
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::87f85bb49d18f73d0eed0b704e05eb90[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "strings_as_keywords": {'
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

    /**
     * Tag:  1a59fa2708ccb3a24c71e8306b81f17f
     * Line: 322
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL322_1a59fa2708ccb3a24c71e8306b81f17f()
    {
        $client = $this->getClient();
        // tag::1a59fa2708ccb3a24c71e8306b81f17f[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "strings_as_text": {
        //           "match_mapping_type": "string",
        //           "mapping": {
        //             "type": "text"
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::1a59fa2708ccb3a24c71e8306b81f17f[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "strings_as_text": {'
              . '          "match_mapping_type": "string",'
              . '          "mapping": {'
              . '            "type": "text"'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3e60c0b29bd3931927e6f2ee7d2ed0ef
     * Line: 348
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL348_3e60c0b29bd3931927e6f2ee7d2ed0ef()
    {
        $client = $this->getClient();
        // tag::3e60c0b29bd3931927e6f2ee7d2ed0ef[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "strings_as_keywords": {
        //           "match_mapping_type": "string",
        //           "mapping": {
        //             "type": "text",
        //             "norms": false,
        //             "fields": {
        //               "keyword": {
        //                 "type": "keyword",
        //                 "ignore_above": 256
        //               }
        //             }
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::3e60c0b29bd3931927e6f2ee7d2ed0ef[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "strings_as_keywords": {'
              . '          "match_mapping_type": "string",'
              . '          "mapping": {'
              . '            "type": "text",'
              . '            "norms": false,'
              . '            "fields": {'
              . '              "keyword": {'
              . '                "type": "keyword",'
              . '                "ignore_above": 256'
              . '              }'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    ]'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9a91f7d0bf52d6c582c62daef5c9d040
     * Line: 387
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL387_9a91f7d0bf52d6c582c62daef5c9d040()
    {
        $client = $this->getClient();
        // tag::9a91f7d0bf52d6c582c62daef5c9d040[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "mappings": {
        //     "dynamic_templates": [
        //       {
        //         "unindexed_longs": {
        //           "match_mapping_type": "long",
        //           "mapping": {
        //             "type": "long",
        //             "index": false
        //           }
        //         }
        //       },
        //       {
        //         "unindexed_doubles": {
        //           "match_mapping_type": "double",
        //           "mapping": {
        //             "type": "float", \<1>
        //             "index": false
        //           }
        //         }
        //       }
        //     ]
        //   }
        // }
        // end::9a91f7d0bf52d6c582c62daef5c9d040[]

        $curl = 'PUT my_index'
              . '{'
              . '  "mappings": {'
              . '    "dynamic_templates": ['
              . '      {'
              . '        "unindexed_longs": {'
              . '          "match_mapping_type": "long",'
              . '          "mapping": {'
              . '            "type": "long",'
              . '            "index": false'
              . '          }'
              . '        }'
              . '      },'
              . '      {'
              . '        "unindexed_doubles": {'
              . '          "match_mapping_type": "double",'
              . '          "mapping": {'
              . '            "type": "float", \<1>'
              . '            "index": false'
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
