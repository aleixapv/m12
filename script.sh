#! /bin/sh
mv envExemple .env
php artisan key:generate
composer install
chmod 777 storage/logs/
chmod 777 storage/framework/sessions/
chmod 777 storage/framework/views/
php artisan storage:link
php artisan migrate:refresh --seed

