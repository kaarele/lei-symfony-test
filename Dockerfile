# Dockerfile

FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
  libpq-dev \
  libzip-dev \
  unzip \
  git

RUN docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Allow Composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html

COPY . .

RUN composer install

CMD ["php-fpm"]
