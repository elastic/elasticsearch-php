elasticsearch-php
=================

Official low-level client for Elasticsearch. It's goal is to provide common ground for all Elasticsearch-related code in PHP; because of this it tries to be opinion-free and very extendable.

To maintain consistency across all the low-level clients (Ruby, Python, etc), clients accept simple associative arrays as parameters.  All parameters, from the URI to the document body, are defined in the associative array.

Features
--------

 - Configurable, automatic discovery of cluster nodes
 - Persistent, Keep-Alive connections
 - Load balancing (with pluggable selection strategy) across all availible nodes. Defaults to round-robin
 - Failed connection penalization (time based - failed connections won't be retried until a timeout is reached)
 - Pluggable architecture - most components can be replaced with your own custom class if specialized behavior is required


Installation via Composer
-------------------------
The recommended method to install _Elasticsearch-PHP_ is through [Composer](http://getcomposer.org).

1. Add ``elasticsearch/elasticsearch`` as a dependency in your project's ``composer.json`` file:

```json
    {
        "require": {
            "elasticsearch/elasticsearch": "~0.1"
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
```
You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org).

Basic Usage
-----
```php
    require 'vendor/autoload.php';
    use \Elasticsearch\Elasticsearch;

    // By default we connect to localhost:9200.
    $client = new Client();

    // Create a new index.
    $parameters['index']  = 'example_index';
    $client->indices()->create($parameters);

    // Index a new document.
    $document['index'] = 'example_index';
    $document['type']  = 'testType';
    $document['id']    = 'abc';
    $document['body']  = array(
                            'field1' => 'xyz',
                            'field2' => '123'
                         );
    $response = $client->index($document);

    // Perform a basic Match Query search.
    $query['index'] = 'example_index';
    $query['type']  = 'testType';
    $query['body']['query']['match']['field1'] =  ['xyz'];
    $queryResponse = $client->search($query);

    echo $queryResponse['hits']['hits'][0]['_id']; // Outputs 'abc'
```

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