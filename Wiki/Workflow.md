### Описание работы с репозиторием

Для работы с проектом необходимо установить на ПК `composer` и `git`.

Далее:

1. Инициализируем свою ветку (
   см. **[Wiki/Git](https://github.com/42praktika/PHP-Base-Course-Public/blob/main/Wiki/Git.md)**)

2. Устанавливаем зависимости (появляется директория `vendor/`)

```
cd /{yourPathToProject}/PHP-Base-Course-Public
composer install
```

3. Выполняем задания, проверяем решения вручную

4. Запускаем тесты

### Работа с тестами

- запуск всех тестов

```
composer run-script test
```

- запуск конкретного теста

```
vendor/bin/phpunit "Lessons/{pathToTaskDir}/{YourTest.php}"

// например
vendor/bin/phpunit "Lessons/02. PHP basics. Part 2/Homework/Task2/PhoneFormatTest.php"
```
