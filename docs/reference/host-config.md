---
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/host-config.html
---

# Host Configuration [host-config]

The client offers an options to configure hosts.

The most common configuration is telling the client about your cluster: the number of nodes, their addresses, and ports. If no hosts are specified, the client attempts to connect to `localhost:9200`.

This behavior can be changed by using the `setHosts()` method on `ClientBuilder`. The method accepts an array of values, each entry corresponding to one node in your cluster. The format of the host can vary, depending on your needs (ip vs hostname, port, ssl, etc).

```php
$hosts = [
    '192.168.1.1:9200',         // IP + Port
    '192.168.1.2',              // Just IP
    'mydomain.server.com:9201', // Domain + Port
    'mydomain2.server.com',     // Just Domain
    'https://localhost',        // SSL to localhost
    'https://192.168.1.3:9200'  // SSL to IP + Port
];
$client = ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();              // Build the client object
```

Notice that the `ClientBuilder` object allows chaining method calls for brevity. It is also possible to call the methods individually:

```php
$hosts = [
    '192.168.1.1:9200',         // IP + Port
    '192.168.1.2',              // Just IP
    'mydomain.server.com:9201', // Domain + Port
    'mydomain2.server.com',     // Just Domain
    'https://localhost',        // SSL to localhost
    'https://192.168.1.3:9200'  // SSL to IP + Port
];
$clientBuilder = ClientBuilder::create();   // Instantiate a new ClientBuilder
$clientBuilder->setHosts($hosts);           // Set the hosts
$client = $clientBuilder->build();          // Build the client object
```

