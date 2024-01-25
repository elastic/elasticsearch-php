#!/usr/bin/env bash

# ------------------------------------------------------- #
#
# Skeleton for common build entry script for all elastic
# clients. Needs to be adapted to individual client usage.
#
# Must be called: ./.github/make.sh <target> <params>
#
# Version: 1.1.1
#
# Targets:
# ---------------------------
# assemble <VERSION> : build client artefacts with version
# bump     <VERSION> : bump client internals to version
# codegen  <VERSION> : generate endpoints
# docsgen  <VERSION> : generate documentation
# examplegen         : generate the doc examples
# clean              : clean workspace
#
# ------------------------------------------------------- #

# ------------------------------------------------------- #
# Bootstrap
# ------------------------------------------------------- #

script_path=$(dirname "$(realpath -s "$0")")
repo=$(realpath "$script_path/../")

# shellcheck disable=SC1090
CMD=$1
TASK=$1
TASK_ARGS=()
VERSION=$2
STACK_VERSION=$VERSION
WORKFLOW=${WORKFLOW-staging}
set -euo pipefail

product="elastic/elasticsearch-php"
output_folder=".github/output"
codegen_folder=".github/output"
OUTPUT_DIR="$repo/${output_folder}"
REPO_BINDING="${OUTPUT_DIR}:/sln/${output_folder}"
mkdir -p "$OUTPUT_DIR"

echo -e "\033[34;1mINFO:\033[0m PRODUCT ${product}\033[0m"
echo -e "\033[34;1mINFO:\033[0m VERSION ${STACK_VERSION}\033[0m"
echo -e "\033[34;1mINFO:\033[0m OUTPUT_DIR ${OUTPUT_DIR}\033[0m"

# ------------------------------------------------------- #
# Parse Command
# ------------------------------------------------------- #

case $CMD in
    clean)
        echo -e "\033[36;1mTARGET: clean workspace $output_folder\033[0m"
        rm -rfv "$output_folder"
        echo -e "\033[32;1mTARGET: clean - done.\033[0m"
        exit 0
        ;;
    assemble)
        if [ -v $VERSION ]; then
            echo -e "\033[31;1mTARGET: assemble -> missing version parameter\033[0m"
            exit 1
        fi
        echo -e "\033[36;1mTARGET: assemble artefact $VERSION\033[0m"
        TASK=release
        TASK_ARGS=("$VERSION" "$output_folder")
        ;;
    codegen)
        if [ -v $VERSION ]; then
            echo -e "\033[31;1mTARGET: codegen -> missing version parameter\033[0m"
            exit 1
        fi
        echo -e "\033[36;1mTARGET: codegen API v$VERSION\033[0m"
        TASK=codegen
        # VERSION is BRANCH here for now
        TASK_ARGS=("$VERSION" "$codegen_folder")
        ;;
    docsgen)
        if [ -v $VERSION ]; then
            echo -e "\033[31;1mTARGET: docsgen -> missing version parameter\033[0m"
            exit 1
        fi
        echo -e "\033[36;1mTARGET: generate docs for $VERSION\033[0m"
        TASK=codegen
        # VERSION is BRANCH here for now
        TASK_ARGS=("$VERSION" "$codegen_folder")
        ;;
    examplesgen)
        echo -e "\033[36;1mTARGET: generate examples\033[0m"
        TASK=codegen
        # VERSION is BRANCH here for now
        TASK_ARGS=("$VERSION" "$codegen_folder")
        ;;
    bump)
        if [ -v $VERSION ]; then
            echo -e "\033[31;1mTARGET: bump -> missing version parameter\033[0m"
            exit 1
        fi
        echo -e "\033[36;1mTARGET: bump to version $VERSION\033[0m"
        TASK=bump
        # VERSION is BRANCH here for now
        TASK_ARGS=("$VERSION")
        ;;
    *)
        echo -e "\nUsage:\n\t $CMD is not supported right now\n"
        exit 1
esac


# ------------------------------------------------------- #
# Build Container
# ------------------------------------------------------- #

#echo -e "\033[34;1mINFO: building $product container\033[0m"

#docker build --file .github/Dockerfile --tag ${product} \
#  --build-arg USER_ID="$(id -u)" \
#  --build-arg GROUP_ID="$(id -g)" .


# ------------------------------------------------------- #
# Run the Container
# ------------------------------------------------------- #

#echo -e "\033[34;1mINFO: running $product container\033[0m"

#docker run \
# --env "DOTNET_VERSION" \
# --name test-runner \
# --volume $REPO_BINDING \
# --rm \
# $product \
# /bin/bash -c "./build.sh $TASK ${TASK_ARGS[*]} && chown -R $(id -u):$(id -g) ."

# ------------------------------------------------------- #
# Post Command tasks & checks
# ------------------------------------------------------- #

if [[ "$CMD" == "assemble" ]]; then
    echo -e "\033[34;1mINFO: copy artefacts\033[0m"
    rsync -ar --exclude=.github --exclude=.git --filter=':- .gitignore' "$PWD" "${output_folder}/."

    if compgen -G ".github/output/*" > /dev/null; then
        if [[ "$WORKFLOW" == "snapshot" ]]; then 
            cd $repo/.github/output && tar -czf elasticsearch-php-$VERSION-SNAPSHOT.tar.gz * && cd -
        else
            cd $repo/.github/output && tar -czf elasticsearch-php-$VERSION.tar.gz * && cd -
        fi
        rm -Rf "${repo}/.github/output/elasticsearch-php"
        echo -e "\033[32;1mTARGET: successfully assembled client v$VERSION\033[0m"
		exit 0
    else
		echo -e "\033[31;1mTARGET: assemble failed, empty workspace!\033[0m"
		exit 1
	fi
fi

if [[ "$CMD" == "bump" ]]; then
    # Change version to src/Client.php
    sed -i "s/const VERSION = '[0-9]\+\.[0-9]\+\.[0-9]\+'/const VERSION = '$VERSION'/" $repo/src/Client.php

    # Change version to .github/workflows/unified-release.yml
    sed -i "s/[0-9]\+\.[0-9]\+\.[0-9]\+-SNAPSHOT/$VERSION-SNAPSHOT/" $repo/.github/workflows/unified-release.yml

    MINOR_VERSION=`echo $VERSION | grep -Eo "[0-9]+.[0-9]+"`

    # Change version to .github/pipeline.yml
    sed -i "s/STACK_VERSION: [0-9]\+\.[0-9]\+-SNAPSHOT/STACK_VERSION: $MINOR_VERSION-SNAPSHOT/" $repo/.github/pipeline.yml

    # Change version to .github/workflows/test.yml
    sed -i "s/es-version: \[[0-9]\+\.[0-9]\+\.\?[0-9]\?-SNAPSHOT\]/es-version: \[$MINOR_VERSION-SNAPSHOT\]/" $repo/.github/workflows/test.yml
fi

if [[ "$CMD" == "codegen" ]]; then
    echo "TODO"
fi

if [[ "$CMD" == "docsgen" ]]; then
    echo "TODO"
fi

if [[ "$CMD" == "examplesgen" ]]; then
    echo "TODO"
fi