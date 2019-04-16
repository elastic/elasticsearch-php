#!/bin/sh
if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;

docker pull docker.elastic.co/elasticsearch/elasticsearch-oss:${ES_VERSION}
docker network inspect esnet-oss > /dev/null || docker network create esnet-oss;
docker run \
  --rm \
  --publish 9200:9200 \
  --env "node.attr.testattr=test" \
  --env "path.repo=/tmp" \
  --env "repositories.url.allowed_urls=http://snapshot.*" \
  --env "discovery.type=single-node" \
  --network=esnet-oss \
  --name=elasticsearch-oss \
  --detach \
  docker.elastic.co/elasticsearch/elasticsearch-oss:${ES_VERSION}
docker run --network esnet-oss --rm appropriate/curl --max-time 120 --retry 120 --retry-delay 1 --retry-connrefused --show-error --silent http://elasticsearch-oss:9200
