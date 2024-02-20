FROM php:8.2-fpm

WORKDIR /var/www/my-notification-service

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install intl pdo_mysql zip

RUN curl -sS https://get.symfony.com/cli/installer | bash

EXPOSE 9000

CMD ["symfony", "server:start", "--no-tls"]
