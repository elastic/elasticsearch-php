<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

use Elasticsearch\ClientBuilder;
use Elasticsearch\Tests\Utility;

error_reporting(E_ALL | E_STRICT);

// Set the default timezone. While this doesn't cause any tests to fail, PHP
// complains if it is not set in 'date.timezone' of php.ini.
date_default_timezone_set('UTC');

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the composer autoloader
$autoloader = require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = ClientBuilder::fromConfig([
    'hosts' => [Utility::getHost()]
]);

$count = 0;
while (!$client->ping()) {
    $count += 1;

    if ($count > 15) {
        echo "Live cluster could not be found in 15s!\nContents of elasticsearch.log:\n\n";

        $dir = new DirectoryIterator(dirname(__DIR__));

        foreach ($dir as $fileinfo) {
            if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                if (strpos($fileinfo->getFilename(), "elasticsearch") === 0) {
                    $log = file_get_contents(dirname(__DIR__)."/$fileinfo/logs/elasticsearch.log");
                    echo $log;
                    break;
                }

            }
        }

        throw new \Exception();
    }
    sleep(1);
}

