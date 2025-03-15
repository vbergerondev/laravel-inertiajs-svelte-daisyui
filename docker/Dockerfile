FROM serversideup/php:8.4-cli-alpine

WORKDIR /var/www/html

ENV PHP_OPCACHE_ENABLE=1

# Switch to root so we can do root things
USER root

# Install the xdebug extension with root permissions
RUN install-php-extensions xdebug

COPY ./docker/xdebug.ini /usr/local/etc/php/conf.d/

RUN apk update \
    && apk upgrade \
    && apk add bash

# Drop back to our unprivileged user
USER www-data
