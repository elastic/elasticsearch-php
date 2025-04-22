# Contributing to the PHP Elasticsearch Client

If you have a bugfix or new feature that you would like to contribute to
elasticsearch-php, please find or open an issue about it first. Talk about what
you would like to do. It may be that somebody is already working on it, or that
there are particular issues that you should know about before implementing the
change.

We enjoy working with contributors to get their code accepted. There are many
approaches to fixing a problem and it is important to find the best approach
before writing too much code.

## Running Elasticsearch locally

We've provided a script to start an Elasticsearch cluster of a certain version
found at `.buildkite/run-elasticsearch.sh`.

There are several environment variables that control integration tests:

- `TEST_SUITE`: `free` or `platinum` for running Elasticsearch in different
  versions.
- `STACK_VERSION`: Version of Elasticsearch to use. These should be
  the same as tags of `docker.elastic.co/elasticsearch/elasticsearch`
  such as `8.0.0-SNAPSHOT`, `7.x-SNAPSHOT`, etc. Defaults to the
  same `*-SNAPSHOT` version as the branch.

**NOTE: You don't need to run the live integration tests for all changes. If
you don't have Elasticsearch running locally the integration tests will be skipped.**

## API Code Generation

All API methods in `src/Endpoints` and in `src/Traits/ClientEndpointsTrait.php` are
automatically generated from the [Elasticsearch specification](https://github.com/elastic/elasticsearch-specification)
and [rest-api-spec](https://github.com/elastic/elasticsearch/tree/master/rest-api-spec/src/main/resources/rest-api-spec/api).

You can check if a PHP file has been generated searching for `@generated` tag
in the source code (e.g. [here](https://github.com/elastic/elasticsearch-php/blob/main/src/Traits/ClientEndpointsTrait.php#L27)
in the `ClientEndpointsTrait.php`).

Any changes to these files should be avoid, you can submit to the Elasticsearch 
specification project and will be imported the next time the client will be generated.
The generator itself is currently a private project.

## Contributing Code Changes

The process for contributing to any of the Elasticsearch repositories is similar.

1. Please make sure you have signed the [Contributor License
   Agreement](http://www.elastic.co/contributor-agreement/). We are not
   asking you to assign copyright to us, but to give us the right to distribute
   your code without restriction. We ask this of all contributors in order to
   assure our users of the origin and continuing existence of the code. You only
   need to sign the CLA once.

2. Run the linter and test suite to ensure your changes do not break existing code.
   Run the last optional step only if you want to test your changes with the
   integration tests. You need to specify the `STACK_VERSION` of Elasticsearch (e.g.
   `8.17.0`), you can check the Elasticsearch versions [here](https://github.com/elastic/elasticsearch/releases).

   ```
   # Run PHPStan, see https://phpstan.org/
   $ composer run-script phpstan
   
   # Run the unit tests
   $ composer run-script test
   
   # Run the integration tests (optional)
   $ STACK_VERSION="8.17.0" .buildkite/run-tests
   ```

3. Rebase your changes.
   Update your local repository with the most recent code from the main
   elasticsearch-php repository, and rebase your branch on top of the latest branch.
   If you want to propose a change in the latest version, you need to use the `main`
   branch. If you are proposing for `8.x` version you should use the latest
   minor branch (e.g. `8.17`). If want to propose a change for the oldest versions
   you need to use the `7.17` or `6.8.x` branches. Remember, we support only the latest
   minor of the previous majour. For instance, if the latest version is `8.x` we
   support the last minor of `7.x` (i.e. `7.17`).
   We prefer your changes to be squashed into a single commit for easier
   backporting.

4. Submit a pull request. Push your local changes to your forked copy of the
   repository and submit a pull request. In the pull request, describe what your
   changes do and mention the number of the issue where discussion has taken
   place, eg “Closes #123″.  Please consider adding or modifying tests related to
   your changes.

Then sit back and wait. There will probably be a discussion about the pull
request and, if any changes are needed, we would love to work with you to get
your pull request merged into elasticsearch-php.

Thanks in advance for all your future contributions!