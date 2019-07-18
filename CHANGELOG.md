## Release 5.5.0

- Added `User-Agent` header equal to  `elasticsearch-php/5.5.0 (metadata-values)` [[26da9a33]](https://github.com/elastic/elasticsearch-php/commit/26da9a33)
- Fix #846 choosing GET and POST in endpoints based on body [[cdbeab38]](https://github.com/elastic/elasticsearch-php/commit/cdbeab38)
- Fix #843 adding `wait_for_active_shards` and `pipeline` in UpdateByQuery [[8b36458]](https://github.com/elastic/elasticsearch-php/commit/8b36458319b1734d1032817abf1f850d3fcfd4ec)

## Release 5.4.0

- fixed php 7.3 compatibility for elasticsearch 5 (#826) [[14a19ba]](http://github.com/elasticsearch/elasticsearch-php/commit/14a19ba)
- Add `slices` param to whitelisted UBQ params (#752) [[13f248e]](http://github.com/elasticsearch/elasticsearch-php/commit/13f248e)
- [DOCS] add link to community index helper (#681) (#726) [[6d414f2]](http://github.com/elasticsearch/elasticsearch-php/commit/6d414f2)
- Fix issue with getting status of respository and snapshots. (#719) [[65aafc1]](http://github.com/elasticsearch/elasticsearch-php/commit/65aafc1)
- fix DeleteByQuery param white list (#748) [[55e6a70]](http://github.com/elasticsearch/elasticsearch-php/commit/55e6a70)

## Release 5.3.2

- Fix parsing of NodesInfo for Sniffing [[d771699]](http://github.com/elasticsearch/elasticsearch-php/commit/d771699)
- [TEST] print elasticsearch.log if cluster fails to start [[e03cbb2]](http://github.com/elasticsearch/elasticsearch-php/commit/e03cbb2)
- Fix bug where exceptions were being used as array in PHP 5.x [[c5db567]](http://github.com/elasticsearch/elasticsearch-php/commit/c5db567)

## Release 5.3.1

- Do not schedule connection pool checks on 4xx level errors
- Add 'terminate_after' to Count endpoint whitelist (#634) [[1a20259]](http://github.com/elasticsearch/elasticsearch-php/commit/1a20259)
- Use upper-case "Host" header [[1621094]](http://github.com/elasticsearch/elasticsearch-php/commit/1621094)
- Shrink API was not setting body correctly [[129ed4a]](http://github.com/elasticsearch/elasticsearch-php/commit/129ed4a)
- Capitalize 'Content-Type' for maximum compatibility [[3f136b5]](http://github.com/elasticsearch/elasticsearch-php/commit/3f136b5)
- Fix ClientBuilder - pass correct argument for Elasticsearch\Endpoints\MsearchTemplate::__construct. (#606) [[21f5ce4]](http://github.com/elasticsearch/elasticsearch-php/commit/21f5ce4)

### Testing

- [TEST] move integration test to dedicated test file [[3e01b9e]](http://github.com/elasticsearch/elasticsearch-php/commit/3e01b9e)
- [TEST] Client does not support accepting Yaml format responses [[e5d9fbb]](http://github.com/elasticsearch/elasticsearch-php/commit/e5d9fbb)
- [TEST] Fix content-type assertions in test to match case [[d31a51b]](http://github.com/elasticsearch/elasticsearch-php/commit/d31a51b)
- [TEST] Support headers in yaml runner, do some bad-comment cleaning [[5590a88]](http://github.com/elasticsearch/elasticsearch-php/commit/5590a88)
- [TEST] Add some missing and required static configs [[b41c733]](http://github.com/elasticsearch/elasticsearch-php/commit/b41c733)
- [TEST] add newer ES versions to Travis build matrix (#609) [[de6cde4]](http://github.com/elasticsearch/elasticsearch-php/commit/de6cde4)
- [TEST] fix handling of format for Cat tests [[46f9d59]](http://github.com/elasticsearch/elasticsearch-php/commit/46f9d59)
- [TEST] drop HHVM from build [#611] (#615) [[34d09a8]](http://github.com/elasticsearch/elasticsearch-php/commit/34d09a8)


## Release 5.3.0
- Add MsearchTemplate endpoint [[df7004f]](http://github.com/elasticsearch/elasticsearch-php/commit/df7004f)
- Add Cat\Templates endpoint [[776c865]](http://github.com/elasticsearch/elasticsearch-php/commit/776c865)
- Add FieldCaps endpoint [[0acccc6]](http://github.com/elasticsearch/elasticsearch-php/commit/0acccc6)
- Add Remote Namespace and Remote\Info endpoint [[82121d9]](http://github.com/elasticsearch/elasticsearch-php/commit/82121d9)
- Allow Sliced Scroll for the Search endpoint (#604) [[dfdb1a8]](http://github.com/elasticsearch/elasticsearch-php/commit/dfdb1a8)
- Added "slices" parameter to the Reindex endpoint (#598) [[d9aaefd]](http://github.com/elasticsearch/elasticsearch-php/commit/d9aaefd)
- fix conflict when merging timeout param (#562) [[505688d]](http://github.com/elasticsearch/elasticsearch-php/commit/505688d)

### Testing
- [TEST] Temporarily blacklist some yaml tests that aren't parsing [[d857ae1]](http://github.com/elasticsearch/elasticsearch-php/commit/d857ae1)
- [TEST] Add missing `lt` and `lte` test operators [[02adc14]](http://github.com/elasticsearch/elasticsearch-php/commit/02adc14)

### Docs
- [Docs] Updating readme with mock testing instructions (#591) [[1623d44]](http://github.com/elasticsearch/elasticsearch-php/commit/1623d44)
- [Docs] Symfony bundle added (#560) [[69dbd4c]](http://github.com/elasticsearch/elasticsearch-php/commit/69dbd4c)
- [DOCS] Remove incorrect Composer instructions from README (#565) [[9606f52]](http://github.com/elasticsearch/elasticsearch-php/commit/9606f52)

## Release 5.2.0

- Add 'batched_reduce_size' / 'typed_keys' params to Search endpoint [[691ce24]](http://github.com/elasticsearch/elasticsearch-php/commit/691ce24)
- Fix Scroll and ClearScroll syntax [[59b3c08]](http://github.com/elasticsearch/elasticsearch-php/commit/59b3c08)
- Add 'request', 'request_cache' to ClearCache endpoint [[07ff0be]](http://github.com/elasticsearch/elasticsearch-php/commit/07ff0be)
- Handle null `type` better [[9900cfd]](http://github.com/elasticsearch/elasticsearch-php/commit/9900cfd)
- Add 'stored_fields' param to Exists, Explain and Search endpoints [[01f9a06]](http://github.com/elasticsearch/elasticsearch-php/commit/01f9a06)
- Add endpoint index and type getters (#557) [[0d9cdfa]](http://github.com/elasticsearch/elasticsearch-php/commit/0d9cdfa)
- added getTransport, getEndpoint, getRegisteredNamespacesBuilder to ClientBuilder.php (#551) [[608bfe8]](http://github.com/elasticsearch/elasticsearch-php/commit/608bfe8)
- Add 'version' param to Exists whitelist [[f2ae26b]](http://github.com/elasticsearch/elasticsearch-php/commit/f2ae26b)
- Add 'typed_keys' param to MSearch whitelist [[3884ca0]](http://github.com/elasticsearch/elasticsearch-php/commit/3884ca0)
- Make id param optionnal for termvectors requests. (#542) [[e6f79de]](http://github.com/elasticsearch/elasticsearch-php/commit/e6f79de)

### Testing

- [TEST] Warning header format has changed slightly [[6c8699c]](http://github.com/elasticsearch/elasticsearch-php/commit/6c8699c)
- [TEST] Added missing semicolon (#544) [[ccfb5a6]](http://github.com/elasticsearch/elasticsearch-php/commit/ccfb5a6)
- [TEST] Allow JSON workaround, remove travis hackery [[3467c19]](http://github.com/elasticsearch/elasticsearch-php/commit/3467c19)

### Docs

- Update index-operations.asciidoc (#537) [[348fb4d]](http://github.com/elasticsearch/elasticsearch-php/commit/348fb4d)
- [DOCS] use std class in example instead of empty array (#549) [[9c45775]](http://github.com/elasticsearch/elasticsearch-php/commit/9c45775)
- [DOCS] Documentation fixes for 5.0 (typos, etc.) (#543) [[c4cf003]](http://github.com/elasticsearch/elasticsearch-php/commit/c4cf003)
- [DOCS] bool query's "query" should use a "should" (#545) [[8ec26ba]](http://github.com/elasticsearch/elasticsearch-php/commit/8ec26ba)
- [DOCS] Fix scrolling example [[006b3c2]](http://github.com/elasticsearch/elasticsearch-php/commit/006b3c2)

## Release 5.1.3

- allowBadJSONSerialization() builder method should be fluent [[f1812d4]](http://github.com/elasticsearch/elasticsearch-php/commit/f1812d4)

## Release 5.1.2

- A specific version of json-ext is no longer needed in 5.0 branch [[e1b5c2a]](http://github.com/elasticsearch/elasticsearch-php/commit/e1b5c2a)

## Release 5.1.1

- Add 'format' param to all Cat endpoints [[fc25a2c]](http://github.com/elasticsearch/elasticsearch-php/commit/fc25a2c)
- Add opt-in for ignoring JSON_PRESERVE_ZERO_FRACTION when serializing [[e34fdfd]](http://github.com/elasticsearch/elasticsearch-php/commit/e34fdfd)
- Prefer POST for Suggest endpoint [[aae7019]](http://github.com/elasticsearch/elasticsearch-php/commit/aae7019)
- Whitelist 'include_segment_file_sizes' in Cluster/Nodes/Stats endpoint [[a2744b4]](http://github.com/elasticsearch/elasticsearch-php/commit/a2744b4)
- Whitelist 'include_segment_file_sizes' in Indices/Stats endpoint [[2c6cd30]](http://github.com/elasticsearch/elasticsearch-php/commit/2c6cd30)
- Automatically set Content-type and Accept headers [[3d52e11]](http://github.com/elasticsearch/elasticsearch-php/commit/3d52e11)
- Put back UpdateByQuery (#531) [[6f4394f]](http://github.com/elasticsearch/elasticsearch-php/commit/6f4394f)
- Add 'human' param to global whitelist [[d16e541]](http://github.com/elasticsearch/elasticsearch-php/commit/d16e541)

### Testing

- [TEST] Tidy up version check [[ec6b832]](http://github.com/elasticsearch/elasticsearch-php/commit/ec6b832)

### Docs

- [DOCS] Update search-operations.asciidoc (#520) [[4aba49b]](http://github.com/elasticsearch/elasticsearch-php/commit/4aba49b)
- [DOCS] fix broken links to breaking changes docs [[7d1b0ec]](http://github.com/elasticsearch/elasticsearch-php/commit/7d1b0ec)

## Release 5.1.0

- Catch additional exceptions in the ping function for those who use multiple nodes in their connection pool. [[ffe0510]](http://github.com/elasticsearch/elasticsearch-php/commit/ffe0510)
- Use `array_diff` to Check Endpoint Parameters (#514) [[46f7f36]](http://github.com/elasticsearch/elasticsearch-php/commit/46f7f36)
- Re-Add the DeleteByQuery Functionality (#513) [[b262dca]](http://github.com/elasticsearch/elasticsearch-php/commit/b262dca)
- Add 'full_id' to Cat/Nodes endpoint [[f32cc54]](http://github.com/elasticsearch/elasticsearch-php/commit/f32cc54)
- add ClientBuilder->setConnectionParams() (#507) [[3923432]](http://github.com/elasticsearch/elasticsearch-php/commit/3923432)
- Add new (undocumented) PHP-7 JSON error codes, better unknown handling [[0a7fd55]](http://github.com/elasticsearch/elasticsearch-php/commit/0a7fd55)
- Add ext-json version constraint, update some docs [[ca2791a]](http://github.com/elasticsearch/elasticsearch-php/commit/ca2791a)
- Add catch-all in exception handling [[eb4117c]](http://github.com/elasticsearch/elasticsearch-php/commit/eb4117c)
- Revert "Simplify error parsing now that we don't support <2.0 errors" [[fd38538]](http://github.com/elasticsearch/elasticsearch-php/commit/fd38538)

### Testing

- [TEST] Make sure property_exists calls only ocurr on objects [[30baa0d]](http://github.com/elasticsearch/elasticsearch-php/commit/30baa0d)
- [TEST] Tweak travis to install better ext-json [[3409a81]](http://github.com/elasticsearch/elasticsearch-php/commit/3409a81)
- [TEST] Mute rollover test temporarily [[2316d33]](http://github.com/elasticsearch/elasticsearch-php/commit/2316d33)
- [TEST] Add support for warning header checks [[ac1b053]](http://github.com/elasticsearch/elasticsearch-php/commit/ac1b053)

### Documentation

- [DOCS] Removed unwanted ) and added proper formatting (#497) [[8187fdd]](http://github.com/elasticsearch/elasticsearch-php/commit/8187fdd)
- [DOCS] Update index-operations.asciidoc (#496) [[a4dd09f]](http://github.com/elasticsearch/elasticsearch-php/commit/a4dd09f)
- [DOCS] Update version in monolog configuration. (#489)  [[90fbd53]](http://github.com/elasticsearch/elasticsearch-php/commit/90fbd53)
- [DOCS] Update php-version-requirement.asciidoc (#491) [[4951439]](http://github.com/elasticsearch/elasticsearch-php/commit/4951439)
- [DOCS] "password" param should be "password" [[8ee2bc9]](http://github.com/elasticsearch/elasticsearch-php/commit/8ee2bc9)
- More asciidoc tweaks [[451f985]](http://github.com/elasticsearch/elasticsearch-php/commit/451f985)
- Asciidoc != markdown [[8a816c1]](http://github.com/elasticsearch/elasticsearch-php/commit/8a816c1)
- [Docs] More 5.0 readme tweaks [[a60dd09]](http://github.com/elasticsearch/elasticsearch-php/commit/a60dd09)
- [DOCS] 5.0 doc updates, readme, breaking changes [[6fb6421]](http://github.com/elasticsearch/elasticsearch-php/commit/6fb6421)


## Release 5.0.0

Woo!

### New Endpoints
- Add Cat/Tasks endpoint [[42856dc]](http://github.com/elasticsearch/elasticsearch-php/commit/42856dc)
- Add Reindex endpoint [[d2484c7]](http://github.com/elasticsearch/elasticsearch-php/commit/d2484c7)
- Add Indices/Shrink endpoint [[b6b97a4]](http://github.com/elasticsearch/elasticsearch-php/commit/b6b97a4)
- Add Indices/Rollover endpoint [[1ba8299]](http://github.com/elasticsearch/elasticsearch-php/commit/1ba8299)

### Removals/BWC Breaks/Deprecations

- Indices/Optimize endpoint has been removed in 5.0 [[4f0b9da]](http://github.com/elasticsearch/elasticsearch-php/commit/4f0b9da)
- Warmers have been removed in 5.0 [[ef24d5d]](http://github.com/elasticsearch/elasticsearch-php/commit/ef24d5d)
- Deprecate various Percolate endpoints [[959eee5]](http://github.com/elasticsearch/elasticsearch-php/commit/959eee5)
- Remove old `percolate` parameter on docblocks [[f64345d]](http://github.com/elasticsearch/elasticsearch-php/commit/f64345d)
- SearchExists Endpoint removed in 5.0 [[6dfc6a0]](http://github.com/elasticsearch/elasticsearch-php/commit/6dfc6a0)
- [Internal BWC Break] Add better ability to inject namespaces [[b1a27b7]](http://github.com/elasticsearch/elasticsearch-php/commit/b1a27b7)
- [Internal BWC Break] Refactor to remove Transport dependence in endpoints [[ecd454c]](http://github.com/elasticsearch/elasticsearch-php/commit/ecd454c)
- [BWC Break] Remove MLT endpoint [[38c05da]](http://github.com/elasticsearch/elasticsearch-php/commit/38c05da)
- [BWC Break] Remove DeleteByQuery endpoint [[9f3776a]](http://github.com/elasticsearch/elasticsearch-php/commit/9f3776a)
- [BWC Break] Rename internal TermVector -> TermVectors, remove old public TermVector [[cbe8619]](http://github.com/elasticsearch/elasticsearch-php/commit/cbe8619)
- [BWC] Add getPath() method to ConnectionInterface [[8bcf1a8]](http://github.com/elasticsearch/elasticsearch-php/commit/8bcf1a8)
- [BWC] Add getUserPass() method to ConnectionInterface [[586fbdb]](http://github.com/elasticsearch/elasticsearch-php/commit/586fbdb)
- [BWC] Add getHost() method to ConnectionInterface [[445fdea]](http://github.com/elasticsearch/elasticsearch-php/commit/445fdea)
- Tasks/List and Tasks/Get are now separate endpoints [[e0cc5f9]](http://github.com/elasticsearch/elasticsearch-php/commit/752d5a2)

### Updated/Added whitelist params

- Add Ingest namespace and endpoints [[7b87954]](http://github.com/elasticsearch/elasticsearch-php/commit/7b87954)
- Add `pipeline` parameter to Bulk endpoint whitelist [[3fa1c51]](http://github.com/elasticsearch/elasticsearch-php/commit/3fa1c51)
- Add `pipeline` to Index endpoint [[db5d794]](http://github.com/elasticsearch/elasticsearch-php/commit/db5d794)
- Add `include_defaults` param to Indices/GetSettings whitelist [[496071c]](http://github.com/elasticsearch/elasticsearch-php/commit/496071c)
- Add `preserve_existing` param to Indices/PutSettings whitelist [[69389fc]](http://github.com/elasticsearch/elasticsearch-php/commit/69389fc)
- Add Cluster/AllocationExplain endpoint [[f9c297c]](http://github.com/elasticsearch/elasticsearch-php/commit/f9c297c)
- Add Ingest namespace and endpoints [[66c851f]](http://github.com/elasticsearch/elasticsearch-php/commit/66c851f)
- Add missing params to Analyze endpoint: `char_filter`, `format`, `attributes`, `explain` [[8a0a932]](http://github.com/elasticsearch/elasticsearch-php/commit/8a0a932)
- `filters` is now `filter` in Analyze endpoint [[94dbb15]](http://github.com/elasticsearch/elasticsearch-php/commit/94dbb15)
- Add `size` param to Cat/Threadpool whitelist [[bece0e5]](http://github.com/elasticsearch/elasticsearch-php/commit/bece0e5)
- Add `task_id` to Tasks/Get whitelist [[6a315e0]](http://github.com/elasticsearch/elasticsearch-php/commit/6a315e0)
- Add `docvalue_fields` to Search whitelist, remove `fields` [[63ff8c5]](http://github.com/elasticsearch/elasticsearch-php/commit/63ff8c5)
- Add `format` to Cat/Aliases whitelist [[68630a0]](http://github.com/elasticsearch/elasticsearch-php/commit/68630a0)
- Add 'thread_pool_patterns' parameter to Cat\Threadpool endpoint [[c0820dc]](http://github.com/elasticsearch/elasticsearch-php/commit/c0820dc)
- Add 's' sort param to all Cat endpoints [[87f23a1]](http://github.com/elasticsearch/elasticsearch-php/commit/87f23a1)
- Add '_source' to Update whitelist [[d33be49]](http://github.com/elasticsearch/elasticsearch-php/commit/d33be49)
- Add 'ignore_unavailable' to Snapshot/Status whitelist [[f90c2dd]](http://github.com/elasticsearch/elasticsearch-php/commit/f90c2dd)
- Add 'ignore_unavailable' to Snapshot/Get whitelist [[93c4f22]](http://github.com/elasticsearch/elasticsearch-php/commit/93c4f22)
- Add 'stored_fields' to Mget whitelist [[054ebed]](http://github.com/elasticsearch/elasticsearch-php/commit/054ebed)
- Add 'wait_for_no_relocating_shards' to Cluster/Health whitelist [[8448f99]](http://github.com/elasticsearch/elasticsearch-php/commit/8448f99)
- Add 'health' to Cat/Indices whitelist [[06a3bf5]](http://github.com/elasticsearch/elasticsearch-php/commit/06a3bf5)
- Add '_source_include', '_source_exclude', 'pipeline' params to Bulk whitelist [[3ca12f4]](http://github.com/elasticsearch/elasticsearch-php/commit/3ca12f4)
- Add 'stored_fields' to Get Endpoint [[c57a5a4]](http://github.com/elasticsearch/elasticsearch-php/commit/c57a5a4)
- Add '_source' to Bulk endpoint whitelist [[35b7087]](http://github.com/elasticsearch/elasticsearch-php/commit/35b7087)

### Documentation

- [DOCS] Usage example for creating ClientBuilder fixed (#406) [[6a868ea]](http://github.com/elasticsearch/elasticsearch-php/commit/6a868ea)
- [Docs] Fix typo. (#409) [[b013ab0]](http://github.com/elasticsearch/elasticsearch-php/commit/b013ab0)
- Docs: Fixed broken link. [[17a4ed7]](http://github.com/elasticsearch/elasticsearch-php/commit/17a4ed7)
- [DOCS] Rebuild auto-generated docs [[2904d7a]](http://github.com/elasticsearch/elasticsearch-php/commit/2904d7a)
- Add script to generate docs [[4ce648c]](http://github.com/elasticsearch/elasticsearch-php/commit/4ce648c)
- Update Readme with 5.0 branching information [[ddb8ecd]](http://github.com/elasticsearch/elasticsearch-php/commit/ddb8ecd)
- [DOCS] Update URL/Email in class-level doc blocks [[8238cb3]](http://github.com/elasticsearch/elasticsearch-php/commit/8238cb3)
- [DOCS] Update copyright year in licenses [[fcc4ad6]](http://github.com/elasticsearch/elasticsearch-php/commit/fcc4ad6)
- [DOCS] Add Breaking Changes list for 5.0 [[65953ac]](http://github.com/elasticsearch/elasticsearch-php/commit/65953ac)
- [DOCS] add getSource method to the readme (#465) [[90cbdfb]](http://github.com/elasticsearch/elasticsearch-php/commit/90cbdfb)
- [DOCS] Replace deprecated filtered query with boolean [[3b81615]](http://github.com/elasticsearch/elasticsearch-php/commit/3b81615)
- [DOCS] Add Plastic Laravel integration to community page [[e4530a7]](http://github.com/elasticsearch/elasticsearch-php/commit/e4530a7)
- [DOCS] Fix return type in docblock for all Exists* endpoints [[498c003]](http://github.com/elasticsearch/elasticsearch-php/commit/498c003)
- Add autogenerated reference documentation [[bd64d52]](http://github.com/elasticsearch/elasticsearch-php/commit/bd64d52)
- [DOCS] Regenerate reference docs [[030d96e]](http://github.com/elasticsearch/elasticsearch-php/commit/030d96e)

### Cleanup

- Remove benchmark autoload [[74b5ad9]](http://github.com/elasticsearch/elasticsearch-php/commit/74b5ad9)
- Remove old rest-spec parser [[07754c4]](http://github.com/elasticsearch/elasticsearch-php/commit/07754c4)
- Remove unused benchmarks [[20a75b1]](http://github.com/elasticsearch/elasticsearch-php/commit/20a75b1)
- Automated PSR-2 style cleanup [[fbe6f92]](http://github.com/elasticsearch/elasticsearch-php/commit/fbe6f92)
- Tweak script for new cli format [[4adbe94]](http://github.com/elasticsearch/elasticsearch-php/commit/4adbe94)
- Fix Indices/Flush after autogeneration [[d56e2c4]](http://github.com/elasticsearch/elasticsearch-php/commit/d56e2c4)
- Tweak SpecParser template [[8341c4c]](http://github.com/elasticsearch/elasticsearch-php/commit/8341c4c)
- Added output folder from SpecParser to gitignore [[cfd49ee]](http://github.com/elasticsearch/elasticsearch-php/commit/cfd49ee)
- Updated ParseSpec to be able to run from console and use new api path [[e0cc5f9]](http://github.com/elasticsearch/elasticsearch-php/commit/d44a323)

### Bugfixes and Misc.

- Split Create out to its own internal endpoint for simplicity [[9eb573a]](http://github.com/elasticsearch/elasticsearch-php/commit/9eb573a)
- Cat/Snapshots 'repository' param is not in-fact required, despite spec [[6c77f62]](http://github.com/elasticsearch/elasticsearch-php/commit/6c77f62)
- Fix error handler when no structured error is present [[f380a69]](http://github.com/elasticsearch/elasticsearch-php/commit/f380a69)
- add JSON_PRESERVE_ZERO_FRACTION for Json_encode (#481) [[2ab3971]](http://github.com/elasticsearch/elasticsearch-php/commit/2ab3971)
- Simplify error parsing now that we don't support <2.0 errors [[a6d896b]](http://github.com/elasticsearch/elasticsearch-php/commit/a6d896b)
- Added support for PHP 7.1 (#474) [[864d4d3]](http://github.com/elasticsearch/elasticsearch-php/commit/864d4d3)
- Type exists URI has changed to index/_mapping/type [[dd63eaa]](http://github.com/elasticsearch/elasticsearch-php/commit/dd63eaa)
- Index creation only accepts PUT verbs now [[9c620c2]](http://github.com/elasticsearch/elasticsearch-php/commit/9c620c2)
- Update SearchResponseIterator to remove old-style scan/scroll flow [[72f3b15]](http://github.com/elasticsearch/elasticsearch-php/commit/72f3b15)
- Add "extended" host configuration syntax [[a0ddad1]](http://github.com/elasticsearch/elasticsearch-php/commit/a0ddad1)
- Allow ConnectionFactory to be override (#456) [[cc2a5fe]](http://github.com/elasticsearch/elasticsearch-php/commit/cc2a5fe)
- Special-case unwrapping for async methods that use Exist* endpoints [[347e5c5]](http://github.com/elasticsearch/elasticsearch-php/commit/347e5c5)
- composer: bump min version to PHP 5.6 (#451) [[6648646]](http://github.com/elasticsearch/elasticsearch-php/commit/6648646)
- Allow to get multiple pipelines without id (#453) [[c7f737b]](http://github.com/elasticsearch/elasticsearch-php/commit/c7f737b)
- Split, refactor and fix some tests (#447) [[68e819b]](http://github.com/elasticsearch/elasticsearch-php/commit/68e819b)
- Tests cleaned up a little [[afc9af0]](http://github.com/elasticsearch/elasticsearch-php/commit/afc9af0)
- Fix doc output on github [[62d6132]](http://github.com/elasticsearch/elasticsearch-php/commit/62d6132)
- (pr/445) Move resultOrFuture from endpoint to transport [[80bfeea]](http://github.com/elasticsearch/elasticsearch-php/commit/80bfeea)
- Manually convert true/false to "true"/"false" before http_build_query() [[bef93cb]](http://github.com/elasticsearch/elasticsearch-php/commit/bef93cb)
- getApiPath function returns path without trailing slash [[8bcfaf0]](http://github.com/elasticsearch/elasticsearch-php/commit/8bcfaf0)
- Use valid SPDX license identifier [[963e635]](http://github.com/elasticsearch/elasticsearch-php/commit/963e635)
- Fix bug when Create is called with an stdClass body [[adcaa2c]](http://github.com/elasticsearch/elasticsearch-php/commit/adcaa2c)
- Fix comment tag [[3b8e918]](http://github.com/elasticsearch/elasticsearch-php/commit/3b8e918)
- Add .github templates [[104a7ea]](http://github.com/elasticsearch/elasticsearch-php/commit/104a7ea)

### Testing

Lots of work re-working the REST Yaml test framework, getting travis to play nicely with Java8, and misc
tweaks over time.  The test framework is in much better shape, largely thanks to help from community member @joelwurtz!

- [TEST] Add 5.x to test matrix [[77b548d]](http://github.com/elasticsearch/elasticsearch-php/commit/77b548d)
- [TEST] Fixup server startup [[18ea943]](http://github.com/elasticsearch/elasticsearch-php/commit/18ea943)
- [TEST] Add ignore to custom param since ES now validates extraneous uri params [[61f62d8]](http://github.com/elasticsearch/elasticsearch-php/commit/61f62d8)
- [TEST] Regex to detect "stashed" values is not useful, throws false-positives [[7ff9b20]](http://github.com/elasticsearch/elasticsearch-php/commit/7ff9b20)
- [TEST] (Fix) Better context to true/false failures [[a9ee47d]](http://github.com/elasticsearch/elasticsearch-php/commit/a9ee47d)
- [TEST] Better context to true/false failures [[9df055b]](http://github.com/elasticsearch/elasticsearch-php/commit/9df055b)
- [TEST] Add 'indices.shrink/10_basic.yaml' to temp blacklist [[aa93f39]](http://github.com/elasticsearch/elasticsearch-php/commit/aa93f39)
- [TEST] Only run sync tests on Travis [[2f7b863]](http://github.com/elasticsearch/elasticsearch-php/commit/2f7b863)
- [TEST] Update travis config to use ES 5.0 branch [[cbad348]](http://github.com/elasticsearch/elasticsearch-php/commit/cbad348)
- [TEST] Add back accidentally deleted annotations [[c7f8c06]](http://github.com/elasticsearch/elasticsearch-php/commit/c7f8c06)
- [TEST] Better snapshot/repo clearing [[cc3a40d]](http://github.com/elasticsearch/elasticsearch-php/commit/cc3a40d)
- [TEST] output tweaks for better debugging, add temporary blacklist for fatal parsing files [[cb1956b]](http://github.com/elasticsearch/elasticsearch-php/commit/cb1956b)
- [TEST] Tweak verbosity of tests [[e0cc5f9]](http://github.com/elasticsearch/elasticsearch-php/commit/e0cc5f9)
- [TEST] No need to test below PHP 5.6 on master [[7aad25a]](http://github.com/elasticsearch/elasticsearch-php/commit/7aad25a)
- [TEST] Allow hhvm to fail [[fe6993d]](http://github.com/elasticsearch/elasticsearch-php/commit/fe6993d)
- [TEST] Remove ES host/port so it starts in "dev" mode [[c91242d]](http://github.com/elasticsearch/elasticsearch-php/commit/c91242d)
- [TEST] Bump travis file descriptors [[b24fc85]](http://github.com/elasticsearch/elasticsearch-php/commit/b24fc85)
- [TEST] Bump travis file descriptors [[5cd7c37]](http://github.com/elasticsearch/elasticsearch-php/commit/5cd7c37)
- [TEST] Bump travis file descriptors [[65f2eb9]](http://github.com/elasticsearch/elasticsearch-php/commit/65f2eb9)
- [TEST] (Nuclear option) more Java8 JRE tweaks [[00ce1df]](http://github.com/elasticsearch/elasticsearch-php/commit/00ce1df)
- [TEST] (Hundred and one time's a charm) more Java8 JRE tweaks [[c38e5fe]](http://github.com/elasticsearch/elasticsearch-php/commit/c38e5fe)
- [TEST] (Hundredth time's a charm) more Java8 JRE tweaks [[2cef10d]](http://github.com/elasticsearch/elasticsearch-php/commit/2cef10d)
- [TEST] (And yet) more Java8 JRE tweaks [[ecb44ab]](http://github.com/elasticsearch/elasticsearch-php/commit/ecb44ab)
- [TEST] (Yet) more Java8 JRE tweaks [[afc6b8a]](http://github.com/elasticsearch/elasticsearch-php/commit/afc6b8a)
- [TEST] More Java8 JRE tweaks [[0567579]](http://github.com/elasticsearch/elasticsearch-php/commit/0567579)
- [TEST] More Java8 JRE tweaks [[9869977]](http://github.com/elasticsearch/elasticsearch-php/commit/9869977)
- [TEST] Print java version for debug [[9dec069]](http://github.com/elasticsearch/elasticsearch-php/commit/9dec069)
- [TEST] Manually configure Java8 JRE [[1fd3612]](http://github.com/elasticsearch/elasticsearch-php/commit/1fd3612)
- Revert "[TEST] Use Java 8 for tests" [[6fc4c5c]](http://github.com/elasticsearch/elasticsearch-php/commit/6fc4c5c)
- [TEST] Use Java 8 for tests [[2d59159]](http://github.com/elasticsearch/elasticsearch-php/commit/2d59159)
- [TEST] Replace stash before finding nested variables in match [[2dae755]](http://github.com/elasticsearch/elasticsearch-php/commit/2dae755)
- [TEST] Convert `tasks.list` to `tasks.get` because `list` is a reserved word [[e0956a5]](http://github.com/elasticsearch/elasticsearch-php/commit/e0956a5)
- [TEST] Small tweak to timestamp regex [[d5e50c1]](http://github.com/elasticsearch/elasticsearch-php/commit/d5e50c1)
- [TEST] return second level of exception message if possible, for further testing [[a76cbf2]](http://github.com/elasticsearch/elasticsearch-php/commit/a76cbf2)
- [TEST] Master tests only track ES-master (5.0 alpha) now [[76e621c]](http://github.com/elasticsearch/elasticsearch-php/commit/76e621c)
- [TEST] Fix jq syntax for numeric branches (e.g. `2.2`) [[eb48dab]](http://github.com/elasticsearch/elasticsearch-php/commit/eb48dab)
- [TEST] Automate snapshot retrieval [[c08b08b]](http://github.com/elasticsearch/elasticsearch-php/commit/c08b08b)
- [TEST] Update snapshot download script for 2.2 [[350cd6e]](http://github.com/elasticsearch/elasticsearch-php/commit/350cd6e)
- [TEST] Update travis matrix [[04bcf81]](http://github.com/elasticsearch/elasticsearch-php/commit/04bcf81)
- [TEST] Invoke phpunit dependency instead of travis phpunit.phar [[f9e0d99]](http://github.com/elasticsearch/elasticsearch-php/commit/f9e0d99)
- Revert "[TEST] fix object notation" [[b966328]](http://github.com/elasticsearch/elasticsearch-php/commit/b966328)
- Make test fail on Yaml parse error [[f1b3adb]](http://github.com/elasticsearch/elasticsearch-php/commit/f1b3adb)
- Only show log when test fails [[f2acb43]](http://github.com/elasticsearch/elasticsearch-php/commit/f2acb43)
