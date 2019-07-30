$params = [
    'index'            => 'twitter',
    'id'               => '0',
    '_source_includes' => '*.id',
    '_source_excludes' => 'entities',
];
$response = $client->get($params);