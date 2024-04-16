FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git && \
    docker-php-ext-install pdo_mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

RUN chmod -R 777 .

WORKDIR /var/www
RUN composer update
RUN php artisan migrate
RUN php artisan key:generate
RUN php artisan db:seed
RUN php artisan scribe:generate
RUN chmod -R 777 .
