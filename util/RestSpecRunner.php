<?php

declare(strict_types = 1);

use Elasticsearch\ClientBuilder;
use Elasticsearch\Tests\Utility;
use GitWrapper\GitWrapper;

error_reporting(E_ALL | E_STRICT);
use Elasticsearch\Tests\Utility;

// Set the default timezone. While this doesn't cause any tests to fail, PHP
// complains if it is not set in 'date.timezone' of php.ini.
date_default_timezone_set('UTC');

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

echo "Base directory: ". dirname(__DIR__)."\n";

// Include the composer autoloader
$autoloader = require_once(dirname(__DIR__) . '/vendor/autoload.php');

$client = ClientBuilder::fromConfig([
	'hosts' => [Utility::getHost()]
]);
$serverInfo = $client->info();
var_dump($serverInfo);

$gitWrapper = new GitWrapper();
echo "Git cwd: ".dirname(__DIR__) . "/util/elasticsearch\n";
$git = $gitWrapper->workingCopy(dirname(__DIR__) . '/util/elasticsearch');

echo "Update elasticsearch submodule\n";
$git->fetchAll(array('verbose' => true));

$hash = $serverInfo['version']['build_hash'];
echo "Checkout yaml tests (hash: $hash)\n";
$git->checkout($hash, array('force' => true, 'quiet' => true));
