#!/usr/bin/env bash
# parameters are available to this script

# STACK_VERSION -- version e.g Major.Minor.Patch(-Prelease)
# TEST_GROUP -- which test group to run: stack or serverless
# ELASTICSEARCH_URL -- The url at which elasticsearch is reachable, a default is composed based on STACK_VERSION and TEST_SUITE
# PHP_VERSION -- PHP version (defined in test-matrix.yml, a default is hardcoded here)
script_path=$(dirname $(realpath -s $0))
set -euo pipefail

PHP_VERSION=${PHP_VERSION-8.4-cli}
elasticsearch_container=${elasticsearch_container-}

echo -e "\033[34;1mINFO:\033[0m VERSION ${STACK_VERSION}\033[0m"
echo -e "\033[34;1mINFO:\033[0m TEST_GROUP ${TEST_GROUP}\033[0m"
echo -e "\033[34;1mINFO:\033[0m CONTAINER ${elasticsearch_container}\033[0m"
echo -e "\033[34;1mINFO:\033[0m PHP_VERSION ${PHP_VERSION}\033[0m"

echo -e "\033[1m>>>>> Build docker container >>>>>>>>>>>>>>>>>>>>>>>>>>>>>\033[0m"

export elasticsearch_image=elasticsearch
export elasticsearch_container="${elasticsearch_image}:${STACK_VERSION}"
export suffix=rest-test
export moniker=$(echo "$elasticsearch_container" | tr -C "[:alnum:]" '-')
export network_name=${moniker}${suffix}

echo -e "\033[34;1mINFO:\033[0m Creating network $network_name if it does not exist already \033[0m"
docker network inspect "$network_name" > /dev/null 2>&1 || docker network create "$network_name"

docker build \
  --no-cache \
  --file $script_path/Dockerfile \
  --tag elastic/elasticsearch-php \
  --build-arg PHP_VERSION=${PHP_VERSION} \
  .

echo -e "\033[1m>>>>> Run test:integration >>>>>>>>>>>>>>>>>>>>>>>>>>>>>\033[0m"

repo=$(realpath $(dirname $(realpath -s $0))/../)

docker run \
  --network=${network_name} \
  --workdir="/usr/src/app" \
  --volume=${repo}/tests:/usr/src/app/tests \
  --env STACK_VERSION=${STACK_VERSION} \
  --env TEST_GROUP=${TEST_GROUP} \
  --env PHP_VERSION=${PHP_VERSION} \
  --ulimit nofile=65535:65535 \
  --name elasticsearch-php \
  --rm \
  elastic/elasticsearch-php
