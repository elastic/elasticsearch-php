## Release 1.3.4
- Pin mockery on specific version [[e9aa82c]](http://github.com/elasticsearch/elasticsearch-php/commit/e9aa82c)
- Update Composer.json with PSR-4 [[19d5f11]](http://github.com/elasticsearch/elasticsearch-php/commit/19d5f11)
- [TESTS] Make unit test more reliable [[80a8c4c]](http://github.com/elasticsearch/elasticsearch-php/commit/80a8c4c)
- Merge pull request #211 from ignaciovazquez/fix-docs [[c6960c0]](http://github.com/elasticsearch/elasticsearch-php/commit/c6960c0)
- Add Cat\Plugins endpoint [[15f3582]](http://github.com/elasticsearch/elasticsearch-php/commit/15f3582)
- Fix GuzzleConnection inline auth bug [[e94d27a]](http://github.com/elasticsearch/elasticsearch-php/commit/e94d27a)
- Indices/Stats endpoint should implode multi-valued metric parameters into a single string [[7de37d2]](http://github.com/elasticsearch/elasticsearch-php/commit/7de37d2)
- (pr/194) Fix typo in 'metric' argument of Stats function in IndicesNamespace.php [[4e20088]](http://github.com/elasticsearch/elasticsearch-php/commit/4e20088)
- Rework JSON Serializer to Throw Useful Exceptions [[850240a]](http://github.com/elasticsearch/elasticsearch-php/commit/850240a)

## Release 1.3.3

- Move from guzzle/http to guzzle/guzzle [[a273a95]](http://github.com/elasticsearch/elasticsearch-php/commit/a273a95)
- Add `master_timeout` parameter to Get and Exists Template Endpoints [[e7d0d39]](http://github.com/elasticsearch/elasticsearch-php/commit/e7d0d39)
- Add 'allow_no_indices' to Cluster\State Endpoint [[c5c38dc]](http://github.com/elasticsearch/elasticsearch-php/commit/c5c38dc)
- Add 'ignore_unavailable' to parameter whitelist for Cluster\State Endpoint [[7157b72]](http://github.com/elasticsearch/elasticsearch-php/commit/7157b72)
- Add 'expand_wildcards' to parameter whitelist for Cluster\State Endpoint [[1094691]](http://github.com/elasticsearch/elasticsearch-php/commit/1094691)
- [DOCS] Add note about libcurl versions [[52c90b2]](http://github.com/elasticsearch/elasticsearch-php/commit/52c90b2)
- Fix default connectionPool [[754c109]](http://github.com/elasticsearch/elasticsearch-php/commit/754c109)
- Update security.asciidoc [[bd9a0a8]](http://github.com/elasticsearch/elasticsearch-php/commit/bd9a0a8)
- [DOCS] Fix examples [[294fcb9]](http://github.com/elasticsearch/elasticsearch-php/commit/294fcb9)
- [DOCS] Tweak language [[cf7391f]](http://github.com/elasticsearch/elasticsearch-php/commit/cf7391f)
- Add Cat/Segments API [[0a887e9]](http://github.com/elasticsearch/elasticsearch-php/commit/0a887e9)
- Proactively set content-type [[b28e534]](http://github.com/elasticsearch/elasticsearch-php/commit/b28e534)
- [TEST] Update yaml runner with supported feature [[744b464]](http://github.com/elasticsearch/elasticsearch-php/commit/744b464)
- Add documentation about security (Authentication and SSL) [[87f3fd9]](http://github.com/elasticsearch/elasticsearch-php/commit/87f3fd9)
- CurlMultiConnection should verify SSL host and peer by default [[8c22a82]](http://github.com/elasticsearch/elasticsearch-php/commit/8c22a82)
- Fix bug where CurlMultiConnection does not properly respect custom curlOpts [[0a064c7]](http://github.com/elasticsearch/elasticsearch-php/commit/0a064c7)
- Add Authentication401Exception for failed HTTP Authentication [[65039e8]](http://github.com/elasticsearch/elasticsearch-php/commit/65039e8)
- Extract HTTP BasicAuth from host details if present [[0b80bcf]](http://github.com/elasticsearch/elasticsearch-php/commit/0b80bcf)
- GuzzleConnection should reuse AbstractConnection's $connectionParams [[49377f8]](http://github.com/elasticsearch/elasticsearch-php/commit/49377f8)
- [TESTS] Update older unit tests to use \Pimple\Container [[06fb3f3]](http://github.com/elasticsearch/elasticsearch-php/commit/06fb3f3)
- Bump Pimple version to 3.0 [[314112a]](http://github.com/elasticsearch/elasticsearch-php/commit/4b32231)


## Release 1.3.2

- [DOCS] add details about getLastRequestInfo() [[314112a]](http://github.com/elasticsearch/elasticsearch-php/commit/314112a)
- [DOCS] Add documentation about connection objects, changing, extending, replacing [[e1cc315]](http://github.com/elasticsearch/elasticsearch-php/commit/e1cc315)
- [DOCS] Move and expand documentation about connection pools, selectors [[759f8c4]](http://github.com/elasticsearch/elasticsearch-php/commit/759f8c4)
- Properly instantiate instance-specific params for subclasses of CurlMultiConnection and GuzzleConnection [[d707bf8]](http://github.com/elasticsearch/elasticsearch-php/commit/d707bf8)
- [DOCS] Tweak the version matrix [[6d9c790]](http://github.com/elasticsearch/elasticsearch-php/commit/6d9c790)
- [DOCS] (pr/157) Update search-operations.asciidoc [[0c9a749]](http://github.com/elasticsearch/elasticsearch-php/commit/0c9a749)
- [TEST] bad path in the skiplist [[b3eeae5]](http://github.com/elasticsearch/elasticsearch-php/commit/b3eeae5)
- [TEST] Update skiplist [[60759a4]](http://github.com/elasticsearch/elasticsearch-php/commit/60759a4)
- (pr/146) json_decode handling when content type isn't specified. Also some CS fixes. [[0dfbbb2]](http://github.com/elasticsearch/elasticsearch-php/commit/0dfbbb2)
- Throw exception instead of supressing error reporting momentarily. [[ebeabb5]](http://github.com/elasticsearch/elasticsearch-php/commit/ebeabb5)
- Supress potential E_NOTICES about integer overflows due to unusually high/low scores. [[9b22a3c]](http://github.com/elasticsearch/elasticsearch-php/commit/9b22a3c)
- [TEST] Remove ignored tests [[693ceec]](http://github.com/elasticsearch/elasticsearch-php/commit/693ceec)
- (pr/149) fix logRequestFail bad method call [[5e63662]](http://github.com/elasticsearch/elasticsearch-php/commit/5e63662)
- Store last request response data before processing any errors. [[9b9f64a]](http://github.com/elasticsearch/elasticsearch-php/commit/9b9f64a)

## Release 1.3.1
- Add LGPL v2.1 license - Elasticsearch-PHP is now dual licensed under both Apache v2.0 & LGPL v2.1 [[8071d10]](http://github.com/elasticsearch/elasticsearch-php/commit/8071d1085f4d9cde5016dcf9fd28023e25f8e77a)

## Release 1.3.0
- e8b6ffa Add parameters white list to InvalidParameter exception message
- c1e8d1f Add Snapshot/Verify endpoint
- 165ef1d Update Monolog dependency to ~1.11
- 29ebbec Trim whitespace around index and types
- 607104c Add 'realtime' param to TermVector and MTermVector Endpoints
- de889d1 Update php-version-requirement.asciidoc
- 0d74862 [DOCS] Add documentation about scan/scroll APIs
- f0e8ca9 Add missing curl info for guzzle connection on successful request.
- b0fd50a Remove old tests that conflict with newer integration tests
- 3c10afe Prevent CurlMultiConnection from over-riding curl options
- 9d4af75 Add 'version' and 'version_type' to GetScript and DeleteScript Endpoints
- 34f0333 Add 'version' and 'op_type' to Put Script Endpoint
- 24d6cb0 Indices/Get endpoint should use GET HTTP method
- 5109154 Add 'version_type' to Put Script Endpoint
- 682164c Add 'metric' param to Reroute Endpoint
- cd0de7e Add Indices/Get endpoint
- 4746b74 changed "strong" to adverb "strongly"
- a874ac7 Updkate indexing-operations.asciidoc
- f95d403 [DOCS] Add documentation for custom query params
- 2c8ecd9 [DOCS] Fix documentation formatting
- da1953c Add ability to specify custom query params
- 5d05515 Add wildcard_expansion param to getMapping endpoint
- 9b88589 Added log permission and bubble to settings

## Release 1.2.2
 - Changed the guzzle requirement to the HTTP component only [[aec04a2]](http://github.com/elasticsearch/elasticsearch-php/commit/aec04a27bf0382e7d2754effdfd641f0388eda83)
 - comma fix [[8f623e2]](http://github.com/elasticsearch/elasticsearch-php/commit/8f623e2200e9c8346a43b4a8e645601d3e7df2fd)
 - Remove usage of Pimple class with new Pimple\Container class, bump pimple version to 2.1 [[6470863]](http://github.com/elasticsearch/elasticsearch-php/commit/6470863bb1540bcce2431c95259f1b8248bf07b0)
 - Update README.md [[f82569f]](http://github.com/elasticsearch/elasticsearch-php/commit/f82569f8ee85bb3c3a853b186ec23b1f94357eed)
 - [DOCS] Add explanation of common JSON patterns in PHP [[36861fb]](http://github.com/elasticsearch/elasticsearch-php/commit/36861fb37e329cd060e741ec14a7f1643194706a)
 - [DOCS] Add advanced example of creating an index [[8817599]](http://github.com/elasticsearch/elasticsearch-php/commit/88175990da7fd8467424d8aa574d7ba8797ac187)
 - Fix casing of class [[0768b5e]](http://github.com/elasticsearch/elasticsearch-php/commit/0768b5ed85c61c5086dba8ac7b6517b94f11a085)
 - [DOCS] Elasticsearch does not need to run in daemon mode for tests [[ee4c9a3]](http://github.com/elasticsearch/elasticsearch-php/commit/ee4c9a3f82d10cf103288ebb06b4a843188f8e89)
 - [TEST] Add some logging to RestSpecRunner [[a9376d4]](http://github.com/elasticsearch/elasticsearch-php/commit/a9376d4b99a75b762614f625b209334e717e0335)
 - Add Get/Put/Delete Script endpoints [[07ddc97]](http://github.com/elasticsearch/elasticsearch-php/commit/07ddc977cf47c4a2ac6b17eb451c517aa9f59b4f)
 - ScriptLangNotSupported exception should extended BadRequest400 [[02784fd]](http://github.com/elasticsearch/elasticsearch-php/commit/02784fd4bce6d4d8281099a19e064d74c7968ee5)
 - Add Get/Put/Delete Template endpoints [[f003010]](http://github.com/elasticsearch/elasticsearch-php/commit/f0030100bac400c7490600c9e49a3bb093e8db85)
 - [TEST] Add timestamp to yaml runner [[b0d351f]](http://github.com/elasticsearch/elasticsearch-php/commit/b0d351f33b3a1b38990e64aa265e67d734843dd8)

## Release 1.2.0
 - Add Snapshot/Status endpoint [[f88d7ca]](http://github.com/elasticsearch/elasticsearch-php/commit/f88d7ca1e8e50229862175aed418c4a6dc4352cd)
 - Add Snapshot/Status implementation [[ed85658]](http://github.com/elasticsearch/elasticsearch-php/commit/ed85658c88f6e3542e6865b5f4394de40b400b07)
 - [DOCS] Fix typo [[90aeea4]](http://github.com/elasticsearch/elasticsearch-php/commit/90aeea4dfcdac2a91ffb97c27d841413c6b1753b)
 - [TEST] Reconfigure regex parsing/matching [[3d8cc12]](http://github.com/elasticsearch/elasticsearch-php/commit/3d8cc1298a8145bb4239f190dbbe43d482f9abe2)
 - [TEST] Fix incorrect feature-skip behavior [[ad10df9]](http://github.com/elasticsearch/elasticsearch-php/commit/ad10df9e3fa5870fca9ed1c6bd60fe560e3157dc)
 - Add Cat/Fielddata endpoint [[950fbaa]](http://github.com/elasticsearch/elasticsearch-php/commit/950fbaad0e6a0ae0301b91638a833b0c0c985d82)
 - Fix Cat/Fielddata endpoint URI [[4ea7149]](http://github.com/elasticsearch/elasticsearch-php/commit/4ea7149cb8a808af0ab66067c4f700397ec20f1d)
 - [TEST] Improve Regex debugging output [[f93837a]](http://github.com/elasticsearch/elasticsearch-php/commit/f93837a81122f3306738de55629f1946746415fd)
 - Update CONTRIBUTING.md [[f3a39a7]](http://github.com/elasticsearch/elasticsearch-php/commit/f3a39a7389167c7b5c378fe0647431459b5dfc8d)
 - Update Pimple to 2.0 [[e1cc94e]](http://github.com/elasticsearch/elasticsearch-php/commit/e1cc94e5e8275d59e448f66319553377edef84ad)
 - Add 'create' param to Indices/PutTemplate API [[b06ed72]](http://github.com/elasticsearch/elasticsearch-php/commit/b06ed72d432354e72ad7496678b9fa55593a6b4a)
 - Add metric param to Indices/Stats endpoint [[8dace3f]](http://github.com/elasticsearch/elasticsearch-php/commit/8dace3fc2f4041a982f7f7f3c0d33421ab5fc6c5)
 - Fix logging of response errors [[7d91545]](http://github.com/elasticsearch/elasticsearch-php/commit/7d915455d3e14ef9ba68c82681040c8d91aad6c8)

## Release 1.1.0
 - [DOCS] Add more examples of bulk indexing/updating [[6d25569]](http://github.com/elasticsearch/elasticsearch-php/commit/6d25569c74ef3cc9439a4078cc3ca478f137f41a)
 - [DOCS] Add updateAlias example [[a75b7f2]](http://github.com/elasticsearch/elasticsearch-php/commit/a75b7f20210cda7dc54b3613b7d60c849caa8996)
 - [DOCS] Add example of function_score and defining explicitly empty objects [[ed66d23]](http://github.com/elasticsearch/elasticsearch-php/commit/ed66d23c297a6ef823393e23b74fd9734f91f8a7)
 - Add ability to get last request info [[f1092c5]](http://github.com/elasticsearch/elasticsearch-php/commit/f1092c5b05c1d05662afb7901d75dc8402572525)
 - [TEST] Fix bug where skips in setup are ignored [[21c8698]](http://github.com/elasticsearch/elasticsearch-php/commit/21c86986a0753e3d6f104e8e3302feb4621a438b)
 - Match function call with function signature [[9a9e95e]](http://github.com/elasticsearch/elasticsearch-php/commit/9a9e95ef9efa8a0b42ccefcd1b71d27eca3bc2e5)
 - Add clearScroll method [[9b85c2d]](http://github.com/elasticsearch/elasticsearch-php/commit/9b85c2dfc931919d29d60fd47fa9ebd014832055)
 - [TEST] Properly handle 5xx errors when `request` is being caught [[d299c61]](http://github.com/elasticsearch/elasticsearch-php/commit/d299c6143e6e87b3606c28f57b66d4c3a70a724e)
 - Various exceptions should extend ServerErrorResponseException [[9022a9e]](http://github.com/elasticsearch/elasticsearch-php/commit/9022a9e2c97aadb31023987cf17e554033994ed4)
 - Fixed missing ' in Bulk indexing example code [[b90b7d3]](http://github.com/elasticsearch/elasticsearch-php/commit/b90b7d3729f4b92da525f4f41bdf70fd22ec159f)
 - Fix bug where scheme prefix always defaulted to HTTP [[4020db6]](http://github.com/elasticsearch/elasticsearch-php/commit/4020db6dfe1be099311c70a0cb3812859524c640)
 - [TEST] Change array syntax to be PHP 5.3 compatible [[f884c54]](http://github.com/elasticsearch/elasticsearch-php/commit/f884c54b64da532a48685fe9364b679e28a14528)
 - Added a Bool Query section [[7b0011f]](http://github.com/elasticsearch/elasticsearch-php/commit/7b0011f0e34a72e4d42977457bcddc5f7e65d9b3)
 - Add SearchShards endpoint [[7d7b667]](http://github.com/elasticsearch/elasticsearch-php/commit/7d7b66781ea526f99ba79b3d053c7feeaa9474e0)

## Release 1.0.2
 - Update IndicesNamespace.php [[8656c33]](http://github.com/elasticsearch/elasticsearch-php/commit/8656c332e818e7361cbcecda621270a1e75ab017)
 - [YAML] Update ES dependency commit point [[d0b9526]](http://github.com/elasticsearch/elasticsearch-php/commit/d0b952667a2af4bc4b957a548b359c933e9a9a82)
 - Add `explain` parameter to Cluster\Reroute Endpoint [[ec4fa60]](http://github.com/elasticsearch/elasticsearch-php/commit/ec4fa6063fe32a1cbc0e98ee2b8047eaedfa3628)
 - [TEST] Temporarily disable test - waiting on fixed yaml parser [[bb389c0]](http://github.com/elasticsearch/elasticsearch-php/commit/bb389c047a135c27d5f9ab594fab06caaa65a204)
 - Prevent exception when `connectionPoolParams` overwrite the defaults [[f164e10]](http://github.com/elasticsearch/elasticsearch-php/commit/f164e10f50c14674ff66f9337a27643d7c901e61)
 - Update SniffingConnectionPool to use 1.0 endpoints [[19f9662]](http://github.com/elasticsearch/elasticsearch-php/commit/19f9662879cf1c876fb69e9cb99a4d9c3b91c5b3)
 - [TEST]Update SniffingConnectionPool unit tests [[c6e6326]](http://github.com/elasticsearch/elasticsearch-php/commit/c6e6326e820055a589a5e47d4b28120ffdf165d7)
 - Default port. [[3885e9b]](http://github.com/elasticsearch/elasticsearch-php/commit/3885e9b4cb31d142a8eb09430a9b98e8e47485be)
 - Update port in unit tests [[e638eb0]](http://github.com/elasticsearch/elasticsearch-php/commit/e638eb0ae693f28bdce29c0dabc5d5f97faaf7c1)
 - [YAML] Set yaml test for 1.0 branch [[f1b69cd]](http://github.com/elasticsearch/elasticsearch-php/commit/f1b69cdc09315824fe543b9949aca9a948926d45)
 - [TEST] Make SniffingConnectionPool integration test compatible with jenkins [[a53f2be]](http://github.com/elasticsearch/elasticsearch-php/commit/a53f2bed33e5d4ac25c9a637e54d43670fae9776)
 - [DOCS] Added some code formatting [[3af3188]](http://github.com/elasticsearch/elasticsearch-php/commit/3af3188ad7b79f5beebc18a700a919e7e4091b7f)
 - Fix bug where retries were not being properly set [[cb2a6e8]](http://github.com/elasticsearch/elasticsearch-php/commit/cb2a6e8fa52ef9d6667893d2a3258d183d077682)
 - Fix bug where retries count is set incorrectly [[d1e0b87]](http://github.com/elasticsearch/elasticsearch-php/commit/d1e0b8755100d83e6758b8e312f6adba25aa81cb)
 - markAlive() and markDead() should also set lastPing time [[e57c952]](http://github.com/elasticsearch/elasticsearch-php/commit/e57c952285a7b868f6ae5cd6581bdb3182210bcc)
 - [TEST] update mechanism to retrieve yaml tests [[e6d6e80]](http://github.com/elasticsearch/elasticsearch-php/commit/e6d6e809b28b6b88de676c9ab4b9a734f92c8e1c)
 - [TEST] Fix integration test to use jenkins env vars [[182dacd]](http://github.com/elasticsearch/elasticsearch-php/commit/182dacd6aa2dd5329072c8450cb4bae3bd48265e)
 - Fix broken composer.json [[374bcfc]](http://github.com/elasticsearch/elasticsearch-php/commit/374bcfc3b22fa33a40b9b14c666d17e2f6bd6680)
 - [TEST] Use forked version of Symfony/Yaml [[1f6822b]](http://github.com/elasticsearch/elasticsearch-php/commit/1f6822b27f044c696bca4e4c8c1f3818a07242a6)
 - Add Indices/Recovery Endpont [[a3a66b7]](http://github.com/elasticsearch/elasticsearch-php/commit/a3a66b79cb12285f63411c86d6355130060a25d7)
 - Add SearchTemplate Endpont [[78cdf38]](http://github.com/elasticsearch/elasticsearch-php/commit/78cdf38a633dbf981a0bf906b4b560abacf56547)
 - [TEST] Fix for unescaped regex in tests [[146397c]](http://github.com/elasticsearch/elasticsearch-php/commit/146397c1899e5f6ff3e0f96702b6486576446395)
 - Add ability to configure URL Prefix [[00d28df]](http://github.com/elasticsearch/elasticsearch-php/commit/00d28dff801b13c57b1d8bfed78b06b303c1fdf5)


## Release 1.0.1
 - Add documentation about namespaces [[a34a021]](http://github.com/elasticsearch/elasticsearch-php/commit/a34a0210d85ef6dc3bd4070afded8334aaa8528e)
 - Fix tables, because asciidoc !== markdown [[c5cac5c]](http://github.com/elasticsearch/elasticsearch-php/commit/c5cac5c83fa9ede9df0da584203c98b974af51ea)
 - Update default configuration list [[d329b8d]](http://github.com/elasticsearch/elasticsearch-php/commit/d329b8d73b8846521354c6f959de0d0e2f78f846)
 - Add documentation about serializers [[d7062e4]](http://github.com/elasticsearch/elasticsearch-php/commit/d7062e4f27c182ddebf96b5e58c91ee6d8ec114e)
 - Cluster\Info endpoint should accept metric parameter [[d04d816]](http://github.com/elasticsearch/elasticsearch-php/commit/d04d81691d0dca181fe6883ad45feaa7d7796981)


## Release 1.0
 - Master tests should track Elasticsearch master [[6ae948a]](http://github.com/elasticsearch/elasticsearch-php/commit/6ae948a66f978fced22ce41da0797d9c3a44c733)
 - Update readme with note about --no-dev [[0c7ab25]](http://github.com/elasticsearch/elasticsearch-php/commit/0c7ab25402c4076c95b3c37e0a5c731b408581c7)
 - Update rest-spec dep [[bfd47f0]](http://github.com/elasticsearch/elasticsearch-php/commit/bfd47f0471f15e06f9e680ae79af55bf71ecc10f)
 - Add rest-spec parser/generator [[b814211]](http://github.com/elasticsearch/elasticsearch-php/commit/b814211479cfc6981aff38e4adff12d227537127)
 - Modify cluster-clearing behavior [[6738578]](http://github.com/elasticsearch/elasticsearch-php/commit/67385789d18310ea85dfd58839f7a04cd2520ad4)
 - Yaml tests have curious definitions for 'truthy' and 'falsey [[67b29d3]](http://github.com/elasticsearch/elasticsearch-php/commit/67b29d3aa947585cc2e0d31aef09e7dfef46a8d0)
 - Pass the testFile to executor for easier debugging [[f35d2f2]](http://github.com/elasticsearch/elasticsearch-php/commit/f35d2f28b989ba9e0b4d8cd64f38a3c5b7517e05)
 - Add NodeNamespace and SnapshotNamespace [[7a59bd4]](http://github.com/elasticsearch/elasticsearch-php/commit/7a59bd4b6b36a7336846009b1ab7bc11943e0623)
 - GetURI exception checks should throw RuntimeException [[3d81b00]](http://github.com/elasticsearch/elasticsearch-php/commit/3d81b004241afb4d166493de9f0b3c430bb43d30)
 - Generated URI construction should use elseif's [[ec6f996]](http://github.com/elasticsearch/elasticsearch-php/commit/ec6f996d8f09f874fcc57baa4b4400c6f7310a87)
 - Explicit check for bulk/msearch [[3cde301]](http://github.com/elasticsearch/elasticsearch-php/commit/3cde3010912485b08fcc36f8b2fbbc2aee4c9aaf)
 - Add NodeNamespace and SnapshotNamespace to Client [[86c0c98]](http://github.com/elasticsearch/elasticsearch-php/commit/86c0c98a79e60d3a65bc7809d0ff0a618fc807e3)
 - Update endpoints to be 1.0 compatible [[2453a7e]](http://github.com/elasticsearch/elasticsearch-php/commit/2453a7efc70f3b2a25e71e41a0a8823fdc99c75a)
 - Setups should be run for every yaml "doc" [[e36b6df]](http://github.com/elasticsearch/elasticsearch-php/commit/e36b6df3771bc6dfe6c48a53d41ecf3c92aa2997)
 - Add Cat and a few other new 1.0 endpoints [[73b72b0]](http://github.com/elasticsearch/elasticsearch-php/commit/73b72b082d9ff3dd02e8088f5d6f89c6f6fa5e2e)
 - Add version matrix to Readme [[d33d234]](http://github.com/elasticsearch/elasticsearch-php/commit/d33d2347930e8494ec547c928abd2f65fedee2c1)
 - Temporarily Remove Travis [[9770b23]](http://github.com/elasticsearch/elasticsearch-php/commit/9770b23fec7682de3beef61d17fa34a5f67e09dd)
 - Provide response body when exceptions are ignored [[c0983eb]](http://github.com/elasticsearch/elasticsearch-php/commit/c0983eba9d607f5e63047977126472c78498e342)
 - Add documentation about minimum PHP version requirement [[30a68d9]](http://github.com/elasticsearch/elasticsearch-php/commit/30a68d9b623ccccd3ccdae56a0c88234f5fed7e6)
 - Update installation docs with version matrix [[ac6ece0]](http://github.com/elasticsearch/elasticsearch-php/commit/ac6ece0b06a52b5e7da3547ed471e38f93fa02a6)
 - Fixed table layout in installation.asciidoc [[5153338]](http://github.com/elasticsearch/elasticsearch-php/commit/51533382e4e28e3a23298873944b5d6d9e5a1f6b)
 - Unset value in extract method, not calling method [[55cd213]](http://github.com/elasticsearch/elasticsearch-php/commit/55cd213a7d5dabec7790a6c92b30bd4ecb4359c5)
 - setBody should not check type [[0baf101]](http://github.com/elasticsearch/elasticsearch-php/commit/0baf10139bd71fe71b81373a03d5edd3b8172669)
 - Allow yaml test runner to work with empty objects [[b817b07]](http://github.com/elasticsearch/elasticsearch-php/commit/b817b075467c86ded88f23962ea271050109605a)
 - Fix installtion documentation formatting [[a352fc9]](http://github.com/elasticsearch/elasticsearch-php/commit/a352fc9c827431f68f5fca795c2f32c5c159b2d5)
 - Fix documentation link to php version requirements page [[ff6dcce]](http://github.com/elasticsearch/elasticsearch-php/commit/ff6dcced74b71e96106fe53e16dce6a8aa959163)
 - Add documentation about ignore parameter [[4afc6a8]](http://github.com/elasticsearch/elasticsearch-php/commit/4afc6a8a990c7135b2c616bee6ae04d60f725655)
 - [Docs] Update default configuration list [[f239f9d]](http://github.com/elasticsearch/elasticsearch-php/commit/f239f9d724825080d69ede5a2873a5ad730be331)
 - [Docs] Add version requirement page to index [[08cabbe]](http://github.com/elasticsearch/elasticsearch-php/commit/08cabbe2b65f9de876c41d264b80ac09df10f746)
 - Update unit tests to be 1.0 compatible [[c386538]](http://github.com/elasticsearch/elasticsearch-php/commit/c386538ef5fa266b08a801c9230560f1e8d06218)
 - /Cluster/Nodes endpoints should extend a base, abstract class [[e60bca2]](http://github.com/elasticsearch/elasticsearch-php/commit/e60bca214b63fb54d364c23fc546a968fda2e68c)
 - /Indices/Warmer/Get should throw exception on bad argument combination [[c053208]](http://github.com/elasticsearch/elasticsearch-php/commit/c053208387bfa85872fbd93829641a4da901a819)
 - If `type` is specified but not `index`, default to _all [[60e653c]](http://github.com/elasticsearch/elasticsearch-php/commit/60e653caa05cc8c2603351e537ca79b87bc488d3)
 - [Docs] Add minimum PHP version requirement to Readme [[96f1b8b]](http://github.com/elasticsearch/elasticsearch-php/commit/96f1b8bae068d0fb7eb2c5eb44df3c7cc34c6527)
 - Add support for skipped tests [[a9d3997]](http://github.com/elasticsearch/elasticsearch-php/commit/a9d39972f731522dc8fff9572aa7136bef91b75e)
 - Stats endpoint was missing from Cluster namespace [[383e8af]](http://github.com/elasticsearch/elasticsearch-php/commit/383e8afe88b940065fef253b208d5654f04add73)
 - Add ability to skip different feature types [[baf3701]](http://github.com/elasticsearch/elasticsearch-php/commit/baf3701c4fa4de2f4994c562bce24778e3337ecc)
 - Rename to `PendingTasks` [[1968314]](http://github.com/elasticsearch/elasticsearch-php/commit/19683143886a0ba99c852b0ad49fc0525d58f8b0)
 - Rename `setNode_Id` to `setNodeID` [[dd650ab]](http://github.com/elasticsearch/elasticsearch-php/commit/dd650ab01aef99ef9df458132e4e54c6e6fd361c)
 - Add Cat\ThreadPool endpoint [[343fa38]](http://github.com/elasticsearch/elasticsearch-php/commit/343fa38bf0191c7e19a66ec21c819ef37b2ee397)
 - Add Cat Namespace [[b069b40]](http://github.com/elasticsearch/elasticsearch-php/commit/b069b4031fddea01ae40da18c746d457f03322fe)
 - Typehint for $snapshot should be SnapshotNamespace [[0bd36a7]](http://github.com/elasticsearch/elasticsearch-php/commit/0bd36a76bb2644c2f392455b668ce10008969555)
 - Initialize cat namespace [[5ec9257]](http://github.com/elasticsearch/elasticsearch-php/commit/5ec9257907c481ef95e92461d0e9629d258b1116)
 - Add SmartSerializer and make default [[8bb8769]](http://github.com/elasticsearch/elasticsearch-php/commit/8bb87692265a9f45c8f7e3d0f33c3e529df7c77a)
 - Make SmartSerializer default [[58e11ba]](http://github.com/elasticsearch/elasticsearch-php/commit/58e11bae02fb424f66f1c2004dabcc7e21d1fcff)
 - Endpoint should extract node_id, not nodeId [[f9dabd2]](http://github.com/elasticsearch/elasticsearch-php/commit/f9dabd2dcd10f874a760bcd9895c21ced67974d4)
 - Cluster/State endpoint accepts a metric parameter [[c0a5d5d]](http://github.com/elasticsearch/elasticsearch-php/commit/c0a5d5da89d4d8b233c86425cb1b45b2cef1523e)
 - Metric parameter can accept arrays [[3f7270b]](http://github.com/elasticsearch/elasticsearch-php/commit/3f7270b612393713de0efa02860d91339c215414)
 - Fix method name to use proper camel case [[2f8b936]](http://github.com/elasticsearch/elasticsearch-php/commit/2f8b936d38d009b771bf8745bc34f82c313a30d6)
 - Add regex assertion support to yaml test runner [[6d28b88]](http://github.com/elasticsearch/elasticsearch-php/commit/6d28b88fdf229474cfc25ec01401c13f0f7f234f)
 - Cluster/State accepts `index_templates` parameter [[e674523]](http://github.com/elasticsearch/elasticsearch-php/commit/e674523acdbe0bd8218487e85804d36dc9bbb5ca)
 - Temporarily add `indices.create/10_basic` to skip list [[c2b7b43]](http://github.com/elasticsearch/elasticsearch-php/commit/c2b7b43a193c970bc1126a33b1ca1e71cb799b02)
 - Add MPercolate Endpoint [[90158a8]](http://github.com/elasticsearch/elasticsearch-php/commit/90158a838e53a01bb5a3e900a69a1ca0b3c5c636)
 - Cluster/State accepts index parameter [[c5f30c8]](http://github.com/elasticsearch/elasticsearch-php/commit/c5f30c858f2c1c8d0c84ed97e0f98d83021f668d)
 - MPercolate requires the "bulk" version DIC instantiation [[ce39316]](http://github.com/elasticsearch/elasticsearch-php/commit/ce3931645b12a0728663c117b2f4a0eb0c765138)
 - Add MTermVectors Endpoint [[ebd3ff3]](http://github.com/elasticsearch/elasticsearch-php/commit/ebd3ff3738818a45d5d3b45f255263c992ebf877)
 - Add CountPercolate Endpoint [[054e60a]](http://github.com/elasticsearch/elasticsearch-php/commit/054e60af61bdc1bc7c3d2bf9a2d1582953ce1a0e)
 - Percolate endpoint accepts doc ID [[c232f56]](http://github.com/elasticsearch/elasticsearch-php/commit/c232f56b3b985a67c7cc059b9f09b0d2a72b557f)
 - Add $id to Percolate URI construction [[35ad222]](http://github.com/elasticsearch/elasticsearch-php/commit/35ad222dbdb5d0634c852b621bd653a0a34576d2)
 - Update Percolate parameters and body [[74da187]](http://github.com/elasticsearch/elasticsearch-php/commit/74da187a0472c63704667a1a9909618ffc6cc498)
 - Add TermVector Endpoint [[c67c0dd]](http://github.com/elasticsearch/elasticsearch-php/commit/c67c0dd783dd87e511a15e99fde8bcf3eaadae7a)
 - Tweak YamlRunner debug output [[d5e5118]](http://github.com/elasticsearch/elasticsearch-php/commit/d5e5118f8e0f42cd27339d983e617c9e3b604621)
 - Update unit tests for new serializer interface [[1c206ac]](http://github.com/elasticsearch/elasticsearch-php/commit/1c206acaa03fc65fb30396fb64d7160f503d432b)
 - Update Percolate unit tests [[efc7ea8]](http://github.com/elasticsearch/elasticsearch-php/commit/efc7ea84da31adf746e37f986fa134fcb7cebf58)
 - Update documentation regarding 1.0 branch [[60fc559]](http://github.com/elasticsearch/elasticsearch-php/commit/60fc5599df4c88a52f0195ed2485e348f9aab5d8)