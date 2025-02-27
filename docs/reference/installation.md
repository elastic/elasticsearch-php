---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/installation.html
---

# Installation [installation]

Elasticsearch-php can be used starting from PHP 7.4. To install the library you need to use [composer](http://getcomposer.org) with the following command:

```shell
composer require elasticsearch/elasticsearch
```

If you don’t have composer you can install it as follows:

```shell
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

More information about [Composer can be found at their website](https://getcomposer.org/).

When you have installed elasticsearch-php you can start using it with the `Client` class. You can use the `ClientBuilder` class to create this object, as follows:

```php
require 'vendor/autoload.php';

$client = Elastic\Elasticsearch\ClientBuilder::create()->build();
```

+ Client instantiation is performed with a static helper function `create()`. This creates a ClientBuilder object, which helps you to set custom configurations. When you are done configuring, call the `build()` method to generate a `Client` object. For further info, consult the [*Configuration*](/reference/configuration.md) section.

