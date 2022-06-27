<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

use Doctum\Doctum;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*Namespace.php')
    ->name('Client.php')
    ->name('ClientBuilder.php')
    ->notName('AbstractNamespace.php')
    ->in(__DIR__.'/../src/');

return new Doctum($iterator, [
    'theme'                => 'asciidoc',
    'template_dirs'        => [__DIR__.'/docstheme/'],
    'title'                => 'Elasticsearch-php',
    'build_dir'            => __DIR__.'/../docs/build',
    'cache_dir'            => __DIR__.'/cache/',
]);
