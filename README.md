# Тестовое задание

## Разворачивание в Docker
Переходим в папку с проектом. Запускаем команду в консоли:
```
docker compose up -d
```

Подключаемся к контейнеру.
```
docker exec -ti test-api-app bash
```

Выполняем миграции
```
php artisan migrate
```

Загружаем товары и категории
```
php artisan db:seed
```

Готово, API будет доступно по ссылке `http://localhost/api`
