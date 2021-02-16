#!/usr/bin/env bash
# parameters are available to this script

# common build entry script for all elasticsearch clients

# ./.ci/make.sh assemble VERSION

script_path=$(dirname "$(realpath -s "$0")")
repo=$(realpath "$script_path/../")

# shellcheck disable=SC1090
CMD=$1
TASK=$1
VERSION=$2
STACK_VERSION=$VERSION
set -euo pipefail

output_folder=".ci/output"
OUTPUT_DIR="$repo/${output_folder}"
mkdir -p "$OUTPUT_DIR"

PHP_VERSION=${PHP_VERSION-7.4-cli}

echo -e "\033[34;1mINFO:\033[0m VERSION ${STACK_VERSION}\033[0m"
echo -e "\033[34;1mINFO:\033[0m OUTPUT_DIR ${OUTPUT_DIR}\033[0m"
echo -e "\033[34;1mINFO:\033[0m PHP_VERSION ${PHP_VERSION}\033[0m"

echo -e "\033[1m>>>>> Build [elastic/elasticsearch-php container] >>>>>>>>>>>>>>>>>>>>>>>>>>>>>\033[0m"

docker build \
  --no-cache \
  --file .ci/Dockerfile \
  --tag elastic/elasticsearch-php \
  --build-arg PHP_VERSION=${PHP_VERSION} \
  .

echo -e "\033[1m>>>>> Run [elastic/elasticsearch-php container] >>>>>>>>>>>>>>>>>>>>>>>>>>>>>\033[0m"

case $CMD in
    assemble)
        TASK=release
        ;;
    *)
        echo -e "\nUsage:\n\t $CMD is not supported right now\n"
        exit 1
esac

docker run \
  --workdir="/usr/src/app" \
  --volume "${OUTPUT_DIR}:/usr/src/app/${output_folder}" \
  --volume=${repo}/tests:/usr/src/app/tests \
  --env PHP_VERSION=${PHP_VERSION} \
  --name elasticsearch-php \
  --rm \
  elastic/elasticsearch-php \
  echo 'something calling automation here using $TASK and $VERSION producing output in $OUTPUT_DIR'
