#!/usr/bin/env bash

if [ "$TEST_SUITE" = "oss" ]; then
    docker container rm --force --volumes elasticsearch-oss > /dev/null 2>&1 || true
    docker network rm esnet-oss > /dev/null
else
    docker container rm --force --volumes elasticsearch > /dev/null 2>&1 || true
    docker network rm esnet > /dev/null
fi
