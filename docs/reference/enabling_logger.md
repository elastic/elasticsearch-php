---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/enabling_logger.html
---

# Enabling the Logger [enabling_logger]

Elasticsearch-PHP supports logging, but it is not enabled by default for performance reasons. If you wish to enable logging, you need to select a logging implementation, install it, then enable the logger in the Client. The recommended logger is [Monolog](https://github.com/Seldaek/monolog), but any logger that implements the [PSR-3](https://www.php-fig.org/psr/psr-3/) interface works.

To begin using Monolog, just require it using composer:

```shell
composer require monolog/monolog
```

Once Monolog (or another logger) is installed, you need to create a log object and inject it into the client:

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('name');
$logger->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

$client = ClientBuilder::create()
    ->setLogger($logger)        // Set your custom logger
    ->build();                  // Build the client object
```

