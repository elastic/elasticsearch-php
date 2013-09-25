#!/usr/bin/env bash

if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;

ES_DIR="elasticsearch-$ES_VERSION"

killall java 2>/dev/null

if [ ! -d $ES_DIR ]; then
    echo "Downloading Elasticsearch v${ES_VERSION}"
    ES_URL="https://download.elasticsearch.org/elasticsearch/elasticsearch/${ES_DIR}.zip"
    curl -O $ES_URL
    unzip "${ES_DIR}.zip"
fi;

echo "Starting Elasticsearch v${ES_VERSION}"
./${ES_DIR}/bin/elasticsearch \
    -Des.network.host=localhost \
    -Des.discovery.zen.ping.multicast.enabled=false \
    -Des.discovery.zen.ping_timeout=1

sleep 3

phpunit --bootstrap tests/bootstrap.php --no-configuration --coverage-clover build/logs/clover.xml --exclude-group ignore tests