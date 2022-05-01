FROM php:8-fpm
COPY ./php.ini $PHP_INI_DIR/conf.d/
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
