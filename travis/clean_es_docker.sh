#!/usr/bin/env bash

docker container rm --force --volumes elasticsearch-oss > /dev/null 2>&1 || true
docker network rm esnet-oss > /dev/null
