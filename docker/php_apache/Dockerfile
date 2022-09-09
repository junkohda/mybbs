FROM php:7.4.15-apache

# vim等 install
RUN apt-get update \
        && apt-get install -y \
            lynx \
            git \
            libzip-dev \
            zip \
            unzip \
            vim \
            cron \
            libxml2 \
            libxml2-dev

RUN apt-get update \
        && apt-get -y install \
            git \
            zip \
            unzip \
            vim \
        && docker-php-ext-install pdo_mysql bcmath \
        && pecl install xdebug \
        && docker-php-ext-enable xdebug

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

RUN mkdir -p /app
ADD ./mybbs /app/

WORKDIR /app
ENV APACHE_DOCUMENT_ROOT /app
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf