#!/usr/bin/env bash

# Build the YAML tests
php tests/build_es_tests.php tests/elasticsearch-clients-tests/tests ${TEST_SUITE} tests/Yaml

# Run YAML tests
ELASTICSEARCH_URL="http://elastic:${ES_LOCAL_PASSWORD}@localhost:9200" vendor/bin/phpunit -c "phpunit-yaml-${TEST_SUITE}-tests.xml"