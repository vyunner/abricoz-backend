FROM php:8.1-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    cron \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Настройка рабочей директории
WORKDIR /var/www

# Копирование кода приложения
COPY . /var/www

# Создание .env из примера и генерация ключа
COPY .env.example /var/www/.env

# Установка зависимостей через composer
RUN composer update
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Установка прав
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 777 /var/www/storage /var/www/bootstrap/cache

# Определяем путь к php (нужно для crontab)
RUN which php > /etc/php_path

# Копируем crontab файл
COPY crontab /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron

# Делаем /var/log/cron.log доступным для записи
RUN touch /var/log/cron.log && chmod 777 /var/log/cron.log

EXPOSE 9000

# Запускаем php-fpm, Laravel Queue и cron в фоне
CMD ["sh", "-c", "cron && php-fpm & php artisan queue:work --queue=webkassa --tries=3"]
