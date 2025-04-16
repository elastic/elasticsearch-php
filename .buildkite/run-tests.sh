#!/usr/bin/env bash

# Clone the elasticsearch-clients-tests
git clone https://github.com/elastic/elasticsearch-clients-tests.git tests/elasticsearch-clients-tests

# Generate the unit tests for elasticsearch-clients-tests
php tests/build_es_tests.php tests/elasticsearch-clients-tests/tests ${TEST_SUITE} tests/Yaml

# Run Elasticsearch using start-local
curl -fsSL https://elastic.co/start-local | sh -s -- -v ${STACK_VERSION} -esonly
source elastic-start-local/.env

# Run YAML tests
ELASTICSEARCH_URL="http://elastic:${ES_LOCAL_PASSWORD}@localhost:9200" vendor/bin/phpunit -c "phpunit-yaml-${TEST_SUITE}-tests.xml"