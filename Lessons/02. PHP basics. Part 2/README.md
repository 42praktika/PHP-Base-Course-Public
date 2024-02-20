## Основы PHP

### Управляющая конструкция `declare`

`declare` используется для установки директив исполнения для блока кода.

Список распознаваемых директив:
- `strict_types` для включения строкой типизации
- `ticks` для обозначения количества низкоуровневых операций, выполненных парсером внутри блока `declare`, после которых будет вызван обработчик, заданный функцией register_tick_function.
- `encoding` для указания кодировки скрипта

Особенности:
- директивы обрабатываются при компиляции файла,
- можно использовать только символьные данные, нельзя использовать константы и переменные,

```injectablephp
<?php

//правильно
declare(ticks=1);

//возникнет ошибка
$tickValue = 2;
declare(ticks=$tickValue);

```

- `declare` влияет на весь код, следующий за ним 
- при подключении файла с `declare` в файл без директивы, в файле без директивы ошибки не возникнет
Например, `Code Examples/4_declare_child_script.php`.

[*Дополнительная информация по конструкции `declare`](https://www.php.net/manual/ru/control-structures.declare.php)

### Функции

#### Пользовательские функции

Пользователь может определить функцию до или после ее использования, а при определении в каком-либо условии до ее использования.

Функция выполняется при вызове функции. [Правила](https://www.php.net/manual/ru/userlandnaming.php) именования функций аналогично правилам именования переменных.

```injectablephp
<?php

//Функция определена после вызова
getUserName();

function getUserName()
{
    echo 'User Name';
}

```

```injectablephp
<?php

//Функция определена после вызова
getUserName();

$userExists = true;
if ($userExists) {
    function getUserName()
    {
        echo 'User Name';
    }
}

```

Функция может принимать аргументы функции. Разновидности переданных аргументов:
- значения
- [ссылки](https://www.php.net/manual/ru/functions.arguments.php#functions.arguments.by-reference)
- [значения по умолчанию](https://www.php.net/manual/ru/functions.arguments.php#functions.arguments.default)
- [списки аргументов неопределенной длины](https://www.php.net/manual/ru/functions.arguments.php#functions.variable-arg-list)
- [именованные аргументы](https://www.php.net/manual/ru/functions.arguments.php#functions.named-arguments)

[*Дополнительная информация по аргументам функций](https://stitcher.io/blog/php-8-named-arguments)

Функция может [возвращать значения](https://www.php.net/manual/ru/functions.returning-values.php).

_**Эволюция одной функции**_

```injectablephp
<?php

declare(strict_types=1);

function makeDisaster($userName = '', $userSurname = '', $userPatronymic = '')
{
    return "$userName $userSurname $userPatronymic";
}

//Perfect example
var_dump(makeDisaster('Name', 'Surname', 'Patronymic'));

```

![Few moments later](assets/few_moments_later.jpeg)

```injectablephp
<?php

declare(strict_types=1);

function makeDisaster(...$arguments): array
{
...
}

```
Смотри "Lessons/02. PHP basics. Part 2/Code Examples/7_functions_disaster_few_moments_later.php"

#### Анонимные и стрелочные функции

Анонимные функции называются замыканиями или `closures` подходят для `callable` параметров.

Чаще всего используются во встроенных `PHP` функциях.

```injectablephp
<?php

$userList = [
    [
        'name' => 'Иванов И.И.',
        'age' => 17,
    ],
    [
        'name' => 'Смирнов И.И.',
        'age' => 30,
    ],
    [
        'name' => 'Троекурова И.И.',
        'age' => 16,
    ],
    [
        'name' => 'Ахметзянова И.И.',
        'age' => 50,
    ],
];

//встроенная функция array_filter с анонимной статической функцией
var_dump(
    array_filter(
        $userList,
        static function ($user) {
            return $user['age'] > 30;
        }
    )
);

//встроенная функция array_filter со стрелочной функцией
var_dump(
    array_filter(
        $userList,
        static fn($user) => $user['age'] > 30,
    )
);

//присвоение анонимной функции переменной
$functionInVariable = static function ($userList) {
    return array_filter(
        $userList,
        static fn($user) => $user['age'] > 30,
    );
};

var_dump($functionInVariable($userList));

```

[Дополнительная информация использования статических анонимных функций](https://www.designcise.com/web/tutorial/what-are-static-anonymous-functions-in-php)

[Дополнительная информация использования стрелочных функций](https://www.php.net/manual/ru/functions.arrow.php)


#### [Встроенные функции](https://www.php.net/manual/ru/functions.internal.php)
