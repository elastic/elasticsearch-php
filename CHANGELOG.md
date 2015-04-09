## Release 2.0.0-beta2

- `curl_reset` was added in 5.5, use `curl_multi_init` to check for curl instead [[b722802]](http://github.com/elasticsearch/elasticsearch-php/commit/b722802)
- Update Composer.json with PSR-4 [[7bfd251]](http://github.com/elasticsearch/elasticsearch-php/commit/7bfd251)
- Add Cat\Plugins endpoint [[3044da9]](http://github.com/elasticsearch/elasticsearch-php/commit/3044da9)
- Indices/Stats endpoint should implode multi-valued metric parameters into a single string [[c2097b9]](http://github.com/elasticsearch/elasticsearch-php/commit/c2097b9)
- Fix typo in 'metric' argument of Stats function in IndicesNamespace.php [[db85afb]](http://github.com/elasticsearch/elasticsearch-php/commit/db85afb)
