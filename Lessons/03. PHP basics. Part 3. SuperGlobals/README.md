## Встроенный web-server

Встроенный web-server используется только в режиме разработки.

Web-server исполняется только в одном потоке.

Все URI запросы обслуживаются из той директории, в которой был запущен web-server.

По умолчанию без указания в URI скрипта запускается `index.html` или `index.php`, если в текущей директории данные скрипты
не будут обнаружены сервером, поиск будет осуществлен по родительской директории и т.д.

При запуске web-server можно указать и скрипт маршрутизации. Скрипт маршрутизации выполняется в начале каждого HTTP запроса.

Пример запуска встроенного сервера:
```
//без указания скрипта маршрутизации запустится index.php или index.html, если такие есть
php -S localhost:8080 

//указали скрипт маршрутизации
php -S localhost:8080 router.php

php -S  <addr>:<port> <routerScript>
```

## Предопределенные переменные (superglobal)

**Superglobal** - это предопределенная переменная, которая всегда доступна, независимо от области видимости.

Список переменных **superglobal**:

`$_SERVER` - информация о сервере и среде исполнения (https://www.php.net/reserved.variables.server), которая является массивом

```
php -S localhost:8080 routerWithRequired.php
```

`$argv` - Массив переданных скрипту аргументов (https://www.php.net/manual/ru/reserved.variables.argv.php)

```
cd "Lessons/03. PHP basics. Part 3. SuperGlobals/Code Examples/project"

//запуск скрипта самим php
php console.php

//запуск скрипта по названию
./run_console
```

[Дополнительно посмотрите функцию getopt(...)](https://www.php.net/manual/ru/function.getopt.php)

`$GLOBALS` - ссылки на все переменные глобальной области видимости (https://www.php.net/manual/ru/reserved.variables.globals.php)

> Начиная с PHP 8.1.0, доступ на запись ко всему массиву $GLOBALS больше не поддерживается
> Начиная с PHP 8.1.0, массив $GLOBALS теперь является доступной только для чтения копией глобальной таблицы символов. То есть глобальные переменные не могут быть изменены с помощью его копии.

`02_superglobal_globals.php`

`$_ENV` - массив, содержащий переменные окружения. Эти значения импортируются в глобальное пространство имён PHP из системных переменных окружения, в котором запущен парсер PHP. Большинство значений передаётся из командной оболочки, под которой запущен PHP, и в разных системах, вероятно, используются разные типы оболочек поэтому окончательный список невозможно представить. Пожалуйста, изучите документацию к вашей командной оболочке для получения списка переменных окружения. (https://www.php.net/manual/ru/reserved.variables.environment.php)
[Дополнительно посмотрите функции getenv(...), putenv(...) ](https://www.php.net/manual/en/function.getenv.php)

`03_superglobal_env.php`

[Откуда берутся значения в $_ENV](https://mediatemple.net/community/products/grid/204643130/using-environment-variables-in-php)

### PHP формы

Суперглобальные переменные, отвечающие за сбор данных из форм:

`$_POST` - переменные HTTP POST. Массив данных, переданных скрипту через HTTP методом POST при использовании `application/x-www-form-urlencoded` или `multipart/form-data` в заголовке Content-Type запроса HTTP (https://www.php.net/manual/ru/reserved.variables.post.php)

`$_GET` - переменные HTTP GET. Массив переменных, переданных скрипту через параметры URL (https://www.php.net/manual/ru/reserved.variables.get.php)

`$_FILES` - переменные файлов, загруженных по HTTP. Массив элементов, загруженных в текущий скрипт через метод HTTP POST. (https://www.php.net/manual/ru/features.file-upload.post-method.php)

[Дополнительная документация по функции move_uploaded_file(...) и другим из секции "Смотрите также" ](https://www.php.net/manual/ru/function.move-uploaded-file.php)

`$_REQUEST` - переменные HTTP-запроса. Массив по умолчанию содержит данные переменных `$_GET`, `$_POST` и `$_COOKIE`. (https://www.php.net/manual/ru/reserved.variables.request.php)

```
cd "Lessons/03. PHP basics. Part 3. SuperGlobals/Code Examples/projectWithForms"
//запуск встроенного php сервера, по умолчанию точка входи index.php
php -S localhost:8080
//запуск встроенного php сервера с учетом разрабора URI на путь и get параметры
php -S localhost:8081 indexWithMask.php

```

`$_COOKIE` - массив значений, переданных скрипту через HTTP Cookies. (https://www.php.net/manual/ru/reserved.variables.cookies.php)

[Для чего нужны куки](https://www.calltouch.ru/glossary/cookies/)

`$_SESSION` - массив, содержащий переменные сессии, которые доступны для текущего скрипта. (https://www.php.net/manual/ru/reserved.variables.session.php)

[Функции для работы с сессиями](https://www.php.net/manual/ru/ref.session.php)
