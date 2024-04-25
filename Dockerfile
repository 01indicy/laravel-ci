FROM composer:lts as deps

WORKDIR /app

RUN --mount=type=bind,source=composer.json,target=composer.json \
    --mount=type=bind,source=composer.lock,target=composer.lock \
    --mount=type=cache,target=/tmp/cache \
    composer install --no-dev --no-interaction

FROM php:8.2-apache as final

RUN a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=deps app/vendor/ /var/www/html/vendor

COPY . /var/www/html

USER www-data
