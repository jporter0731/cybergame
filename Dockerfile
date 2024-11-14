FROM php:8.2.25-apache

# download php ext install helper script
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# install mysql ext
RUN install-php-extensions mysqli

ENV MARIADB_HOST=cybergame-mariadb

# Expose apache.
EXPOSE 80

# use production PHP file
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# create root redirect
RUN echo "<?php header('Location: /cybergame') ?>" > /var/www/html/index.php

# Copy game files into place
ADD ./ /var/www/html/cybergame
