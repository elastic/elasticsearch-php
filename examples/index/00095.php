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
