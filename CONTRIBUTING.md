If you have a bugfix or new feature that you would like to contribute to elasticsearch-php, please find or open an issue about it first. Talk about what you would like to do. It may be that somebody is already working on it, or that there are particular issues that you should know about before implementing the change.

We enjoy working with contributors to get their code accepted. There are many approaches to fixing a problem and it is important to find the best approach before writing too much code.

The process for contributing to any of the Elasticsearch repositories is similar.

1. Sign the contributor license agreement

    Please make sure you have signed the [Contributor License Agreement](http://www.elasticsearch.org/contributor-agreement/). We are not asking you to assign copyright to us, but to give us the right to distribute your code without restriction. We ask this of all contributors in order to assure our users of the origin and continuing existence of the code. You only need to sign the CLA once.

2. Set up your fork for development

        $> composer install
        $> git submodule update --init --recursive

3. Run the unit and yaml integration tests to ensure your changes do not break existing code.  The simplest way to do this is use the `run_travis_test.sh` script

        $> ES_VERSION=0.90.5 ES_TEST_HOST=http://localhost:9200 ./run_travis_test.sh

    This will download the specified version of elasticsearch, start it and run the tests. To use an existing cluster, the PHPUnit command is:

        ES_TEST_HOST=http://yourcluster:1234 phpunit --bootstrap tests/bootstrap.php --exclude-group ignore tests

4. Rebase your changes

    Update your local repository with the most recent code from the main elasticsearch-php repository, and rebase your branch on top of the latest master branch. We prefer your changes to be squashed into a single commit.

5. Submit a pull request

    Push your local changes to your forked copy of the repository and submit a pull request. In the pull request, describe what your changes do and mention the number of the issue where discussion has taken place, eg “Closes #123″.  Please consider adding or modifying tests related to your changes.

Then sit back and wait. There will probably be discussion about the pull request and, if any changes are needed, we would love to work with you to get your pull request merged into elasticsearch-php.

