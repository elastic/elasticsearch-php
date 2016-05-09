# 5.0

## Breaking changes

- Indices/Analyze Endpoint: `filters` and `char_filters` URI parameters have renamed to `filter` and `char_filter` respectively
- SearchExists endpoint has been removed ([use `size=0` and `terminate_after=1` instead](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking_50_search_changes.html#_search_exists_api_removed))
- Warmers have been removed because they are [no longer useful](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking_50_index_apis.html#_warmers)
- Indices/Optimize Endpoint has been removed ([use `_forcemerge` instead](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking_50_rest_api_changes.html#_literal__optimize_literal_endpoint_removed))

## Deprecations

- Percolator endpoints are deprecated and will be removed in Elasticsearch 6.0