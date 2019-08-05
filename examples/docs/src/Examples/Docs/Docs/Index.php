<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Docs;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: Index
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   docs/index_.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class Index extends SimpleExamplesTester {

    /**
     * Tag:  bb143628fd04070683eeeadc9406d9cc
     * Line: 11
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL11_bb143628fd04070683eeeadc9406d9cc()
    {
        $client = $this->getClient();
        // tag::bb143628fd04070683eeeadc9406d9cc[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
        ];
        $response = $client->index($params);
        // end::bb143628fd04070683eeeadc9406d9cc[]

        $curl = 'PUT twitter/_doc/1'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  804a97ff4d0613e6568e4efb19c52021
     * Line: 77
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL77_804a97ff4d0613e6568e4efb19c52021()
    {
        $client = $this->getClient();
        // tag::804a97ff4d0613e6568e4efb19c52021[]
        $params = [
            'body' => [
                'persistent'=> [
                    'action.auto_create_index' =>
                        'twitter,index10,-index1*,+ind*' // <1>
                ]
            ]
        ];
        $response = $client->cluster()->putSettings($params);

        $params = [
            'body' => [
                'persistent'=> [
                    'action.auto_create_index' => false // <2>
                ]
            ]
        ];
        $response = $client->cluster()->putSettings($params);

        $params = [
            'body' => [
                'persistent'=> [
                    'action.auto_create_index' => true // <3>
                ]
            ]
        ];
        $response = $client->cluster()->putSettings($params);
        // end::804a97ff4d0613e6568e4efb19c52021[]

        $curl = 'PUT _cluster/settings'
              . '{'
              . '    "persistent": {'
              . '        "action.auto_create_index": "twitter,index10,-index1*,+ind*" \<1>'
              . '    }'
              . '}'
              . 'PUT _cluster/settings'
              . '{'
              . '    "persistent": {'
              . '        "action.auto_create_index": "false" \<2>'
              . '    }'
              . '}'
              . 'PUT _cluster/settings'
              . '{'
              . '    "persistent": {'
              . '        "action.auto_create_index": "true" \<3>'
              . '    }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d718b63cf1b6591a1d59a0cf4fd995eb
     * Line: 121
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL121_d718b63cf1b6591a1d59a0cf4fd995eb()
    {
        $client = $this->getClient();
        // tag::d718b63cf1b6591a1d59a0cf4fd995eb[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
            'op_type' => 'create',
        ];
        $response = $client->index($params);
        // end::d718b63cf1b6591a1d59a0cf4fd995eb[]

        $curl = 'PUT twitter/_doc/1?op_type=create'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  048d8abd42d094bbdcf4452a58ccb35b
     * Line: 134
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL134_048d8abd42d094bbdcf4452a58ccb35b()
    {
        $client = $this->getClient();
        // tag::048d8abd42d094bbdcf4452a58ccb35b[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
        ];
        $response = $client->create($params);
        // end::048d8abd42d094bbdcf4452a58ccb35b[]

        $curl = 'PUT twitter/_create/1'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  36818c6d9f434d387819c30bd9addb14
     * Line: 153
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL153_36818c6d9f434d387819c30bd9addb14()
    {
        $client = $this->getClient();
        // tag::36818c6d9f434d387819c30bd9addb14[]
        $params = [
            'index' => 'twitter',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
        ];
        $response = $client->index($params);
        // end::36818c6d9f434d387819c30bd9addb14[]

        $curl = 'POST twitter/_doc/'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  625dc94df1f9affb49a082fd99d41620
     * Line: 204
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL204_625dc94df1f9affb49a082fd99d41620()
    {
        $client = $this->getClient();
        // tag::625dc94df1f9affb49a082fd99d41620[]
        $params = [
            'index' => 'twitter',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
            'routing' => 'kimchy',
        ];
        $response = $client->index($params);
        // end::625dc94df1f9affb49a082fd99d41620[]

        $curl = 'POST twitter/_doc?routing=kimchy'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  b918d6b798da673a33e49b94f61dcdc0
     * Line: 327
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL327_b918d6b798da673a33e49b94f61dcdc0()
    {
        $client = $this->getClient();
        // tag::b918d6b798da673a33e49b94f61dcdc0[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'user'      => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message'   => 'trying out Elasticsearch',
            ],
            'timeout' => '5m',
        ];
        $response = $client->index($params);
        // end::b918d6b798da673a33e49b94f61dcdc0[]

        $curl = 'PUT twitter/_doc/1?timeout=5m'
              . '{'
              . '    "user" : "kimchy",'
              . '    "post_date" : "2009-11-15T14:12:12",'
              . '    "message" : "trying out Elasticsearch"'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1f336ecc62480c1d56351cc2f82d0d08
     * Line: 357
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL357_1f336ecc62480c1d56351cc2f82d0d08()
    {
        $client = $this->getClient();
        // tag::1f336ecc62480c1d56351cc2f82d0d08[]
        $params = [
            'index' => 'twitter',
            'id'    => '1',
            'body'  => [
                'message' => 'elasticsearch now has versioning support, double cool!',
            ],
            'version'      => '2',
            'version_type' => 'external',
        ];
        $response = $client->index($params);
        // end::1f336ecc62480c1d56351cc2f82d0d08[]

        $curl = 'PUT twitter/_doc/1?version=2&version_type=external'
              . '{'
              . '    "message" : "elasticsearch now has versioning support, double cool!"'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%

}
