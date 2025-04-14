---
navigation_title: "Elasticsearch PHP Client"
mapped_pages:
  - https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/release-notes.html
---

# Elasticsearch PHP Client release notes [elasticsearch-php-client-release-notes]

Review the changes, fixes, and more in each version of Elasticsearch PHP Client.

To check for security updates, go to [Security announcements for the Elastic stack](https://discuss.elastic.co/c/announcements/security-announcements/31).

% Release notes include only features, enhancements, and fixes. Add breaking changes, deprecations, and known issues to the applicable release notes sections.

% ## version.next [felasticsearch-php-client-next-release-notes]

% ### Features and enhancements [elasticsearch-php-client-next-features-enhancements]
% *

% ### Fixes [elasticsearch-php-client-next-fixes]
% *

## 9.0.0 [elasticsearch-php-client-900-release-notes]

### Features and enhancements [elasticsearch-php-client-900-features-enhancements]

- **Compatibility with Elasticsearch 9.0:** All changes and additions to Elasticsearch APIs for its 9.0 release are reflected in this release.
- **Serverless client merged in:** the `elastic/elasticsearch-serverless` client is being deprecated, and its functionality has been merged back into this client. This should have zero impact on the way the client works by default. If an endpoint is available in serverless, the PHP function will contains a `@group serverless` phpdoc attribute.
If you try to use an endpoint that is not available in serverless you will get a `410` HTTP error with a message as follows:
"this endpoint exists but is not available when running in serverless mode".
- **New transport library with PSR-18 cURL client as default:** we've removed the Guzzle dependency from the client. By default, the built-in cURL-based HTTP client will be used if no other PSR-18 compatible clients are detected. See release [9.0.0](https://github.com/elastic/elastic-transport-php/releases/tag/v9.0.0) of elastic-transport-php.

### Fixes [elasticsearch-php-client-900-fixes]

- **Fixed PHPStan array shape:** we fixed the array shape definition for all the endpoints, upgrading PHPStan to verion 2.1. See PR [#1439](https://github.com/elastic/elasticsearch-php/pull/1439)