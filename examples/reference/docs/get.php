<?php
/**
 *
 * @source docs/get.asciidoc
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-get.html
 *
 */

// L:9
// tag::fbcf5078a6a9e09790553804054c36b3[]
$params = [
    'index' => 'twitter',
    'id'    => '0',
];
$response = $client->get($params);
// end::fbcf5078a6a9e09790553804054c36b3[]

// L:46
// tag::98234499cfec70487cec5d013e976a84[]
$params = [
    'index' => 'twitter',
    'id'    => '0',
];
$response = $client->exists($params);
// end::98234499cfec70487cec5d013e976a84[]

// L:72
// tag::138ccd89f72aa7502dd9578403dcc589[]
$params = [
    'index'   => 'twitter',
    'id'      => '0',
    '_source' => false,
];
$response = $client->get($params);
// end::138ccd89f72aa7502dd9578403dcc589[]

// L:84
// tag::8fdf2344c4fb3de6902ad7c5735270df[]
$params = [
    'index'            => 'twitter',
    'id'               => '0',
    '_source_includes' => '*.id',
    '_source_excludes' => 'entities',
];
$response = $client->get($params);
// end::8fdf2344c4fb3de6902ad7c5735270df[]

// L:93
// tag::745f9b8cdb8e91073f6e520e1d9f8c05[]
$params = [
    'index'   => 'twitter',
    'id'      => '0',
    '_source' => '*.id,retweeted',
];
$response = $client->get($params);
// end::745f9b8cdb8e91073f6e520e1d9f8c05[]

// L:109
// tag::913770050ebbf3b9b549a899bc11060a[]
/*
PUT twitter
{
   "mappings": {
       "properties": {
          "counter": {
             "type": "integer",
             "store": false
          },
          "tags": {
             "type": "keyword",
             "store": true
          }
       }
   }
}
*/
// end::913770050ebbf3b9b549a899bc11060a[]

// L:131
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

// L:144
// tag::710c7871f20f176d51209b1574b0d61b[]
$params = [
    'index'  => 'twitter',
    'id'     => '1',
    'fields' => 'tags,counter',
];
$response = $client->get($params);
// end::710c7871f20f176d51209b1574b0d61b[]

// L:178
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

// L:189
// tag::69a7be47f85138b10437113ab2f0d72d[]
$params = [
    'index'   => 'twitter',
    'id'      => '2',
    'routing' => 'user1',
    'fields'  => 'tags,counter',
];
$response = $client->get($params);
// end::69a7be47f85138b10437113ab2f0d72d[]

// L:229
// tag::89a8ac1509936acc272fc2d72907bc45[]
$params = [
    'index' => 'twitter',
    'id'    => '1',
];
$response = $client->getSource($params);
// end::89a8ac1509936acc272fc2d72907bc45[]

// L:262
// tag::1d65cb6d055c46a1bde809687d835b71[]
$params = [
    'index'   => 'twitter',
    'id'      => '1',
    'routing' => 'user1',
];
$response = $client->get($params);
// end::1d65cb6d055c46a1bde809687d835b71[]