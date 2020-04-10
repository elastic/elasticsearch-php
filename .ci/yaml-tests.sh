#!/usr/bin/env bash

composer install
git submodule update --init --recursive
php util/RestSpecRunner.php
vendor/bin/phpunit -c phpunit-integration.xml --group sync