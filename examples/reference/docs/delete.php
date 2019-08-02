<?php
/**
 *
 * @source docs/delete.asciidoc
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-delete.html
 *
 */

// L:9
// tag::c5e5873783246c7b1c01d8464fed72c4[]
$params = [
    'index' => 'twitter',
    'id'    => '1',
];
$response = $client->delete($params);
// end::c5e5873783246c7b1c01d8464fed72c4[]

// L:84
// tag::47b5ff897f26e9c943cee5c06034181d[]
$params = [
    'index'   => 'twitter',
    'id'      => '1',
    'routing' => 'kimchy',
];
$response = $client->delete($params);
// end::47b5ff897f26e9c943cee5c06034181d[]

// L:147
// tag::d90a84a24a407731dfc1929ac8327746[]
$params = [
    'index'   => 'twitter',
    'id'      => '1',
    'timeout' => '5m',
];
$response = $client->delete($params);
// end::d90a84a24a407731dfc1929ac8327746[]
