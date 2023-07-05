ARG PHP_VERSION=8.0-cli
FROM php:${PHP_VERSION}

WORKDIR /usr/src/app

# Install git
RUN apt-get update -qq > /dev/null && \
    apt-get install -y --no-install-recommends git -qq > /dev/null

# Install zip extension for PHP
RUN apt-get install -y \
        libzip-dev \
        zip \
        libyaml-dev \
        -qq > /dev/null \
    && docker-php-ext-install zip > /dev/null

# Install yaml extension for PHP
RUN pecl channel-update pecl.php.net > /dev/null
RUN pecl install yaml > /dev/null 
RUN docker-php-ext-enable yaml > /dev/null

# Print ext YAML version
RUN php -i | grep -E "yaml|YAML|Module Version"

# Print PHP version
RUN php -v

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Print composer version
RUN composer --version

COPY composer.json .

# Install dependencies with composer
RUN composer install --no-progress > /dev/null

COPY . .

CMD ["bash", ".buildkite/yaml-tests.sh"]
