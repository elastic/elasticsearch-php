## Release 6.8.1

- Fix missing class aliases in 6.8.0 (https://github.com/elastic/elasticsearch-php/pull/1114)
- Backported fix #1066 (https://github.com/elastic/elasticsearch-php/pull/1109)

## Release 6.8.0

- Added XPack endpoints
- Added X-Opaque-Id header (https://github.com/elastic/elasticsearch-php/pull/952)
- Added X-Elastic-Client-Meta header (https://github.com/elastic/elasticsearch-php/pull/1089)
- Added the license header (https://github.com/elastic/elasticsearch-php/commit/0ff5fb98745a511118df5b1a68ca54d892b08ee3)
- Support of PHP 8 (https://github.com/elastic/elasticsearch-php/pull/1095 and https://github.com/elastic/elasticsearch-php/pull/1063)
- Replace `array_walk` with `array_map` in `Connection::getURI` (https://github.com/elastic/elasticsearch-php/pull/1075)
- Fix for #1064 reset custom headers (https://github.com/elastic/elasticsearch-php/pull/1065)
- Replace `guzzlehttp/ringphp` with `ezimuel/ringphp` (https://github.com/elastic/elasticsearch-php/pull/1102)

## Release 6.7.2

- Fix #846 choosing `GET` and `POST` in endpoints based on body [[acbc76d0]](https://github.com/elastic/elasticsearch-php/commit/acbc76d0)
- Fix #843 adding `wait_for_active_shards` and `pipeline` in `UpdateByQuery` [[acbc76d0]](https://github.com/elastic/elasticsearch-php/commit/acbc76d0)
- Fixed missing `ScriptsPainlessExecute` endpoint, since ES 6.3 [[acbc76d0]](https://github.com/elastic/elasticsearch-php/commit/acbc76d0)
- Fixed missing `RankEval` endpoint, since ES 6.2 [[acbc76d0]](https://github.com/elastic/elasticsearch-php/commit/acbc76d0)
- Added User-Agent header equal to `elasticsearch-php/6.7.1 (metadata-values)` [[acbc76d0]](https://github.com/elastic/elasticsearch-php/commit/acbc76d0)

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
- [DOCS] Update breaking-changes.asciidoc, removal of ClientBuilder::defaultLogger() [#879](https://github.com/elastic/elasticsearch-php/pull/879)

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
