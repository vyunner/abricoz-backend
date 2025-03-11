#!/bin/sh

echo "🔥 Запуск PHP-FPM..." >> /var/www/storage/logs/queue.log
php-fpm &

sleep 5  # Даем серверу Laravel запуститься

echo "🔥 Запуск Laravel Queue..." >> /var/www/storage/logs/queue.log
php /var/www/artisan queue:work --queue=webkassa --tries=3 >> /var/www/storage/logs/queue.log 2>&1
