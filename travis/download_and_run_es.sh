#!/bin/sh
if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;


killall java 2>/dev/null

which java
java -version


echo "Downloading Elasticsearch v${ES_VERSION}-SNAPSHOT..."

ES_URL=$(curl -sS "https://esvm-props.kibana.rocks/builds" | jq -r ".branches[\"$ES_VERSION\"].zip")

curl -L -o elasticsearch-latest-SNAPSHOT.zip $ES_URL
unzip "elasticsearch-latest-SNAPSHOT.zip"

echo "Adding repo to config..."
find . -name "elasticsearch.yml" | while read TXT ; do echo 'repositories.url.allowed_urls: ["http://*"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'path.repo: ["/tmp"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'node.max_local_storage_nodes: 1' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'cluster.routing.allocation.disk.watermark.low: 1b' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'cluster.routing.allocation.disk.watermark.high: 1b' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'node.attr.testattr: test' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'script.max_compilations_per_minute: 2048' >> $TXT ; done


echo "Starting Elasticsearch v${ES_VERSION}"

./elasticsearch-*/bin/elasticsearch -d


sleep 3
