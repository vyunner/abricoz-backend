FROM php:8.1-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    cron \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip


# Копируем свой php.ini
COPY ./php.ini /usr/local/etc/php/php.ini

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Настройка рабочей директории
WORKDIR /var/www

# Копирование кода приложения
COPY . /var/www

# Установка зависимостей через composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Копирование .env.example (если нужно)
COPY .env.example /var/www/.env

# Генерация ключа приложения (можно удалить если у тебя в процессе развертывания это делается отдельно)
# RUN php artisan key:generate

# Установка прав
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 777 /var/www/storage /var/www/bootstrap/cache

# Определяем путь к php (нужно для crontab)
RUN which php > /etc/php_path

# Копируем файл с задачами cron
COPY crontab /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron
RUN crontab /etc/cron.d/laravel-cron

# Делаем лог файл доступным для записи
RUN touch /var/log/cron.log && chmod 777 /var/log/cron.log

# Открываем порт
EXPOSE 9000

# Команда запуска: php-fpm + cron + очередь
CMD ["sh", "-c", "cron && php-fpm & php artisan queue:work --queue=webkassa --tries=3"]
