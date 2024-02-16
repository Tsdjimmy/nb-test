# FROM php:8.2-fpm

# RUN docker-php-ext-install sockets

# # Install Composer
# RUN apt-get update \
#     && apt-get install -y wget unzip \
#     && wget https://getcomposer.org/installer -O composer-setup.php \
#     && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
#     && rm composer-setup.php

# WORKDIR /var/www/html

# COPY . .

# RUN composer install --no-scripts

# CMD ["php-fpm"]
#

FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html
# Install dependencies
RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        zlib-dev \
        libzip-dev \
        bash \
        unzip \
        curl
# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip exif
RUN wget https://get.symfony.com/cli/installer -O - | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony
# Clean Cache
RUN rm -rf /var/cache/apk/*
CMD ["symfony", "serve", "--no-tls"]
EXPOSE 80
