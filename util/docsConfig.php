<?php

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the composer autoloader
$autoloader = require_once dirname(__DIR__) . '/vendor/autoload.php';


use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*Namespace.php')
    ->name("Client.php")
    ->name("ClientBuilder.php")
    ->notName("AbstractNamespace.php")
    ->in(__DIR__.'/../src/');

return new Sami($iterator, array(
    'theme'                => 'asciidoc',
    'template_dirs'        => array(__DIR__.'/docstheme/'),
    'title'                => 'Elasticsearch-php',
    'build_dir'            => __DIR__.'/../docs/build',
    'cache_dir'            => __DIR__.'/cache/',
));