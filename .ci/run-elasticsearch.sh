#!/usr/bin/env bash
#
# Launch one or more Elasticsearch nodes via the Docker image,
# to form a cluster suitable for running the REST API tests.
#
# Export the STACK_VERSION variable, eg. '8.0.0-SNAPSHOT'.
# Export the TEST_SUITE variable, eg. 'oss' or 'xpack' defaults to 'oss'.
# Export the NUMBER_OF_NODES variable to start more than 1 node

# Version 1.2.0
# - Initial version of the run-elasticsearch.sh script
# - Deleting the volume should not dependent on the container still running
# - Fixed `ES_JAVA_OPTS` config
# - Moved to STACK_VERSION and TEST_VERSION
# - Refactored into functions and imports
# - Support NUMBER_OF_NODES
# - Added 5 retries on docker pull for fixing transient network errors

script_path=$(dirname $(realpath -s $0))
source $script_path/functions/imports.sh
set -euo pipefail

if [ "$TEST_SUITE" = "oss" ]; then
    docker pull docker.elastic.co/elasticsearch/elasticsearch-oss:${STACK_VERSION}
    docker run \
      --rm \
      --publish 9200:9200 \
      --ulimit nofile=65536:65536 \
      --ulimit memlock=-1:-1 \
      --env "node.attr.testattr=test" \
      --env "path.repo=/tmp" \
      --env "repositories.url.allowed_urls=http://snapshot.*" \
      --env "discovery.type=single-node" \
      --env "ES_JAVA_OPTS=-Xms1g -Xmx1g" \
      --network="$network_name" \
      --name=elasticsearch-oss \
      --health-interval=2s \
      --health-retries=20 \
      --health-timeout=2s \
      --detach \
      docker.elastic.co/elasticsearch/elasticsearch-oss:${STACK_VERSION}
    docker run --network $network_name --rm appropriate/curl --max-time 120 --retry 120 --retry-delay 1 --retry-connrefused --show-error --silent http://elasticsearch-oss:9200
else
    repo=$(pwd)
    testnodecrt="/util/certs/testnode.crt"
    testnodekey="/util/certs/testnode.key"
    cacrt="/util/certs/ca.crt"

    docker pull docker.elastic.co/elasticsearch/elasticsearch:${STACK_VERSION}
    docker run \
      --rm \
      --publish 9200:9200 \
      --env "node.attr.testattr=test" \
      --env "path.repo=/tmp" \
      --env "repositories.url.allowed_urls=http://snapshot.*" \
      --env "discovery.type=single-node" \
      --env "ES_JAVA_OPTS=-Xms1g -Xmx1g" \
      --env "ELASTIC_PASSWORD=changeme" \
      --env "xpack.security.enabled=true" \
      --env "xpack.license.self_generated.type=trial" \
      --env "xpack.security.http.ssl.enabled=true" \
      --env "xpack.security.http.ssl.verification_mode=certificate" \
      --env "xpack.security.http.ssl.key=certs/testnode.key" \
      --env "xpack.security.http.ssl.certificate=certs/testnode.crt" \
      --env "xpack.security.http.ssl.certificate_authorities=certs/ca.crt" \
      --env "xpack.security.transport.ssl.enabled=true" \
      --env "xpack.security.transport.ssl.key=certs/testnode.key" \
      --env "xpack.security.transport.ssl.certificate=certs/testnode.crt" \
      --env 'indices.lifecycle.history_index_enabled=false' \
      --env "xpack.security.transport.ssl.certificate_authorities=certs/ca.crt" \
      --env "xpack.ml.max_model_memory_limit=2gb" \
      --volume "$repo$testnodecrt:/usr/share/elasticsearch/config/certs/testnode.crt" \
      --volume "$repo$testnodekey:/usr/share/elasticsearch/config/certs/testnode.key" \
      --volume "$repo$cacrt:/usr/share/elasticsearch/config/certs/ca.crt" \
      --network="$network_name" \
      --name=elasticsearch \
      --detach \
      docker.elastic.co/elasticsearch/elasticsearch:${STACK_VERSION}

    docker run --network $network_name --rm appropriate/curl --max-time 120 --retry 120 --retry-delay 1 --retry-connrefused --show-error --silent --insecure https://elastic:changeme@elasticsearch:9200
fi