#!/usr/bin/env bash

curl -O http://get.sensiolabs.org/sami.phar
php sami.phar update --force -v util/docsConfig.php
