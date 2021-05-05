## Release 7.12.0

- Updated the endpoints for ES 7.12 + removed cpliakas/git-wrapper
  in favor of symplify/git-wrapper
  [136d5b9](https://github.com/elastic/elasticsearch-php/commit/136d5b9717b3806c6b34ef8a5076bfe7cee8b46e)
- Fixed warning header as array in YAML tests generator
  [0d81be1](https://github.com/elastic/elasticsearch-php/commit/0d81be131bfc7eff6ef82468e61c16077a892aab)
- Refactored TEST_SUITE with free, platinum + removed old YamlRunnerTest
  [f69d96f](https://github.com/elastic/elasticsearch-php/commit/f69d96fc283580177002b4088c279c3d0c07befe)
  
## Release 7.11.0

- Added the `X-Elastic-Client-Meta` header which is used by Elastic Cloud
  and can be disabled with `ClientBuilder::setElasticMetaHeader(false)`
  [#1089](https://github.com/elastic/elasticsearch-php/pull/1089)
- Replaced `array_walk` with `array_map` in `Connection::getURI` for PHP 8
  compatibility
  [#1075](https://github.com/elastic/elasticsearch-php/pull/1075)
- Remove unnecessary `InvalidArgumentExceptions`
  [#1069](https://github.com/elastic/elasticsearch-php/pull/1069)
- Introducing PHP 8 compatibility
  [#1063](https://github.com/elastic/elasticsearch-php/pull/1063) 
- Replace Sami by Doctum and fix `.gitignore`
  [#1062](https://github.com/elastic/elasticsearch-php/pull/1062)

## Release 7.10.0

- Updated endpoints and namespaces for Elasticsearch 7.10
  [3ceb748](https://github.com/elastic/elasticsearch-php/commit/3ceb7484a111aa20126168460c79f098c4fe0792)
- Fixed ClientBuilder::fromConfig allowing multiple function
  parameters (e.g. setApiKey)
  [#1076](https://github.com/elastic/elasticsearch-php/pull/1076)
- Refactored the YAML tests using generated PHPUnit code
  [85fadc2](https://github.com/elastic/elasticsearch-php/commit/85fadc2bd4b2b309b19761a50ff13010d43a524d)

## Release 7.9.1

- Fixed using object instead of array in onFailure transport event
  [#1066](https://github.com/elastic/elasticsearch-php/pull/1066)
- Fixed reset custom header after endpoint call
  [#1065](https://github.com/elastic/elasticsearch-php/pull/1065)
- Show generic error messages when server returns no response
  [#1056](https://github.com/elastic/elasticsearch-php/pull/1056)

## Release 7.9.0

- Updated endpoints and namespaces for Elasticsearch 7.9
  [28bf0ed](https://github.com/elastic/elasticsearch-php/commit/28bf0ed6df6bc95f83f369509431d97907bfdeb0)
- Moved `scroll_id` into `body` for search operations in the documentation
  [#1052](https://github.com/elastic/elasticsearch-php/pull/1052)
- Fixed PHP 7.4 preloading feature for autoload.php
  [#1051](https://github.com/elastic/elasticsearch-php/pull/1051)
- Improved message of JSON errors using `json_last_error_msg()`
  [#1045](https://github.com/elastic/elasticsearch-php/pull/1045)

## Release 7.8.0

- Updated endpoints and namespaces for Elasticsearch 7.8
  [f2a0828](https://github.com/elastic/elasticsearch-php/commit/f2a0828d5ee9d126ad63e2a1d43f70b4013845e2)
- Improved documentation
  [#1038](https://github.com/elastic/elasticsearch-php/pull/1038)
  [#1027](https://github.com/elastic/elasticsearch-php/pull/1027)
  [#1025](https://github.com/elastic/elasticsearch-php/pull/1025)

## Release 7.7.0

- Removed setId() into endpoints, fixed `util/GenerateEndpoints.php`
  [#1026](https://github.com/elastic/elasticsearch-php/pull/1026)
- Fixes JsonErrorException with code instead of message
  [#1022](https://github.com/elastic/elasticsearch-php/pull/1022)
- Better exception message for Could not parse URI
  [#1016](https://github.com/elastic/elasticsearch-php/pull/1016)
- Added JUnit log for PHPUnit
  [88b7e1c](https://github.com/elastic/elasticsearch-php/commit/88b7e1ce80a5a52c1d64d00c55fef77097bbd8a9)
- Added the XPack endpoints
  [763d91a](https://github.com/elastic/elasticsearch-php/commit/763d91a3d506075316b84a38b2bed7a098da5028)

## Release 7.6.1

- Fixed issue with `guzzlehttp/ringphp` and `guzzle/streams`
  using forks `ezimuel/ringphp` and `ezimuel/guzzlestreams`
  [92a6a4a](https://github.com/elastic/elasticsearch-php/commit/92a6a4adda5eafd1823c7c9c386e2c7e5e75cd08)

## Release 7.6.0

- Generated the new endpoints for Elasticsearch 7.6.0
  [be31f31](https://github.com/elastic/elasticsearch-php/commit/be31f317af704f333b43bbcc7c01ddc7c91ec6f8)

## Release 7.5.1

- Fixes port missing in log [#925](https://github.com/elastic/elasticsearch-php/issues/925)
  [75e0888](https://github.com/elastic/elasticsearch-php/commit/125594b40d167ef1509b3ee49a3f93426390c426)
- Added `ClientBuilder::includePortInHostHeader()` to add the
  `port` in the `Host` header. This fixes [#993](https://github.com/elastic/elasticsearch-php/issues/993).
  By default the `port` is not included in the `Host` header.
  [#997](https://github.com/elastic/elasticsearch-php/pull/997)
- Replace abandoned packages: ringphp, streams and phpstan-shim 
  [#996](https://github.com/elastic/elasticsearch-php/pull/996)
- Fixed gzip compression when setting Cloud Id
  [#986](https://github.com/elastic/elasticsearch-php/pull/986)

## Release 7.5.0

- Fixed `Client::extractArgument` iterable casting to array;
  this allows passing a `Traversable` body for some endpoints
  (e.g. Bulk, Msearch, MsearchTemplate)
  [#983](https://github.com/elastic/elasticsearch-php/pull/983)
- Fixed the Response Exception if the `reason` field is null
  [#980](https://github.com/elastic/elasticsearch-php/pull/980)
- Added support for PHP 7.4
  [#976](https://github.com/elastic/elasticsearch-php/pull/976)

## Release 7.4.1

- We added the suppress operator `@` for the deprecation messages `@trigger_error()`.
  With this approach we don't break existing application that convert PHP errors in Exception
  (e.g. using Laravel with issue https://github.com/babenkoivan/scout-elasticsearch-driver/issues/297)
  Using the `@` operator is still possible to intercept the deprecation message using
  a custom error handler.
  [#973](https://github.com/elastic/elasticsearch-php/pull/973)
- Add missing leading slash in the URL of put mapping endpoint
  [#970](https://github.com/elastic/elasticsearch-php/pull/970)
- Fix pre 7.2 endpoint class name with aliases + reapply fix #947.
  This PR solved the unexpected BC break introduce in 7.4.0 with the code
  generation tool
  [#968](https://github.com/elastic/elasticsearch-php/pull/968)

## Release 7.4.0

- Added the code generation for endpoints and namespaces based on
  the [REST API specification](https://github.com/elastic/elasticsearch/tree/v7.4.2/rest-api-spec/src/main/resources/rest-api-spec/api)
  of Elasticsearch. This tool is available in `util/GenerateEndpoints.php`.
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- Fixed the asciidoc [endpoints documentation](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/ElasticsearchPHP_Endpoints.html) based on the code generation 
  using [Sami](https://github.com/FriendsOfPHP/Sami) project
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- All the `experimental` and `beta` APIs are now signed with
  a `@note` tag in the phpdoc section (e.g. [$client->rankEval()](https://github.com/elastic/elasticsearch-php/blob/master/src/Elasticsearch/Client.php)). For more information read the [experimental and beta APIs](docs/experimental-beta-apis.asciidoc)
  section in the documentation.
  [#966](https://github.com/elastic/elasticsearch-php/pull/966)
- Removed `AlreadyExpiredException` since it has been removed
  from Elasticsearch with https://github.com/elastic/elasticsearch/pull/24857
  [#954](https://github.com/elastic/elasticsearch-php/pull/954)

## Release 7.3.0

- Added support for simplified access to the `X-Opaque-Id` header
  [#952](https://github.com/elastic/elasticsearch-php/pull/952)
- Added the HTTP port in the log messages
  [#950](https://github.com/elastic/elasticsearch-php/pull/950)
- Fixed hostname with underscore (ClientBuilder::prependMissingScheme)
  [#949](https://github.com/elastic/elasticsearch-php/pull/949)
- Removed unused Monolog in ClientBuilder
  [#948](https://github.com/elastic/elasticsearch-php/pull/948)
  
## Release 7.2.2

- Reintroduced the optional parameter in `Elasticsearch\Namespaces\IndicesNamespace::getAliases()`.
  This fixes the BC break introduced in 7.2.0 and 7.2.1.
  [#947](https://github.com/elastic/elasticsearch-php/pull/)

## Release 7.2.1

- Reintroduced `Elasticsearch\Namespaces\IndicesNamespace::getAliases()` as proxy
  to `IndicesNamespace::getAlias()` to prevent BC breaks. The `getAliases()` is
  marked as deprecated and it will be removed from `elasticsearch-php 8.0`
  [#943](https://github.com/elastic/elasticsearch-php/pull/943)

### Docs

- Fixed missing put mapping code snippet in code examples
  [#938](https://github.com/elastic/elasticsearch-php/pull/938)

# Release 7.2.0

- Updated the API endpoints for working with Elasticsearch 7.2.0:
    - added `wait_for_active_shards` parameter to `indices.close` API;
    - added `expand_wildcards` parameter to `cluster.health` API;
    - added include_unloaded_segments`, `expand_wildcards`, `forbid_closed_indices`
      parameters to `indices.stats` API.
  [[27d721b]](https://github.com/elastic/elasticsearch-php/pull/933/commits/27d721ba44b8c199388650c5a1c8bd69757229aa)
- Updated the phpdoc parameters for all the API endpoints
  [[27d721b]](https://github.com/elastic/elasticsearch-php/pull/933/commits/27d721ba44b8c199388650c5a1c8bd69757229aa)  
- Improved the Travis CI speed using cache feature with composer
  [#929](https://github.com/elastic/elasticsearch-php/pull/929)
- Fixed `php_uname()` usage checking if it is disabled
  [#927](https://github.com/elastic/elasticsearch-php/pull/927)
- Added support of Elastic Cloud ID and API key authentication
  [#923](https://github.com/elastic/elasticsearch-php/pull/923)

## Release 7.1.1

- Fixed `ClientBuilder::setSSLVerification()` to accept string or boolean
  [#917](https://github.com/elastic/elasticsearch-php/pull/917)
- Fix type hinting for `setBody` in `Elasticsearch\Endpoints\Ingest\Pipeline\Put`
  [#913](https://github.com/elastic/elasticsearch-php/pull/913)

## Release 7.1.0

- Added warning log for Elasticsearch response containing the `Warning` header
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)
- Fixed #838 hosting company is blocking ports because of `YamlRunnerTest.php`
  [#844](https://github.com/elastic/elasticsearch-php/pull/844)
- Specialized inheritance of `NoNodesAvailableException` to extend `ServerErrorResponseException`
  instead of the generic `\Exception`
  [#607](https://github.com/elastic/elasticsearch-php/pull/607)
- Fixed scroll TTL is extracted but not set as a body param
  [#907](https://github.com/elastic/elasticsearch-php/pull/907)

### Testing

- Improved the speed of integration tests removing snapshots delete from `YamlRunnerTest::clean`
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)
- Reduced the number of skipping YAML integration tests from 20 to 6
  [#911](https://github.com/elastic/elasticsearch-php/pull/911)

### Docs

- Documentation updated for Elasticsearch 7
  [#904](https://github.com/elastic/elasticsearch-php/pull/904)

## Release 7.0.2

- Fixed incorrect return type hint when using async requests/futures
  [#905](https://github.com/elastic/elasticsearch-php/pull/905)

## Release 7.0.1

- Fixed SniffingConnectionPool removing the return type of Connection::sniff()
  [#899](https://github.com/elastic/elasticsearch-php/pull/899)

## Release 7.0.0

- Requirement of PHP 7.1 instead of 7.0 that is not supported since 1 Jan 2019.
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Code refactoring using type hints and return type declarations where possible
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Update vendor libraries (PHPUnit 7.5, Symfony YAML 4.3, etc)
  [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Updated all the API endpoints using the [latest 7.0.0 specs](https://github.com/elastic/elasticsearch/tree/v7.0.0/rest-api-spec/src/main/resources/rest-api-spec/api) of Elasticsearch [#897](https://github.com/elastic/elasticsearch-php/pull/897)
- Added the `User-Agent` in each HTTP request [#898](https://github.com/elastic/elasticsearch-php/pull/898)
- Simplified the logging methods `logRequestFail($request, $response, $exception)`
  and `logRequestSuccess($request, $response)` in `Elasticsearch\Connections\Connection`
  [#876](https://github.com/elastic/elasticsearch-php/pull/876)
- Fix `json_encode` for unicode(emoji) characters [856](https://github.com/elastic/elasticsearch-php/pull/856)
- Fix HTTP port specification using CURLOPT_PORT, not anymore in the host [782](https://github.com/elastic/elasticsearch-php/pull/782)

## Release 6.7.1

- Added `track_total_hits` in `search` endpoint [0c9ff47](https://github.com/elastic/elasticsearch-php/commit/9f4f0dfa331c4f50d2c88c0068afd3062e6ea353)

## Release 6.7.0

- Removed requirement of `{type}` part in `indices.put_mapping`, see new API specification [here](https://github.com/elastic/elasticsearch/blob/v6.7.0/rest-api-spec/src/main/resources/rest-api-spec/api/indices.put_mapping.json)
- Added `seq_no_primary_term` parameter in `bulk` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `include_type_name`, `if_primary_term`, `if_seq_no` in `delete` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `include_type_name` in `get`, `index`, `indices.create`, `indices.field.get`, `indices.get`, `indices.mapping.get`, `indices.mapping.getfield`, `indices.mapping.put`, `indices.rollover`, `indices.template.get`, `indices.template.put` endpoints [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `seq_no_primary_term` in `search` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)
- Added `if_primary_term', 'if_seq_no`in `update` endpoint [#884](https://github.com/elastic/elasticsearch-php/pull/884)

### Testing

- Fix tests for PHP 7 with ES 6.7 [[5401479](https://github.com/elastic/elasticsearch-php/pull/884/commits/5401479)

### Docs

- [DOCS] Fix doc links in README [[5a1782d]](https://github.com/elastic/elasticsearch-php/pull/884/commits/5a1782d)

## Release 6.5.0

- Remove `_suggest` endpoint, which has disappeared from ES6 [#763](https://github.com/elastic/elasticsearch-php/pull/763)
- Fix `SearchHitIterator` key duplicates [#872](https://github.com/elastic/elasticsearch-php/pull/872)
- Fixing script get and delete by removing `lang` from endpoint url [#814](https://github.com/elastic/elasticsearch-php/pull/814)
- Fix `SearchResponseIterator` is scrolling the first page twice [#871](https://github.com/elastic/elasticsearch-php/pull/871), issue [#595](https://github.com/elastic/elasticsearch-php/issues/595)

### Docs

- [DOCS] Add reference to `parse_url()` for Extended Host Configuration [#778](https://github.com/elastic/elasticsearch-php/pull/778)
- [DOCS] Update php version requirement [#757](https://github.com/elastic/elasticsearch-php/pull/757)
- [DOCS] Update `community.asciidoc`, added `ElasticSearchQueryDSL` project [#749](https://github.com/elastic/elasticsearch-php/pull/749)
- [DOCS] Proper return type array for get method for `IndicesNamespace` [#651](https://github.com/elastic/elasticsearch-php/pull/651)
- [DOCS] Fix full docs link [#862](https://github.com/elastic/elasticsearch-php/pull/862)
- [DOCS] Update breaking-changes.asciidoc, removal of ClientBuilder::defaultLogger() [879](https://github.com/elastic/elasticsearch-php/pull/879)

### Testing

- Fix integration tests using docker [#867](https://github.com/elastic/elasticsearch-php/pull/867)

## Release 6.1.0

- Add 'wait_for_no_initializing_shards' to Cluster\Health whitelist [[98a372c]](http://github.com/elasticsearch/elasticsearch-php/commit/98a372c)
- Add 'wait_for_active_shards' to Indices\Open whitelist [[0275fe5]](http://github.com/elasticsearch/elasticsearch-php/commit/0275fe5)
- Add 'max_concurrent_searches' to msearch whitelist [[5624123]](http://github.com/elasticsearch/elasticsearch-php/commit/5624123)
- Add 'max_concurrent_shard_requests' param to MSearch endpoint [[00800c1]](http://github.com/elasticsearch/elasticsearch-php/commit/00800c1)
- Add ReloadSecureSettings endpoint [[75b32b2]](http://github.com/elasticsearch/elasticsearch-php/commit/75b32b2)
- Remove obsolete Shutdown API [[c75d690]](http://github.com/elasticsearch/elasticsearch-php/commit/c75d690)
- Fix: Restore::setBody() does not throw exceptions (#828) [[a96bb9c]](http://github.com/elasticsearch/elasticsearch-php/commit/a96bb9c)
- Fixed php 7.3 compatibility for elasticsearch 6 (#827) [[77916b2]](http://github.com/elasticsearch/elasticsearch-php/commit/77916b2)
- Fix issue with getting status of respository and snapshots. (#719) [[2d11682]](http://github.com/elasticsearch/elasticsearch-php/commit/2d11682)
- fix DeleteByQuery param white list (#748) [[8d963c6]](http://github.com/elasticsearch/elasticsearch-php/commit/8d963c6)

### Docs
- [Docs] Update elasticsearch version (#743) [[043ad4f]](http://github.com/elasticsearch/elasticsearch-php/commit/043ad4f)
- [DOCS] reuqest → request typo fix (#728) [[68db9f0]](http://github.com/elasticsearch/elasticsearch-php/commit/68db9f0)
- [DOCS] Fix documentation example of upsert (#730) [[805329b]](http://github.com/elasticsearch/elasticsearch-php/commit/805329b)
- [DOCS] Replace deprecated string type with keyword type for index operations (#736) [[a550507]](http://github.com/elasticsearch/elasticsearch-php/commit/a550507)

### Testing

- [TEST] Fix travis untarring [[0106351]](http://github.com/elasticsearch/elasticsearch-php/commit/0106351)
- [TEST] Download artifacts directly, migrate off esvm [[1e9f06c]](http://github.com/elasticsearch/elasticsearch-php/commit/1e9f06c)
- Update Travis Matrix [[aa32b12]](http://github.com/elasticsearch/elasticsearch-php/commit/aa32b12)
- [TEST] Fix teardown in yaml runner [[098030e]](http://github.com/elasticsearch/elasticsearch-php/commit/098030e)
- Add Indices/Split endpoint [[46d5a7a]](http://github.com/elasticsearch/elasticsearch-php/commit/46d5a7a)
- [TEST] Blacklist some bad yml tests [[d5edab7]](http://github.com/elasticsearch/elasticsearch-php/commit/d5edab7)

## Release 6.0.1

- Fix imports [[0106351]](http://github.com/elasticsearch/elasticsearch-php/commit/0106351)
- ClientBuilder: setLogger() and setTracer() only accept \Psr\Log\LoggerInterface (#673) [[0270c4f]](http://github.com/elasticsearch/elasticsearch-php/commit/0270c4f)
- fix for invalid GET /_aliases route. (#663) [[6d467fa]](http://github.com/elasticsearch/elasticsearch-php/commit/6d467fa)
- Remove PutTemplate endpoint, lang param of PutScript no longer used [[a13544f]](http://github.com/elasticsearch/elasticsearch-php/commit/a13544f)
  Note: I'm considering PutTemplate removal a bugfix, since the API doesn't exist in ES Core anymore. Using the endpoint throws an error,
  so the removal is just fixing an existing bug, hence `6.0.1` instead of `6.1.0`

### Docs
- [DOCS] Add note about separate X-Pack library to README (#694) [[6ffdef8]](http://github.com/elasticsearch/elasticsearch-php/commit/6ffdef8)
- [DOCS] add link to community index helper (#681) [[644f7f7]](http://github.com/elasticsearch/elasticsearch-php/commit/644f7f7)
- [DOCS] Add missing content for breaking changes page [[5a515ac]](http://github.com/elasticsearch/elasticsearch-php/commit/5a515ac)
- [DOCS] update autogenerated api docs [[7f2cd0b]](http://github.com/elasticsearch/elasticsearch-php/commit/7f2cd0b)
- [DOCS] Update version tables [[b824bb7]](http://github.com/elasticsearch/elasticsearch-php/commit/b824bb7)

## Release 6.0.0


- Add Ingest\ProcessorGrok endpoint [[800b1ec]](http://github.com/elasticsearch/elasticsearch-php/commit/800b1ec)
- Add Cluster\RemoteInfo endoint [[dfd8c3c]](http://github.com/elasticsearch/elasticsearch-php/commit/dfd8c3c)
- Add Unauthorized401Exception [[cc68efd]](http://github.com/elasticsearch/elasticsearch-php/commit/cc68efd)
- Add verify as acceptable query string parameter for createRepository (#665) [[885bfea]](http://github.com/elasticsearch/elasticsearch-php/commit/885bfea)
- Fix parsing of NodesInfo for Sniffing [[e22f67f]](http://github.com/elasticsearch/elasticsearch-php/commit/e22f67f)
- Do not schedule connection pool checks on 4xx level errors [[fd75e99]](http://github.com/elasticsearch/elasticsearch-php/commit/fd75e99)
- Add 'terminate_after' to Count endpoint whitelist (#634) [[c3cacd7]](http://github.com/elasticsearch/elasticsearch-php/commit/c3cacd7)

### Docs
- [DOCS] Flip Branch / PHP Version table (#656) [[fa7bfb3]](http://github.com/elasticsearch/elasticsearch-php/commit/fa7bfb3)

### Testing
- [TEST] use proper TestCase parent clsas [[766b440]](http://github.com/elasticsearch/elasticsearch-php/commit/766b440)
- [TEST] add PHPStan to build (#628) [[946cd65]](http://github.com/elasticsearch/elasticsearch-php/commit/946cd65)
- [TEST] Fix some PHPCS violations in tests [[18a38dd]](http://github.com/elasticsearch/elasticsearch-php/commit/18a38dd)
- [src] add PHP_CodeSniffer (#647) [[24900ef]](http://github.com/elasticsearch/elasticsearch-php/commit/24900ef)
- [TEST] add PHP_CodeSniffer to build (#638) [[088a509]](http://github.com/elasticsearch/elasticsearch-php/commit/088a509)
- [TEST] Use tests from corresponding ES version (#649) [[75c6680]](http://github.com/elasticsearch/elasticsearch-php/commit/75c6680)
- [TEST] Add support for `bad_request` in yaml runner [[ad86f91]](http://github.com/elasticsearch/elasticsearch-php/commit/ad86f91)
- [TEST] `max_compilations_per_minute` is now `max_compilations_rate` [[ebdba06]](http://github.com/elasticsearch/elasticsearch-php/commit/ebdba06)
- [TEST] print elasticsearch.log if cluster fails to start [[fe796aa]](http://github.com/elasticsearch/elasticsearch-php/commit/fe796aa)
- [TEST] move integration test to dedicated test file [[71ccfc1]](http://github.com/elasticsearch/elasticsearch-php/commit/71ccfc1)
- [TEST] Client does not support accepting Yaml format responses [[fc9a9f9]](http://github.com/elasticsearch/elasticsearch-php/commit/fc9a9f9)



## Release 6.0.0-beta1

Woo!

- Use upper-case "Host" header [[045aac4]](http://github.com/elasticsearch/elasticsearch-php/commit/045aac4)
- Add 'allow_no_indices' param to Indices\Delete whitelist [[3a3a5ab]](http://github.com/elasticsearch/elasticsearch-php/commit/3a3a5ab)
- Add 'verbose' param to Snapshot\Get whitelist [[b70b933]](http://github.com/elasticsearch/elasticsearch-php/commit/b70b933)
- Add 'pre_filter_shard_size' param to Search whitelist [[f708d9d]](http://github.com/elasticsearch/elasticsearch-php/commit/f708d9d)
- Add 'ignore_unavailable' param to Indices\Delete whitelist [[8133021]](http://github.com/elasticsearch/elasticsearch-php/commit/8133021)
- Add 'include_defaults' param to Cluster\Settings\Get whitelist [[8e5ab38]](http://github.com/elasticsearch/elasticsearch-php/commit/8e5ab38)

### Docs
- [DOCS] Remove Sami from composer.json and update docs (#619) [[fcd5ff1]](http://github.com/elasticsearch/elasticsearch-php/commit/fcd5ff1)
- [Docs] recommend composer/ca-bundle instead of Kdyby/CurlCaBundle (#613) [[7f43b2e]](http://github.com/elasticsearch/elasticsearch-php/commit/7f43b2e)


### Testing

- [TEST] Fix content-type assertions in test to match case [[5b37117]](http://github.com/elasticsearch/elasticsearch-php/commit/5b37117)
- Capitalize 'Content-Type' for maximum compatibility [[b8ad96c]](http://github.com/elasticsearch/elasticsearch-php/commit/b8ad96c)
- [TEST] Use percentage watermarks to be compatible with default flood [[95d2f89]](http://github.com/elasticsearch/elasticsearch-php/commit/95d2f89)
- [TEST] remove watermark flood from static config [[9b71940]](http://github.com/elasticsearch/elasticsearch-php/commit/9b71940)
- Shrink API was not setting body correctly [[e0f0985]](http://github.com/elasticsearch/elasticsearch-php/commit/e0f0985)
- [TEST] Add some missing and required static configs [[38febbe]](http://github.com/elasticsearch/elasticsearch-php/commit/38febbe)
- [TEST] Allow skipping individual tests inside of test file [[51b9b9b]](http://github.com/elasticsearch/elasticsearch-php/commit/51b9b9b)
- Travis: add PHP 7.2 + ES 6.0 to build matrix (#622) [[061f100]](http://github.com/elasticsearch/elasticsearch-php/commit/061f100)
- [TEST] tests code cleanup (#618) [[dc5d18c]](http://github.com/elasticsearch/elasticsearch-php/commit/dc5d18c)
- [TEST] Fix RoundRobinSelector Tests (#617) [[23a0ba8]](http://github.com/elasticsearch/elasticsearch-php/commit/23a0ba8)
- [TEST] skip new percentile tests for now [[b5d9613]](http://github.com/elasticsearch/elasticsearch-php/commit/b5d9613)
- [TEST] drop HHVM from build [#611] (#616) [[21a2d24]](http://github.com/elasticsearch/elasticsearch-php/commit/21a2d24)
- [TEST] Skip cat.aliases/20_headers.yml [[c83ca74]](http://github.com/elasticsearch/elasticsearch-php/commit/c83ca74)
- [TEST] YamlRunnerTest should run both .yml and .yaml files [[98c2646]](http://github.com/elasticsearch/elasticsearch-php/commit/98c2646)
- [TEST] build against ES 6 on Travis [[b5886a8]](http://github.com/elasticsearch/elasticsearch-php/commit/b5886a8)
- [TEST] drop HHVM from build [#611] [[0a7b402]](http://github.com/elasticsearch/elasticsearch-php/commit/0a7b402)
- [TEST] test tweaks to appease stricter types [[51f189e]](http://github.com/elasticsearch/elasticsearch-php/commit/51f189e)
- Fix ClientBuilder - pass correct argument for Elasticsearch\Endpoints\MsearchTemplate::__construct. (#605) [[5f83b52]](http://github.com/elasticsearch/elasticsearch-php/commit/5f83b52)
- [TEST] improve code quality of tests (#610) [[9ea2156]](http://github.com/elasticsearch/elasticsearch-php/commit/9ea2156)
- [TEST] Support headers in yaml runner, do some bad-comment cleaning [[57b5489]](http://github.com/elasticsearch/elasticsearch-php/commit/57b5489)
- [TEST] fix handling of format for Cat tests [[a24b7d1]](http://github.com/elasticsearch/elasticsearch-php/commit/a24b7d1)
- [TEST] test files are now .yml instead of .yaml [[ceac5bd]](http://github.com/elasticsearch/elasticsearch-php/commit/ceac5bd)
