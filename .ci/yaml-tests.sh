#!/usr/bin/env bash

# Checkout the YAML test from Elasticsearch tag
php util/RestSpecRunner.php

# Generate the YAML tests for PHPUnit
php util/build_tests.php

# Run YAML tests
vendor/bin/phpunit -c "phpunit-yaml-${TEST_SUITE}-tests.xml"