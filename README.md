elasticsearch-php
=================

Official low-level client for Elasticsearch. Its goal is to provide common ground for all Elasticsearch-related code in PHP; because of this it tries to be opinion-free and very extendable.

To maintain consistency across all the low-level clients (Ruby, Python, etc), clients accept simple associative arrays as parameters.  All parameters, from the URI to the document body, are defined in the associative array.

| Branch | Unit Tests | Coverage |
| ------ | ---------- | -------- |
| [![Latest Stable Version](https://poser.pugx.org/elasticsearch/elasticsearch/v/stable.png)](https://packagist.org/packages/elasticsearch/elasticsearch) | [![Build Status](https://travis-ci.org/elasticsearch/elasticsearch-php.png?branch=master)](https://travis-ci.org/elasticsearch/elasticsearch-php) | [![Coverage Status](https://coveralls.io/repos/elasticsearch/elasticsearch-php/badge.png?branch=master)](https://coveralls.io/r/elasticsearch/elasticsearch-php?branch=master) |

Features
--------

 - One-to-one mapping with REST API and other language clients
 - Configurable, automatic discovery of cluster nodes
 - Persistent, Keep-Alive connections (within the lifetime of the script)
 - Load balancing (with pluggable selection strategy) across all available nodes. Defaults to round-robin
 - Pluggable connection pools to offer different connection strategies
 - Generalized, pluggable architecture - most components can be replaced with your own custom class if specialized behavior is required

Version Matrix
--------------
Since there are breaking changes in Elasticsearch 1.0, you need to match your version of Elasticsearch to the appropriate version of this library.
The master branch will always track Elasticsearch master.  Once 1.0.GA is released, a distinct 1.0 branch will be created to track Elasticsearch
1.* releases.

| Elasticsearch Version | Elasticsearch-PHP Branch |
| --------------------- | ------------------------ |
| >= 1.0                | dev-master               |
| <= 0.90.*             | 0.4                      |

Documentation
--------------
[Full documentation can be found here.](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html)  Docs are stored within the repo under /docs/, so if you see a typo or problem, please submit a PR to fix it!

Installation via Composer
-------------------------
The recommended method to install _Elasticsearch-PHP_ is through [Composer](http://getcomposer.org).

1. Add ``elasticsearch/elasticsearch`` as a dependency in your project's ``composer.json`` file (change version to suit your version of Elasticsearch):

```json
    {
        "require": {
            "elasticsearch/elasticsearch": "~0.4"
        }
    }
```

2. Download and install Composer:

        curl -s http://getcomposer.org/installer | php

3. Install your dependencies:

        php composer.phar install

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

```php
    <?php
    require 'vendor/autoload.php';

    $client = new Elasticsearch\Client();
```
You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

Index a document
-----

In elasticsearch-php, almost everything is configured by associative arrays.  The REST endpoint, document and optional parameters - everything is an associative array.

To index a document, we simply specify a `body` that contains the document that we wish to index.  Each field in the document is represented by a different key/value pair in the associative array.

The index, type and ID are also specified in the parameters assoc. array:

```php
    $params = array();
    $params['body']  = array('testField' => 'abc');
    $params['index'] = 'my_index';
    $params['type']  = 'my_type';
    $params['id']    = 'my_id';
    $ret = $client->index($params);
```

Get a document
-----

Let's get the document that we just indexed:

```php
    $getParams = array();
    $getParams['index'] = 'my_index';
    $getParams['type']  = 'my_type';
    $getParams['id']    = 'my_id';
    $retDoc = $client->get($getParams);
```

Search for a document
-----

Searching is a hallmark of elasticsearch (no surprise there!), so let's perform a basic search.  We are going to use the Match query as a demonstration:

```php
    $searchParams['index'] = 'my_index';
    $searchParams['type']  = 'my_type';
    $searchParams['body']['query']['match']['testField'] = 'abc';
    $queryResponse = $client->search($searchParams);

    echo $queryResponse['hits']['hits'][0]['_id']; // Outputs 'abc'
```

Update a document
-----
Let's update a document we have indexed:

```php
    $updateParams['index']          = 'my_index';
    $updateParams['type']           = 'my_type';
    $updateParams['id']             = 'my_id';
    $updateParams['body']['doc']    = array('my_key' => 'new_value');

    $retUpdate = $client->update($updateParams);
```

Delete a document
-----

Alright, let's go ahead and delete the document that we added previously:

```php
    $deleteParams = array();
    $deleteParams['index'] = 'my_index';
    $deleteParams['type'] = 'my_type';
    $deleteParams['id'] = 'my_id';
    $retDelete = $client->delete($deleteParams);
```

Delete an index
-----

Due to the dynamic nature of elasticsearch, the first document we added automatically built an index with some default settings.  Let's delete that index because we want to specify our own settings later:

```php
    $deleteParams['index'] = 'my_index';
    $client->indices()->delete($deleteParams);
```

Create an index
-----

Ok, now that we are starting fresh, let's add a new index with some custom settings:
```php
    $indexParams['index'] = 'my_index';
    $indexParams['body']['settings']['number_of_shards'] = 2;
    $indexParams['body']['settings']['number_of_replicas'] = 0;
    $client->indices()->create($indexParams);
```

Wrap up
=======

That was just a crash-course overview of the client and it's syntax.  If you are familiar with elasticsearch, you'll notice that the methods are named just like REST endpoints.

You'll also notice that the client is configured in a manner that facilitates easy discovery via the IDE.  All core actions are available under the $client object (indexing, searching, getting, etc).  Index and cluster management are located under the $client->indices() and $client->cluster() objects, respectively.

Check out the rest of the [Documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html) to see how the entire client works.


License
-------

Copyright 2013 Elasticsearch

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
