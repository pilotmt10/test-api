# Тестовое задание

## Разворачивание в Docker
Перейти в папку с проектом. Запустить команду в консоли:
```
docker compose up -d
```

Далее подключиться к контейнеру.
```
docker exec -ti test-api-app bash
```

Выполнить миграции
```
php artisan migrate
```

Готово, API будет доступно по ссылке `http://localhost/api`
