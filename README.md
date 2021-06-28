# setup db
```
php artisan migrate:refresh
php artisan voyager:install --with-dummy
php artisan passport:install
```

# env
```
Client ID: 2
Client secret: afdcHzNLJTSBu7FMqaqgkel8tW8tPuaDGSHyyU5L
-->
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET=Dlec97vKQr8tBVQvUQMlpWU976VwI5Ro2aK8Xh5N
```

# workspace
```
docker-compose exec workspace bash
cd codeby/codeby/mockapi_be-laravel/

php artisan optimize:clear; php artisan lighthouse:clear-cache;
```
