<?php
/**
 *
 * @source getting-started.asciidoc
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/master/getting-started-cluster-health.html
 *
 */

// L:209
// tag::f8cc4b331a19ff4df8e4a490f906ee69[]
$response = $client->cat()->health(['v' => true]);
// end::f8cc4b331a19ff4df8e4a490f906ee69[]

// L:240
// tag::db20adb70a8e8d0709d15ba0daf18d23[]
$response = $client->cat()->nodes(['v' => true]);
// end::db20adb70a8e8d0709d15ba0daf18d23[]

// L:263
// tag::c3fa04519df668d6c27727a12ab09648[]
$response = $client->cat()->indices(['v' => true]);
// end::c3fa04519df668d6c27727a12ab09648[]

// L:284
// tag::0caf6b6b092ecbcf6f996053678a2384[]
// PUT /customer?pretty
$response = $client->cat()->indices(['v' => true]);
// end::0caf6b6b092ecbcf6f996053678a2384[]

// L:311
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

// L:347
// tag::37a3b66b555aed55618254f50d572cd6[]
$params = [
    'index' => 'customer',
    'id'    => '1',
];
$response = $client->get($params);
// end::37a3b66b555aed55618254f50d572cd6[]


// L:378
// tag::92e3c75133dc4fdb2cc65f149001b40b[]
$client->indices->delete(['index' => 'customer']);
$response = $client->cat()->indices(['v' => true]);
// end::92e3c75133dc4fdb2cc65f149001b40b[]

// L:398
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

// L:442
// tag::75bda7da7fefff2c16f0423a9aa41c6e[]
$params = [
    'index' => 'customer',
    'id'    => '1',
    'body'  => [
        'name' => 'Jane Doe',
    ],
];
$response = $client->index($params);
// end::75bda7da7fefff2c16f0423a9aa41c6e[]

// L:454
// tag::37c778346eb67042df5e8edf2485e40a[]
$params = [
    'index' => 'customer',
    'id'    => '2',
    'body'  => [
        'name' => 'Jane Doe',
    ],
];
$response = $client->index($params);
// end::37c778346eb67042df5e8edf2485e40a[]

// L:470
// tag::1c0f3b0bc4b7e53b53755fd3bda5b8cf[]
$params = [
    'index' => 'customer',
    'body'  => [
        'name' => 'Jane Doe',
    ],
];
$response = $client->index($params);
// end::1c0f3b0bc4b7e53b53755fd3bda5b8cf[]

// L:489
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

// L:501
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

// L:513
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

// L:532
// tag::9c5ef83db886840355ff662b6e9ae8ab[]
$params = [
    'index' => 'customer',
    'id'    => '2',
];
$response = $client->delete($params);
// end::9c5ef83db886840355ff662b6e9ae8ab[]

// L:550
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

// L:562
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

// L:647
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

// L:720
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

// L:789
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

// L:805
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

// L:820
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

// L:836
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

// L:854
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

// L:873
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

// L:885
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

// L:897
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

// L:909
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

// L:923
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

// L:944
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

// L:965
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

// L:988
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

// L:1018
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

// L:1051
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

// L:1144
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

// L:1172
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

// L:1201
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
