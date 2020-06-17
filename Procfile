docker-compose up --build
release: php artisan migrate --force
web: vendor/bin/heroku-php-apache2 http://172.28.1.1/
worker: php artisan queue:listen --tries=3 --timeout=3600
