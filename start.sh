#!/bin/sh
echo "🔥 Старт скрипта start.sh!" >> /var/www/storage/logs/queue.log

# Запускаем php-fpm в фоне
php-fpm &

# Ожидание перед запуском очереди (даём php-fpm стартануть)
sleep 5

# Запускаем очередь и не даем контейнеру завершиться
while true; do
    php artisan queue:work --queue=webkassa --tries=3
    sleep 5
done
