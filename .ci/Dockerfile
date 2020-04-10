ARG PHP_VERSION=7.4-cli
FROM php:${PHP_VERSION}

# Install git
RUN apt-get update && \
    apt-get install -y --no-install-recommends git

# Install zip extension for PHP
RUN apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-install zip

# Print PHP version
RUN php -v

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer