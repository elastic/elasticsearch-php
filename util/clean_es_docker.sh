#!/usr/bin/env bash

docker container rm --force --volumes elasticsearch > /dev/null 2>&1 || true
docker network rm esnet > /dev/null
