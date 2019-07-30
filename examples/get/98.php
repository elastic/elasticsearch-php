$params = [
    'index'   => 'twitter',
    'id'      => '0',
    '_source' => false,
];
$response = $client->get($params);