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
