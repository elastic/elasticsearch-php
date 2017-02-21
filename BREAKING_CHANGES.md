# 5.0

## Breaking changes

- Indices/Analyze Endpoint: `filters` and `char_filters` URI parameters have renamed to `filter` and `char_filter` respectively
- SearchExists endpoint has been removed ([use `size=0` and `terminate_after=1` instead](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_50_search_changes.html#_search_exists_api_removed))
- Warmers have been removed because they are [no longer useful](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_50_index_apis.html#_warmers)
- Indices/Optimize Endpoint has been removed ([use `_forcemerge` instead](https://www.elastic.co/guide/en/elasticsearch/reference/current/breaking_50_rest_api_changes.html#_literal__optimize_literal_endpoint_removed))
- MoreLikeThis (MLT) endpoint has been removed
- DeleteByQuery endpoint has been removed.
- Tasks/List and Tasks/Get are now separate endpoints (see: [[e0cc5f9]](http://github.com/elasticsearch/elasticsearch-php/commit/752d5a2))
- Client requires PHP 5.6.6 or higher

## Deprecations

- Percolator endpoints are deprecated and will be removed in Elasticsearch 6.0

## Internal BWC Breaks

- Namespace injection has changed slightly.  If you use custom namespaces, you'll need to update your code (see: Add better ability to inject namespaces [[b1a27b7]](http://github.com/elasticsearch/elasticsearch-php/commit/b1a27b7))
- Endpoints no longer use the Transport directly.  If you use custom endpoints, you'll need to do some minor
refactoring (see: Refactor to remove Transport dependence in endpoints [[ecd454c]](http://github.com/elasticsearch/elasticsearch-php/commit/ecd454c))
- To facilitate testing and other features, the `ConnectionInterface` has expanded to obtain some more methods ([[getPath()]](http://github.com/elasticsearch/elasticsearch-php/commit/8bcf1a8), [[getUserPass()]](http://github.com/elasticsearch/elasticsearch-php/commit/586fbdb), [[getHost()]](http://github.com/elasticsearch/elasticsearch-php/commit/445fdea))
