<?php

declare(strict_types = 1);

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*Namespace.php')
    ->name("Client.php")
    ->name("ClientBuilder.php")
    ->notName("AbstractNamespace.php")
    ->in(__DIR__.'/../src/');

return new Sami($iterator, [
    'theme'                => 'asciidoc',
    'template_dirs'        => [__DIR__.'/docstheme/'],
    'title'                => 'Elasticsearch-php',
    'build_dir'            => __DIR__.'/../docs/build',
    'cache_dir'            => __DIR__.'/cache/',
]);
