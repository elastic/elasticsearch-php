<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Get
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/get.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Get extends SimpleExamplesTester {

    /**
     * Tag:  fbcf5078a6a9e09790553804054c36b3
     * Line: 9
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL9_fbcf5078a6a9e09790553804054c36b3()
    {
        $client = $this->getClient();
        // tag::fbcf5078a6a9e09790553804054c36b3[]
        $params = [
            'index' => 'twitter',
            'id'    => '0',
        ];
        $response = $client->get($params);
        // end::fbcf5078a6a9e09790553804054c36b3[]

        $curl = 'GET twitter/_doc/0';

        // TODO -- make assertion
    }

    /**
     * Tag:  98234499cfec70487cec5d013e976a84
     * Line: 46
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL46_98234499cfec70487cec5d013e976a84()
    {
        $client = $this->getClient();
        // tag::98234499cfec70487cec5d013e976a84[]
        $params = [
            'index' => 'twitter',
            'id'    => '0',
        ];
        $response = $client->exists($params);
        // end::98234499cfec70487cec5d013e976a84[]

        $curl = 'HEAD twitter/_doc/0';

        // TODO -- make assertion
    }

    /**
     * Tag:  138ccd89f72aa7502dd9578403dcc589
     * Line: 72
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL72_138ccd89f72aa7502dd9578403dcc589()
    {
        $client = $this->getClient();
        // tag::138ccd89f72aa7502dd9578403dcc589[]
        $params = [
            'index'   => 'twitter',
            'id'      => '0',
            '_source' => false,
        ];
        $response = $client->get($params);
        // end::138ccd89f72aa7502dd9578403dcc589[]

        $curl = 'GET twitter/_doc/0?_source=false';

        // TODO -- make assertion
    }

    /**
     * Tag:  8fdf2344c4fb3de6902ad7c5735270df
     * Line: 84
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL84_8fdf2344c4fb3de6902ad7c5735270df()
    {
        $client = $this->getClient();
        // tag::8fdf2344c4fb3de6902ad7c5735270df[]
        $params = [
            'index'            => 'twitter',
            'id'               => '0',
            '_source_includes' => '*.id',
            '_source_excludes' => 'entities',
        ];
        $response = $client->get($params);
        // end::8fdf2344c4fb3de6902ad7c5735270df[]

        $curl = 'GET twitter/_doc/0?_source_includes=*.id&_source_excludes=entities';

        // TODO -- make assertion
    }

    /**
     * Tag:  745f9b8cdb8e91073f6e520e1d9f8c05
     * Line: 93
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL93_745f9b8cdb8e91073f6e520e1d9f8c05()
    {
        $client = $this->getClient();
        // tag::745f9b8cdb8e91073f6e520e1d9f8c05[]
        $params = [
            'index'   => 'twitter',
            'id'      => '0',
            '_source' => '*.id,retweeted',
        ];
        $response = $client->get($params);
        // end::745f9b8cdb8e91073f6e520e1d9f8c05[]

        $curl = 'GET twitter/_doc/0?_source=*.id,retweeted';

        // TODO -- make assertion
    }

    /**
     * Tag:  913770050ebbf3b9b549a899bc11060a
     * Line: 109
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL109_913770050ebbf3b9b549a899bc11060a()
    {
        $client = $this->getClient();
        // tag::913770050ebbf3b9b549a899bc11060a[]
        $params = [
            'index' => 'twitter',
            'body'  => [
                'mappings' => [
                    'properties' => [
                        'counter' => [
                            'type'  => 'integer',
                            'store' => false,
                        ],
                        'tags' => [
                            'type'  => 'keyword',
                            'store' => true,
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->indices()->putMapping($params);
        // end::913770050ebbf3b9b549a899bc11060a[]

        $curl = 'PUT twitter'
              . '{'
              . '   "mappings": {'
              . '       "properties": {'
              . '          "counter": {'
              . '             "type": "integer",'
              . '             "store": false'
              . '          },'
              . '          "tags": {'
              . '             "type": "keyword",'
              . '             "store": true'
              . '          }'
              . '       }'
              . '   }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5eabcdbf61bfcb484dc694f25c2bba36
     * Line: 131
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL131_5eabcdbf61bfcb484dc694f25c2bba36()
    {
        $client = $this->getClient();
        // tag::5eabcdbf61bfcb484dc694f25c2bba36[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'counter' => 1,
                'tags'    => ['red'],
            ],
        ];
        $response = $client->index($params);
        // end::5eabcdbf61bfcb484dc694f25c2bba36[]

        $curl = 'PUT twitter/_doc/1'
              . '{'
              . '    "counter" : 1,'
              . '    "tags" : ["red"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  710c7871f20f176d51209b1574b0d61b
     * Line: 144
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL144_710c7871f20f176d51209b1574b0d61b()
    {
        $client = $this->getClient();
        // tag::710c7871f20f176d51209b1574b0d61b[]
        $params = [
            'index'  => 'twitter',
            'id'     => '1',
            'fields' => 'tags,counter',
        ];
        $response = $client->get($params);
        // end::710c7871f20f176d51209b1574b0d61b[]

        $curl = 'GET twitter/_doc/1?stored_fields=tags,counter';

        // TODO -- make assertion
    }

    /**
     * Tag:  0ba0b2db24852abccb7c0fc1098d566e
     * Line: 178
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL178_0ba0b2db24852abccb7c0fc1098d566e()
    {
        $client = $this->getClient();
        // tag::0ba0b2db24852abccb7c0fc1098d566e[]
        $params = [
            'index' => 'twitter',
            'id'    => '2',
            'body'  => [
                'counter' => 1,
                'tags'    => ['white'],
            ],
            'routing' => 'user1',
        ];
        $response = $client->index($params);
        // end::0ba0b2db24852abccb7c0fc1098d566e[]

        $curl = 'PUT twitter/_doc/2?routing=user1'
              . '{'
              . '    "counter" : 1,'
              . '    "tags" : ["white"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  69a7be47f85138b10437113ab2f0d72d
     * Line: 189
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL189_69a7be47f85138b10437113ab2f0d72d()
    {
        $client = $this->getClient();
        // tag::69a7be47f85138b10437113ab2f0d72d[]
        $params = [
            'index'   => 'twitter',
            'id'      => '2',
            'routing' => 'user1',
            'fields'  => 'tags,counter',
        ];
        $response = $client->get($params);
        // end::69a7be47f85138b10437113ab2f0d72d[]

        $curl = 'GET twitter/_doc/2?routing=user1&stored_fields=tags,counter';

        // TODO -- make assertion
    }

    /**
     * Tag:  89a8ac1509936acc272fc2d72907bc45
     * Line: 229
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL229_89a8ac1509936acc272fc2d72907bc45()
    {
        $client = $this->getClient();
        // tag::89a8ac1509936acc272fc2d72907bc45[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
        ];
        $response = $client->getSource($params);
        // end::89a8ac1509936acc272fc2d72907bc45[]

        $curl = 'GET twitter/_source/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  d222c6a6ec7a3beca6c97011b0874512
     * Line: 238
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL238_d222c6a6ec7a3beca6c97011b0874512()
    {
        $client = $this->getClient();
        // tag::d222c6a6ec7a3beca6c97011b0874512[]
        // TODO -- Implement Example
        // GET twitter/_source/1/?_source_includes=*.id&_source_excludes=entities
        // end::d222c6a6ec7a3beca6c97011b0874512[]

        $curl = 'GET twitter/_source/1/?_source_includes=*.id&_source_excludes=entities';

        // TODO -- make assertion
    }

    /**
     * Tag:  2468ab381257d759d8a88af1141f6f9c
     * Line: 248
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL248_2468ab381257d759d8a88af1141f6f9c()
    {
        $client = $this->getClient();
        // tag::2468ab381257d759d8a88af1141f6f9c[]
        // TODO -- Implement Example
        // HEAD twitter/_source/1
        // end::2468ab381257d759d8a88af1141f6f9c[]

        $curl = 'HEAD twitter/_source/1';

        // TODO -- make assertion
    }

    /**
     * Tag:  1d65cb6d055c46a1bde809687d835b71
     * Line: 262
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL262_1d65cb6d055c46a1bde809687d835b71()
    {
        $client = $this->getClient();
        // tag::1d65cb6d055c46a1bde809687d835b71[]
        $params = [
            'index'   => 'twitter',
            'id'      => '1',
            'routing' => 'user1',
        ];
        $response = $client->get($params);
        // end::1d65cb6d055c46a1bde809687d835b71[]

        $curl = 'GET twitter/_doc/2?routing=user1';

        // TODO -- make assertion
    }

// %__METHOD__%

}
