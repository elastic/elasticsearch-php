#!/bin/sh
if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;

killall java 2>/dev/null

which java
java -version


echo "Downloading Elasticsearch v${ES_VERSION}..."

ES_URL="https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-${ES_VERSION}.tar.gz"

curl -L -o elasticsearch-latest.tar.gz $ES_URL
tar -xvf "elasticsearch-latest.tar.gz"

echo "Adding repo to config..."
find . -name "elasticsearch.yml" | while read TXT ; do echo 'repositories.url.allowed_urls: ["http://*"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'path.repo: ["/tmp"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'node.max_local_storage_nodes: 1' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'cluster.routing.allocation.disk.watermark.low: 0.1%' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'cluster.routing.allocation.disk.watermark.high: 0.1%' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'node.attr.testattr: test' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'script.max_compilations_rate: 2048/1m' >> $TXT ; done

echo "Starting Elasticsearch v${ES_VERSION}"

./elasticsearch-*/bin/elasticsearch -d


sleep 3
