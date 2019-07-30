$params = [
    'index'   => 'twitter',
    'id'      => '0',
    '_source' => '*.id,retweeted',
];
$response = $client->get($params);