FROM php:7.3-fpm

RUN mkdir -p /usr/share/man/man1
RUN apt-get update && apt-get install -y \
        curl \
        vim \
        git \
        software-properties-common \
        bsd-mailx \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        unzip

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd bcmath soap intl pdo pdo_mysql zip

#install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# settings
RUN rm -rf /var/www/html
RUN chsh -s /bin/bash www-data
RUN chown www-data:www-data /var/www

WORKDIR /var/www/kvak
