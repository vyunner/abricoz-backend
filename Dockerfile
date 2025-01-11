FROM php:8.1-fpm

# Установка временной зоны
RUN ln -snf /usr/share/zoneinfo/Asia/Karachi /etc/localtime && echo "Asia/Karachi" > /etc/timezone

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Настройка php.ini
COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# Установка прав
RUN chmod -R 777 .

# Установка рабочей директории
WORKDIR /var/www
