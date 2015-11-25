#!/bin/sh
if [ -z $ES_VERSION ]; then
    echo "No ES_VERSION specified";
    exit 1;
fi;


killall java 2>/dev/null


echo "Downloading Elasticsearch v${ES_VERSION}-SNAPSHOT..."
ES_URL="http://s3-eu-west-1.amazonaws.com/build.eu-west-1.elastic.co/origin/$ES_VERSION/nightly/JDK7/elasticsearch-latest-SNAPSHOT.zip"
curl -L -O $ES_URL
unzip "elasticsearch-latest-SNAPSHOT.zip"

echo "Adding repo to config..."
find . -name "elasticsearch.yml" | while read TXT ; do echo 'repositories.url.allowed_urls: ["http://*"]' >> $TXT ; done
find . -name "elasticsearch.yml" | while read TXT ; do echo 'path.repo: ["/tmp"]' >> $TXT ; done



echo "Starting Elasticsearch v${ES_VERSION}"
./elasticsearch-*/bin/elasticsearch \
    -Des.network.host=localhost \
    -Des.discovery.zen.ping.multicast.enabled=false \
    -Des.discovery.zen.ping_timeout=1s \
    -Des.http.port=9200 \
    -d

sleep 3
