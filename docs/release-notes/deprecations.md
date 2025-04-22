---
navigation_title: "Deprecations"
---

# Elasticsearch PHP Client deprecations [elasticsearch-php-client-deprecations]
Over time, certain Elastic functionality becomes outdated and is replaced or removed. To help with the transition, Elastic deprecates functionality for a period before removal, giving you time to update your applications.

Review the deprecated functionality for Elasticsearch PHP Client. While deprecations have no immediate impact, we strongly encourage you update your implementation after you upgrade. To learn how to upgrade, check out [Upgrade](docs-content://deploy-manage/upgrade.md).

% ## Next version [elasticsearch-php-client-versionnext-deprecations]

% ::::{dropdown} Deprecation title
% Description of the deprecation.
% For more information, check [PR #](PR link).
% **Impact**<br> Impact of deprecation. 
% **Action**<br> Steps for mitigating deprecation impact.
% ::::

## 9.0.0 [elasticsearch-php-client-900-deprecations]

- **Utility::urlencode():** this function has been deprecated in favor of [rawurlencode()](https://www.php.net/manual/en/function.rawurlencode.php) of PHP (see [#1278](https://github.com/elastic/elasticsearch-php/issues/1278)).

% Description of the deprecation and steps to update implementation.
% For more information, check [PR #](PR link).
% **Impact**<br>
% **Action**<br>