FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y libzip-dev \
    && docker-php-ext-install zip
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-enable pdo_pgsql

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.mode=debug' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo 'xdebug.client_port=9000' >> /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www

COPY php.ini /usr/local/etc/php/php.ini

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

CMD php-fpm 

EXPOSE 9000
