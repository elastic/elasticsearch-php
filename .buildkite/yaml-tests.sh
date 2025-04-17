#!/usr/bin/env bash

# Clone the elasticsearch-clients-tests repository
git clone -b ${BRANCH_CLIENT_TESTS} https://github.com/elastic/elasticsearch-clients-tests.git tests/elasticsearch-clients-tests

# Build the YAML tests
php tests/build_es_tests.php tests/elasticsearch-clients-tests/tests stack tests/Yaml

# Run YAML tests
vendor/bin/phpunit -c "phpunit-yaml-stack-tests.xml"

# Remove Yaml tests
rm -rf tests/Yaml

# Remove elasticsearch-clients-tests folder
rm -rf tests/elasticsearch-clients-tests