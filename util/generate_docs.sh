#!/usr/bin/env bash

set -e

# Clean the files just in case
rm -f doctum.phar
rm -f doctum.phar.sha256

# Download the latest (5.1.x) release
curl -O https://doctum.long-term.support/releases/5.1/doctum.phar
curl -O https://doctum.long-term.support/releases/5.1/doctum.phar.sha256

sha256sum --strict --check doctum.phar.sha256
rm -f doctum.phar.sha256
# You can fetch the latest (5.1.x) version code here:
# https://doctum.long-term.support/releases/5.1/VERSION

# Show the version to inform users of the script
php doctum.phar --version

# Only exit if the process fails, not if parse errors are found
php doctum.phar update --force --ignore-parse-errors -v util/docsConfig.php
