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

