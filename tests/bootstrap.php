<?php
/**
 * User: zach
 * Date: 4/30/13
 * Time: 4:05 PM
 */

error_reporting(E_ALL | E_STRICT);

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the composer autoloader
$autoloader = require_once(dirname(__DIR__) . '/vendor/autoload.php');
