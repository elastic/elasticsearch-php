#!/usr/bin/env bash

# Checkout the YAML test from Elasticsearch tag
php util/RestSpecRunner.php

# Run YAML tests
vendor/bin/phpunit -c phpunit-integration.xml --group sync