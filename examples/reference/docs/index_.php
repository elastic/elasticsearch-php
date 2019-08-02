<?php
/**
 *
 * @source docs/index_.asciidoc
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-index_.html
 *
 */

// L:10
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

// L:77
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

// L:121
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

// L:134
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

// L:153
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

// L:204
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

// L:327
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

// L:357
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
