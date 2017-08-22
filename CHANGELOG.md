
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
