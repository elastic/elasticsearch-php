#!/bin/sh
if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;


killall java 2>/dev/null

ORACLEJDK8_UJA_ALIAS="java-8-oracle"
ORACLEJDK8_JAVA_HOME="/usr/lib/jvm/java-8-oracle"

echo "Switching to Oracle JDK8 ($ORACLEJDK8_UJA_ALIAS), JAVA_HOME will be set to $ORACLEJDK8_JAVA_HOME"
$UJA --set "$ORACLEJDK8_UJA_ALIAS"
export JAVA_HOME="$ORACLEJDK8_JAVA_HOME"


echo "Downloading Elasticsearch v${ES_VERSION}-SNAPSHOT..."

ES_URL=$(curl -sS "https://esvm-props.kibana.rocks/builds" | jq -r ".branches[\"$ES_VERSION\"].zip")

curl -L -o elasticsearch-latest-SNAPSHOT.zip $ES_URL
unzip "elasticsearch-latest-SNAPSHOT.zip"

echo "Adding repo to config..."
find . -name "elasticsearch.yml" | while read TXT ; do echo 'repositories.url.allowed_urls: ["http://*"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'path.repo: ["/tmp"]' >> $TXT ; done

echo "Starting Elasticsearch v${ES_VERSION}"

./elasticsearch-*/bin/elasticsearch \
    -E es.network.host=localhost \
    -E es.discovery.zen.ping_timeout=1s \
    -E es.http.port=9200 \
    -E es.discovery.zen.minimum_master_nodes=1 \
    -d


sleep 3
