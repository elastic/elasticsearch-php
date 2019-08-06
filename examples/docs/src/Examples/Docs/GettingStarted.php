<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: GettingStarted
 *
 * Date: 2019-08-05 07:33:01
 *
 * @source   getting-started.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class GettingStarted extends SimpleExamplesTester {

    /**
     * Tag:  f8cc4b331a19ff4df8e4a490f906ee69
     * Line: 209
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL209_f8cc4b331a19ff4df8e4a490f906ee69()
    {
        $client = $this->getClient();
        // tag::f8cc4b331a19ff4df8e4a490f906ee69[]
        $response = $client->cat()->health(['v' => true]);
        // end::f8cc4b331a19ff4df8e4a490f906ee69[]

        $curl = 'GET /_cat/health?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  db20adb70a8e8d0709d15ba0daf18d23
     * Line: 240
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL240_db20adb70a8e8d0709d15ba0daf18d23()
    {
        $client = $this->getClient();
        // tag::db20adb70a8e8d0709d15ba0daf18d23[]
        $response = $client->cat()->nodes(['v' => true]);
        // end::db20adb70a8e8d0709d15ba0daf18d23[]

        $curl = 'GET /_cat/nodes?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  c3fa04519df668d6c27727a12ab09648
     * Line: 263
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL263_c3fa04519df668d6c27727a12ab09648()
    {
        $client = $this->getClient();
        // tag::c3fa04519df668d6c27727a12ab09648[]
        $response = $client->cat()->indices(['v' => true]);
        // end::c3fa04519df668d6c27727a12ab09648[]

        $curl = 'GET /_cat/indices?v';

        // TODO -- make assertion
    }

        /**
     * Tag:  0caf6b6b092ecbcf6f996053678a2384
     * Line: 284
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL284_0caf6b6b092ecbcf6f996053678a2384()
    {
        $client = $this->getClient();
        // tag::0caf6b6b092ecbcf6f996053678a2384[]
        // PUT /customer?pretty
        $response = $client->cat()->indices(['v' => true]);
        // end::0caf6b6b092ecbcf6f996053678a2384[]

        $curl = 'PUT /customer?pretty'
              . 'GET /_cat/indices?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  21fe98843fe0b5473f515d21803db409
     * Line: 311
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL311_21fe98843fe0b5473f515d21803db409()
    {
        $client = $this->getClient();
        // tag::21fe98843fe0b5473f515d21803db409[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'name' => 'John Doe',
            ],
        ];
        $response = $client->index($params);
        // end::21fe98843fe0b5473f515d21803db409[]

        $curl = 'PUT /customer/_doc/1?pretty'
              . '{'
              . '  "name": "John Doe"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  37a3b66b555aed55618254f50d572cd6
     * Line: 347
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL347_37a3b66b555aed55618254f50d572cd6()
    {
        $client = $this->getClient();
        // tag::37a3b66b555aed55618254f50d572cd6[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
        ];
        $response = $client->get($params);
        // end::37a3b66b555aed55618254f50d572cd6[]

        $curl = 'GET /customer/_doc/1?pretty';

        // TODO -- make assertion
    }

    /**
     * Tag:  92e3c75133dc4fdb2cc65f149001b40b
     * Line: 378
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL378_92e3c75133dc4fdb2cc65f149001b40b()
    {
        $client = $this->getClient();
        // tag::92e3c75133dc4fdb2cc65f149001b40b[]
        $client->indices->delete(['index' => 'customer']);
        $response = $client->cat()->indices(['v' => true]);
        // end::92e3c75133dc4fdb2cc65f149001b40b[]

        $curl = 'DELETE /customer?pretty'
              . 'GET /_cat/indices?v';

        // TODO -- make assertion
    }

    /**
     * Tag:  fa5f618ced25ed2e67a1439bb77ba340
     * Line: 398
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL398_fa5f618ced25ed2e67a1439bb77ba340()
    {
        $client = $this->getClient();
        // tag::fa5f618ced25ed2e67a1439bb77ba340[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'name' => 'John Doe',
            ],
        ];
        $response = $client->index($params);

        $params = [
            'index' => 'customer',
            'id'    => '1',
        ];
        $response = $client->get($params);

        $client->indices->delete(['index' => 'customer']);
        // end::fa5f618ced25ed2e67a1439bb77ba340[]

        $curl = 'PUT /customer'
              . 'PUT /customer/_doc/1'
              . '{'
              . '  "name": "John Doe"'
              . '}'
              . 'GET /customer/_doc/1'
              . 'DELETE /customer';

        // TODO -- make assertion
    }

    /**
     * Tag:  21fe98843fe0b5473f515d21803db409
     * Line: 431
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL431_21fe98843fe0b5473f515d21803db409()
    {
        $client = $this->getClient();
        // tag::21fe98843fe0b5473f515d21803db409[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'name' => 'Jane Doe',
            ],
        ];
        $response = $client->index($params);
        // end::21fe98843fe0b5473f515d21803db409[]

        $curl = 'PUT /customer/_doc/1?pretty'
              . '{'
              . '  "name": "John Doe"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  75bda7da7fefff2c16f0423a9aa41c6e
     * Line: 442
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL442_75bda7da7fefff2c16f0423a9aa41c6e()
    {
        $client = $this->getClient();
        // tag::75bda7da7fefff2c16f0423a9aa41c6e[]
        $params = [
            'index' => 'customer',
            'id'    => '2',
            'body'  => [
                'name' => 'Jane Doe',
            ],
        ];
        $response = $client->index($params);
        // end::75bda7da7fefff2c16f0423a9aa41c6e[]

        $curl = 'PUT /customer/_doc/1?pretty'
              . '{'
              . '  "name": "Jane Doe"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  37c778346eb67042df5e8edf2485e40a
     * Line: 454
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL454_37c778346eb67042df5e8edf2485e40a()
    {
        $client = $this->getClient();
        // tag::37c778346eb67042df5e8edf2485e40a[]
        $params = [
            'index' => 'customer',
            'body'  => [
                'name' => 'Jane Doe',
            ],
        ];
        $response = $client->index($params);
        // end::37c778346eb67042df5e8edf2485e40a[]

        $curl = 'PUT /customer/_doc/2?pretty'
              . '{'
              . '  "name": "Jane Doe"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1c0f3b0bc4b7e53b53755fd3bda5b8cf
     * Line: 470
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL470_1c0f3b0bc4b7e53b53755fd3bda5b8cf()
    {
        $client = $this->getClient();
        // tag::1c0f3b0bc4b7e53b53755fd3bda5b8cf[]
        $params = [
            'index' => 'customer',
            'body'  => [
                'name' => 'Jane Doe',
            ],
        ];
        $response = $client->index($params);
        // end::1c0f3b0bc4b7e53b53755fd3bda5b8cf[]

        $curl = 'POST /customer/_doc?pretty'
              . '{'
              . '  "name": "Jane Doe"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  6a8d7b34f2b42d5992aaa1ff147062d9
     * Line: 489
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL489_6a8d7b34f2b42d5992aaa1ff147062d9()
    {
        $client = $this->getClient();
        // tag::6a8d7b34f2b42d5992aaa1ff147062d9[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'doc'   => [
                    'name' => 'Jane Doe',
                ],
            ],
        ];
        $response = $client->update($params);
        // end::6a8d7b34f2b42d5992aaa1ff147062d9[]

        $curl = 'POST /customer/_update/1?pretty'
              . '{'
              . '  "doc": { "name": "Jane Doe" }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  731621af937d66170347b9cc6b4a3c48
     * Line: 501
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL501_731621af937d66170347b9cc6b4a3c48()
    {
        $client = $this->getClient();
        // tag::731621af937d66170347b9cc6b4a3c48[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'doc'   => [
                    'name' => 'Jane Doe',
                    'age'  => 20,
                ],
            ],
        ];
        $response = $client->update($params);
        // end::731621af937d66170347b9cc6b4a3c48[]

        $curl = 'POST /customer/_update/1?pretty'
              . '{'
              . '  "doc": { "name": "Jane Doe", "age": 20 }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  38dfa309717488362d0f784e17ebd1b5
     * Line: 513
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL513_38dfa309717488362d0f784e17ebd1b5()
    {
        $client = $this->getClient();
        // tag::38dfa309717488362d0f784e17ebd1b5[]
        $params = [
            'index' => 'customer',
            'id'    => '1',
            'body'  => [
                'script' => 'ctx._source.age += n',
                'params' => [
                    'n' => 5,
                ],
            ],
        ];
        $response = $client->update($params);
        // end::38dfa309717488362d0f784e17ebd1b5[]

        $curl = 'POST /customer/_update/1?pretty'
              . '{'
              . '  "script" : "ctx._source.age += 5"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9c5ef83db886840355ff662b6e9ae8ab
     * Line: 532
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL532_9c5ef83db886840355ff662b6e9ae8ab()
    {
        $client = $this->getClient();
        // tag::9c5ef83db886840355ff662b6e9ae8ab[]
        $params = [
            'index' => 'customer',
            'id'    => '2',
        ];
        $response = $client->delete($params);
        // end::9c5ef83db886840355ff662b6e9ae8ab[]

        $curl = 'DELETE /customer/_doc/2?pretty';

        // TODO -- make assertion
    }

    /**
     * Tag:  7d32a32357b5ea8819b72608fcc6fd07
     * Line: 550
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL550_7d32a32357b5ea8819b72608fcc6fd07()
    {
        $client = $this->getClient();
        // tag::7d32a32357b5ea8819b72608fcc6fd07[]
        $params = [
            'body' => [
                ['index' => ['_index' => 'customer', '_id' => 1]],
                ['name' => 'John Doe'],
                ['index' => ['_index' => 'customer', '_id' => 2]],
                ['name' => 'Jane Doe'],
            ]
        ];
        $responses = $client->bulk($params);
        // end::7d32a32357b5ea8819b72608fcc6fd07[]

        $curl = 'POST /customer/_bulk?pretty'
              . '{"index":{"_id":"1"}}'
              . '{"name": "John Doe" }'
              . '{"index":{"_id":"2"}}'
              . '{"name": "Jane Doe" }';

        // TODO -- make assertion
    }

    /**
     * Tag:  193864342d9f0a36ec84a91ca325f5ec
     * Line: 562
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL562_193864342d9f0a36ec84a91ca325f5ec()
    {
        $client = $this->getClient();
        // tag::193864342d9f0a36ec84a91ca325f5ec[]
        $params = [
            'body' => [
                ['index' => ['_index' => 'customer', '_id' => 1]],
                ['name' => 'John Doe becomes Jane Doe'],
                ['delete' => ['_index' => 'customer', '_id' => 2]],
            ]
        ];
        $responses = $client->bulk($params);
        // end::193864342d9f0a36ec84a91ca325f5ec[]

        $curl = 'POST /customer/_bulk?pretty'
              . '{"update":{"_id":"1"}}'
              . '{"doc": { "name": "John Doe becomes Jane Doe" } }'
              . '{"delete":{"_id":"2"}}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c181969ef91c3b4a2513c1885be98e26
     * Line: 647
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL647_c181969ef91c3b4a2513c1885be98e26()
    {
        $client = $this->getClient();
        // tag::c181969ef91c3b4a2513c1885be98e26[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'q' => '*',
                ],
            ],
            'sort' => [
                'account_number' => 'asc',
            ],
        ];
        $response = $client->search($params);
        // end::c181969ef91c3b4a2513c1885be98e26[]

        $curl = 'GET /bank/_search?q=*&sort=account_number:asc&pretty';

        // TODO -- make assertion
    }

    /**
     * Tag:  506844befdc5691d835771bcbb1c1a60
     * Line: 720
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL720_506844befdc5691d835771bcbb1c1a60()
    {
        $client = $this->getClient();
        // tag::506844befdc5691d835771bcbb1c1a60[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
            'sort' => [
                'account_number' => 'asc',
            ],
        ];
        $response = $client->search($params);
        // end::506844befdc5691d835771bcbb1c1a60[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} },'
              . '  "sort": ['
              . '    { "account_number": "asc" }'
              . '  ]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  345ea7e9cb5af9e052ce0cf6f1f52c23
     * Line: 789
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL789_345ea7e9cb5af9e052ce0cf6f1f52c23()
    {
        $client = $this->getClient();
        // tag::345ea7e9cb5af9e052ce0cf6f1f52c23[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ]
        ];
        $response = $client->search($params);
        // end::345ea7e9cb5af9e052ce0cf6f1f52c23[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3d7527bb7ac3b0e1f97b22bdfeb99070
     * Line: 805
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL805_3d7527bb7ac3b0e1f97b22bdfeb99070()
    {
        $client = $this->getClient();
        // tag::3d7527bb7ac3b0e1f97b22bdfeb99070[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
            'size' => 1,
        ];
        $response = $client->search($params);
        // end::3d7527bb7ac3b0e1f97b22bdfeb99070[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} },'
              . '  "size": 1'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  3c31f9eb032861bff64abd8b14758991
     * Line: 820
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL820_3c31f9eb032861bff64abd8b14758991()
    {
        $client = $this->getClient();
        // tag::3c31f9eb032861bff64abd8b14758991[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
            'from' => 10,
            'size' => 10,
        ];
        $response = $client->search($params);
        // end::3c31f9eb032861bff64abd8b14758991[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} },'
              . '  "from": 10,'
              . '  "size": 10'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e8035a7476601ad4b136edb250f92d53
     * Line: 836
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL836_e8035a7476601ad4b136edb250f92d53()
    {
        $client = $this->getClient();
        // tag::e8035a7476601ad4b136edb250f92d53[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
            'sort' => [
                'balance' => 'desc',
            ],
        ];
        $response = $client->search($params);
        // end::e8035a7476601ad4b136edb250f92d53[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} },'
              . '  "sort": { "balance": { "order": "desc" } }'
              . '}';

        // TODO -- make assertion
    }

        /**
     * Tag:  b8459547da50aebddbcdd1aaaac02b5f
     * Line: 854
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL854_b8459547da50aebddbcdd1aaaac02b5f()
    {
        $client = $this->getClient();
        // tag::b8459547da50aebddbcdd1aaaac02b5f[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_all' => new \stdClass(),
                ],
            ],
            '_source' => ['account_number', 'balance'],
        ];
        $response = $client->search($params);
        // end::b8459547da50aebddbcdd1aaaac02b5f[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_all": {} },'
              . '  "_source": ["account_number", "balance"]'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2e6bfd38c9bcb728227f0d4dd11c09a2
     * Line: 873
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL873_2e6bfd38c9bcb728227f0d4dd11c09a2()
    {
        $client = $this->getClient();
        // tag::2e6bfd38c9bcb728227f0d4dd11c09a2[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match' => [
                        'account_number' => 20,
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::2e6bfd38c9bcb728227f0d4dd11c09a2[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match": { "account_number": 20 } }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b8eab60f6441edf314306d8194c7cd56
     * Line: 885
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL885_b8eab60f6441edf314306d8194c7cd56()
    {
        $client = $this->getClient();
        // tag::b8eab60f6441edf314306d8194c7cd56[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match' => [
                        'address' => 'mill',
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::b8eab60f6441edf314306d8194c7cd56[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match": { "address": "mill" } }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cd247f267968aa0927bfdad56852f8f5
     * Line: 897
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL897_cd247f267968aa0927bfdad56852f8f5()
    {
        $client = $this->getClient();
        // tag::cd247f267968aa0927bfdad56852f8f5[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match' => [
                        'address' => 'mill lane',
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::cd247f267968aa0927bfdad56852f8f5[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match": { "address": "mill lane" } }'
              . '}';

        // TODO -- make assertion
    }

        /**
     * Tag:  231aa0bb39c35fe199d28fe0e4a62b2e
     * Line: 909
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL909_231aa0bb39c35fe199d28fe0e4a62b2e()
    {
        $client = $this->getClient();
        // tag::231aa0bb39c35fe199d28fe0e4a62b2e[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'match_phrase' => [
                        'address' => 'mill lane',
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::231aa0bb39c35fe199d28fe0e4a62b2e[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": { "match_phrase": { "address": "mill lane" } }'
              . '}';

        // TODO -- make assertion
    }

        /**
     * Tag:  2de2349b7010652ca6104fb60f531a80
     * Line: 923
     * Date: 2019-08-05 07:33:01
     *
     * TODO: implement
     */
    public function testExampleL923_2de2349b7010652ca6104fb60f531a80()
    {
        $client = $this->getClient();
        // tag::2de2349b7010652ca6104fb60f531a80[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => [
                            ['match' => ['address' => 'mill']],
                            ['match' => ['address' => 'lane']],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::2de2349b7010652ca6104fb60f531a80[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": ['
              . '        { "match": { "address": "mill" } },'
              . '        { "match": { "address": "lane" } }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  171d3a3af2d0f46cae5896c5bd3da4b5
     * Line: 944
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL944_171d3a3af2d0f46cae5896c5bd3da4b5()
    {
        $client = $this->getClient();
        // tag::171d3a3af2d0f46cae5896c5bd3da4b5[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'bool' => [
                        'should' => [
                            ['match' => ['address' => 'mill']],
                            ['match' => ['address' => 'lane']],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::171d3a3af2d0f46cae5896c5bd3da4b5[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "should": ['
              . '        { "match": { "address": "mill" } },'
              . '        { "match": { "address": "lane" } }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5d38d4da86157b897e4876674bd169ef
     * Line: 965
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL965_5d38d4da86157b897e4876674bd169ef()
    {
        $client = $this->getClient();
        // tag::5d38d4da86157b897e4876674bd169ef[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must_not' => [
                            ['match' => ['address' => 'mill']],
                            ['match' => ['address' => 'lane']],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::5d38d4da86157b897e4876674bd169ef[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must_not": ['
              . '        { "match": { "address": "mill" } },'
              . '        { "match": { "address": "lane" } }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  47bb632c6091ad0cd94bc660bdd309a5
     * Line: 988
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL988_47bb632c6091ad0cd94bc660bdd309a5()
    {
        $client = $this->getClient();
        // tag::47bb632c6091ad0cd94bc660bdd309a5[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => [
                            ['match' => ['age' => '40']],
                        ],
                        'must_not' => [
                            ['match' => ['state' => 'ID']],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::47bb632c6091ad0cd94bc660bdd309a5[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": ['
              . '        { "match": { "age": "40" } }'
              . '      ],'
              . '      "must_not": ['
              . '        { "match": { "state": "ID" } }'
              . '      ]'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  251ea12c1248385ab409906ac64d9ee9
     * Line: 1018
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL1018_251ea12c1248385ab409906ac64d9ee9()
    {
        $client = $this->getClient();
        // tag::251ea12c1248385ab409906ac64d9ee9[]
        $params = [
            'index' => 'bank',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => [
                            ['match_all' => new \stdClass(),],
                        ],
                        'filter' => [
                            'range' => [
                                'balance' => [
                                    'lte' => 20000,
                                    'gte' => 30000,
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::251ea12c1248385ab409906ac64d9ee9[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "query": {'
              . '    "bool": {'
              . '      "must": { "match_all": {} },'
              . '      "filter": {'
              . '        "range": {'
              . '          "balance": {'
              . '            "gte": 20000,'
              . '            "lte": 30000'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  feefeb68144002fd1fff57b77b95b85e
     * Line: 1051
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL1051_feefeb68144002fd1fff57b77b95b85e()
    {
        $client = $this->getClient();
        // tag::feefeb68144002fd1fff57b77b95b85e[]
        $params = [
            'index' => 'bank',
            'size'  => 0,
            'body'  => [
                'aggs' => [
                    'group_by_state' => [
                        'terms' => [
                            'field' => 'state.keyword',
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::feefeb68144002fd1fff57b77b95b85e[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "group_by_state": {'
              . '      "terms": {'
              . '        "field": "state.keyword"'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cfbaea6f0df045c5d940bbb6a9c69cd8
     * Line: 1144
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL1144_cfbaea6f0df045c5d940bbb6a9c69cd8()
    {
        $client = $this->getClient();
        // tag::cfbaea6f0df045c5d940bbb6a9c69cd8[]
        $params = [
            'index' => 'bank',
            'size'  => 0,
            'body'  => [
                'aggs' => [
                    'group_by_state' => [
                        'terms' => [
                            'field' => 'state.keyword',
                        ],
                        'aggs' => [
                            'average_balance' => [
                                'avg' => [
                                    'field' => 'balance',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::cfbaea6f0df045c5d940bbb6a9c69cd8[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "group_by_state": {'
              . '      "terms": {'
              . '        "field": "state.keyword"'
              . '      },'
              . '      "aggs": {'
              . '        "average_balance": {'
              . '          "avg": {'
              . '            "field": "balance"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  645796e8047967ca4a7635a22a876f4c
     * Line: 1172
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL1172_645796e8047967ca4a7635a22a876f4c()
    {
        $client = $this->getClient();
        // tag::645796e8047967ca4a7635a22a876f4c[]
        $params = [
            'index' => 'bank',
            'size'  => 0,
            'body'  => [
                'aggs' => [
                    'group_by_state' => [
                        'terms' => [
                            'field' => 'state.keyword',
                            'order' => [
                                'average_balance' => 'desc',
                            ],
                        ],
                        'aggs' => [
                            'average_balance' => [
                                'avg' => [
                                    'field' => 'balance',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::645796e8047967ca4a7635a22a876f4c[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "group_by_state": {'
              . '      "terms": {'
              . '        "field": "state.keyword",'
              . '        "order": {'
              . '          "average_balance": "desc"'
              . '        }'
              . '      },'
              . '      "aggs": {'
              . '        "average_balance": {'
              . '          "avg": {'
              . '            "field": "balance"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  c84b5f9c6528f84a08c5318b3385d55c
     * Line: 1201
     * Date: 2019-08-05 07:33:01
     */
    public function testExampleL1201_c84b5f9c6528f84a08c5318b3385d55c()
    {
        $client = $this->getClient();
        // tag::c84b5f9c6528f84a08c5318b3385d55c[]
        $params = [
            'index' => 'bank',
            'size'  => 0,
            'body'  => [
                'aggs' => [
                    'group_by_age' => [
                        'range' => [
                            'field' => 'age',
                            'ranges'=> [
                                ['from' => 20, 'to' => 30],
                                ['from' => 30, 'to' => 40],
                                ['from' => 40, 'to' => 50],
                            ],
                        ],
                        'aggs' => [
                            'group_by_gender' => [
                                'terms' => [
                                    'field' => 'gender',
                                ],
                            ],
                            'aggs' => [
                                'average_balance' => [
                                    'avg' => [
                                        'field' => 'balance',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = $client->search($params);
        // end::c84b5f9c6528f84a08c5318b3385d55c[]

        $curl = 'GET /bank/_search'
              . '{'
              . '  "size": 0,'
              . '  "aggs": {'
              . '    "group_by_age": {'
              . '      "range": {'
              . '        "field": "age",'
              . '        "ranges": ['
              . '          {'
              . '            "from": 20,'
              . '            "to": 30'
              . '          },'
              . '          {'
              . '            "from": 30,'
              . '            "to": 40'
              . '          },'
              . '          {'
              . '            "from": 40,'
              . '            "to": 50'
              . '          }'
              . '        ]'
              . '      },'
              . '      "aggs": {'
              . '        "group_by_gender": {'
              . '          "terms": {'
              . '            "field": "gender.keyword"'
              . '          },'
              . '          "aggs": {'
              . '            "average_balance": {'
              . '              "avg": {'
              . '                "field": "balance"'
              . '              }'
              . '            }'
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
