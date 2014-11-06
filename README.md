elasticsearch-php
=================

Official low-level client for Elasticsearch. Its goal is to provide common ground for all Elasticsearch-related code in PHP; because of this it tries to be opinion-free and very extendable.

To maintain consistency across all the low-level clients (Ruby, Python, etc), clients accept simple associative arrays as parameters.  All parameters, from the URI to the document body, are defined in the associative array.


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
If you are using a version older than 1.0, you must install the `0.4` Elasticsearch-PHP branch.  Otherwise, use the `1.0` branch.

The master branch will always track Elasticsearch master, but it is not recommended to use `dev-master` in your production code.

| Elasticsearch Version | Elasticsearch-PHP Branch |
| --------------------- | ------------------------ |
| >= 1.0                | 1.0                      |
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
                "elasticsearch/elasticsearch": "~1.0"
            }
        }
    ```

2. Download and install Composer:

    ```bash
        curl -s http://getcomposer.org/installer | php
    ```

3. Install your dependencies:

    ```bash
        php composer.phar install --no-dev
    ```

4. Require Composer's autoloader

    Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process:

    ```php
        <?php
        require 'vendor/autoload.php';

        $client = new Elasticsearch\Client();
    ```
You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

You'll notice that the installation command specified `--no-dev`.  This prevents Composer from installing the various testing and development dependencies.  For average users, there is no need to install the test suite (which also includes the complete source code of Elasticsearch).  If you wish to contribute to development, just omit the `--no-dev` flag to be able to run tests.

PHP Version Requirement
----
The minimum version of PHP that this library supports is 5.3.9.  For a longer explanation as to why this is the case, see [Minimum PHP Version Requirement Documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_php_version_requirement.html).

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

You'll also notice that the client is configured in a manner that facilitates easy discovery via the IDE.  All core actions are available under the `$client` object (indexing, searching, getting, etc).  Index and cluster management are located under the `$client->indices()` and `$client->cluster()` objects, respectively.

Check out the rest of the [Documentation](http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/index.html) to see how the entire client works.


Available Licenses
-------

Starting with version 1.3.1, Elasticsearch-PHP is available under two licenses: Apache v2.0 and LGPL v2.1.  Versions
prior to 1.3.1 are still licensed with only Apache v2.0

The user may choose which license they wish to use.  Since there is no discriminating executable or distribution bundle
to differentiate licensing, the user should document their license choice externally, in case the library is re-distributed.
If no explicit choice is made, assumption is that redistribution obeys rules of both licenses.

### Contributions
All contributions to the library are to be so that they can be licensed under both licenses.

Apache v2.0 License:
>Copyright 2013-2014 Elasticsearch
>
>Licensed under the Apache License, Version 2.0 (the "License");
>you may not use this file except in compliance with the License.
>You may obtain a copy of the License at
>
>    http://www.apache.org/licenses/LICENSE-2.0
>
>Unless required by applicable law or agreed to in writing, software
>distributed under the License is distributed on an "AS IS" BASIS,
>WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
>See the License for the specific language governing permissions and
>limitations under the License.

LGPL v2.1 Notice:
>Copyright (C) 2013-2014 Elasticsearch
>
>This library is free software; you can redistribute it and/or
>modify it under the terms of the GNU Lesser General Public
>License as published by the Free Software Foundation; either
>version 2.1 of the License, or (at your option) any later version.
>
>This library is distributed in the hope that it will be useful,
>but WITHOUT ANY WARRANTY; without even the implied warranty of
>MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
>Lesser General Public License for more details.
>
>You should have received a copy of the GNU Lesser General Public
>License along with this library; if not, write to the Free Software
>Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
