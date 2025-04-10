# Аннотации

## Doc-блоки

Блок документирования представляет собой многострочный комментарий: первая строка должна начинаться с /**, последняя
завершается */, все промежуточные начинаются с *.

```injectablephp
  /**
  * пример блока документирования
  */
  function hello()
  {
    echo "Hello world!";
  }
```

Такие блоки могут присутствовать для разных сущностей внутри кода:

* файлы и пространства имён
* включения через require[_once] и include[_once]
* классы
* интерфейсы
* трейты
* функции и методы
* свойства классов
* константы
* переменные

Этот формат давно находится в разработке (
см. [PSR-5](https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md), хотя используется по факту во
всевозможных фреймворках и библиотеках, включая инструмент автогенерации документации PHPDocumentator и фреймворк
тестирования PHPUnit. Кроме того, блоки документации используют IDE.

Обычно блок документирования состоит из 3 разделов:

1. Заголовок - краткое описание, одной строкой поясняющее назначение документирвемого элемента
1. Описание - подробное многострочное описание с примерами, отделяется от заголовка пустой строкой
1. Теги - краткое описание метаинформации об элементах. Начинается с @.

Вот, например, PHPStorm для всплывающей справки содержит описания встроенных функций PHP в таком формате:

```injectablephp
/**
 * Get string value of a variable
 * @link https://php.net/manual/en/function.strval.php
 * @param mixed $value <p>
 * The variable that is being converted to a string.
 * </p>
 * <p>
 * $var may be any scalar type or an object that implements the __toString() method.
 * You cannot use strval() on arrays or objects that do not implement the __toString() method.
 * </p>
 * @return string The string value of var.
 */
#[Pure]
function strval ($value) {}
```

Для коротких блоков, например, блоков описания переменных, первый пункт часто опускают, а второй включают в сам тег в
качестве метаданных (в конце самого описания тега)

```injectablephp
/** @var string Внутреннее имя класса */
$internalName = "MyClass"; 

```

### Список тегов для документации

Каждый тег начинается с новой строки и символа @

* @abstract (класс, метод) - объявляет класс или метод абстрактным
* @access <модификатор> (метод, свойство) - объявляет модификатор доступа private, protected или public
* @api (метод) - объявляет элемент частью API-интерфейса, доступного внешним разработчикам
* @author - автор, можно указать email в <>
* @category (файл, класс) - имя категории, для группировки пакетов
* @copiright - информация о правообладателе
* @depricated - объявляет элемент устаревшим
* @example - позволяет задать пример использования кода, он будет опубликован с подсветкой синтаксиса и нумерацией строк
* @final - указывает, что метод или свойство не могут перегружаться в наследниках, а для класса - что от него нельзя
  наследоваться
* @filesource (файл) - только в заголовочном комментарии. Указывает, что весь исходный код нужно вывести в документацию
  с подсветкой синтаксиса
* @global (переменная) - указывает на глобальную переменную
* @ignore - указывает, что данный код не должен быть включён в документацию
* @internal - указывает, что данный элемент является внутренним и его не нужно включать в документацию
* @license (файл, класс) - добавляет ссылку на лицензию, под которой распространяется код
* @link - гиперссылка
* @method (класс) - для описания магических методов, которые вызываются через __call()
* @package (файл, класс) - имя пакета, в который входит данный код
* @param (метод, функция) - описывает параметры функции или метода
* @property (класс) - описывает свойство, которое может быть прочитанно через __get() и записано через __set()
* @property-read (класс) - описывает свойство, которое может быть прочитанно через __get()
* @property-write (класс) - описывает свойство, которое может быть записано через __set()
* @return (метод, функция) - описывает возвращаемое функцией значение
* @see - задаёт ссылку на другой блок документирования
* @since - указывает версию, начиная с которой доступен функционал
* @source - аналогично @filesource, но для всего кроме файлов
* @static - помечает статические методы и свойства класса
* @subpackage (файл, класс) - используется для объединения нескольких пакетов в один блок документации, только вместе с
  @package
* @throws - указывает тип исключения, который может быть возвращён текущим участком кода
* @todo - помечает возможные будущие изменения
* @uses - помечает, каким элементом может использоваться текущий код
* @var (свойство) - указывает тип свойства
* @version - текущая версия документируемого кода

  Стандартные наборы тегов:
* Классы и интерфейсы: @author, @copyright, @package, @subpackage, @version
* Методы: @author, @copyright, @version, @params, @return, @throws
* Свойства: @author, @copyright, @version, @var

### PHPDocumentator

Изначально этот формат аннотаций разрабатывался специально для инструмента генерации документации, наподобии того,
который используется в Java (JavaDoc) и C# (XmlDoc). Этот инструмент называется phpDocumentor и для его установки
удобно воспользоваться composer, пакет называется phpdocumentor/phpdocumentor

Для генерации документов нужно запустить phpdoc, основные параметры: -d <каталог>, -f <файл>, -t <каталог для
документов>, подробнее в [документации](https://docs.phpdoc.org/3.0/)

# [Reflection api](https://www.php.net/manual/ru/book.reflection.php)

Для того, чтобы понять, зачем нужны атрибуты и как их использовать, не обойтись без механизма отражений (__reflection__)

Отражением (reflection) называют совокупность встроенных в язык классов, объекты которых хранят информацию о структуре
программы. Можно сказать, что отражение - это метаданные программы. В PHP к классам-отражениям относятся классы,
реализующие встроенный интерфейс Reflector. Этот интерфейс пустой и используется только для классификации (проверки с
помощью instanceof).

## ReflectionFunction

Допустим, у нас есть функция:

```injectablephp
  /**
  * это - документация для функции
  **/
  function func() 
  {
    //...
  }  
```

Класс ReflectionFunction обладает следующими методами:

* getStaticVariables() - возвращает массив статических переменных функций (ключи) и их текущих значений (значения)
* invoke() - выполняет метод (так же, как call_user_func())
* returnsReference() - true, если функция возвращает ссылку (в описании использовался &)
* getParameters() - возвращает описания аргументов функции в виде объектов класса ReflectionParameter
* __construct($name) - создаётся по имени функции;
* isInternal(), isUserDefined() - проверяют, является ли функция встроенной или пользовательской
* getFileName(), getStartLine(), getEndLine() - указывает, в каком файле и в каких строках задана функция
* getDocComment() - возвращает PhpDoc функции

## ReflectionParameter

Можно использовать конструктор (недокументированный), который принимает на вход имя функции и параметра, но лучше
использовать ReflectionFunction::getParameters(). Класс содержит следующие методы:

* getName() - возвращает название аргумента, как в сигнатуре функции
* getClass() - возвращает тип аргумента, если он задан (в виде отражения)
* allowsNull() - только для встроенных функций, true если аргумент может быть опущен или получать NULL на вход
* isPassedByReference() - передаётся ли аргумент по ссылке (&)

## ReflectionClass

Самое обширное отражение. Описывает класс, заданный по имени.

* isInternal(), isUserDefined(), getFileName(), getStartLine(), getEndLine(), getDocComment() - как для функций
* getModifiers() - возвращает битовую маску, описывающую модификации класса. Чтобы получить описание, используем
  Reflection::getModifierNames()
* getConstant($name), getConstants() - возвращает константу или все константы
* getInterfaces(), getParentClass() - возвращает интерфейсы и родителя класса (или false, если нет родителя), в виде
  ReflectionClass
* isInstantiable() - можно ли создавать объект через new
* newInstance() - создаёт объект класса

## ReflectionMethod

Отражение метода класса, наследуется от ReflectionFunction

isFinal(), isAbstract, isPublic(), isPrivate(), isProtected(), isStatic(), isConstructor(), isDestructor() - проверки,
по названию в общем-то понятно. getDeclaringClass() - возвращает отражение класса владельца getModifiers() - битовая
маска модификаторов invoke() - позволяет вызвать метод, в качестве аргумента нужно передавать объект нужного класса.

## ReflectionObject

Отражение объекта. Про него нам важно знать, что в конструктор его подаётся __экземпляр__ нужного объекта.

## Другие классы отражений

Reflection - класс с 2 статическими методами: getModifierNames() - возвращает список текстовых представлений заданных
битовых модификаторов; export() - отладочная функция, выводит строковое представление заданного объекта отражения.
ReflectionException - исключение, которое выбрасывают методы создания отражений, служит только для классификации.

# Атрибуты

В PHP 8 был добавлен новый способ описания метаданных кода - атрибуты. С помощью атрибутов можно разделить абстрактную
реализацию какого-либо функционала и особенности его использования в коде. В некотором смысле это можно сравнить с
разделением интерфейса и его реализаций. Но интерфейсы и реализации - это про код, а атрибуты - про добавление
дополнительной информации и конфигурацию. Интерфейсы могут реализовываться только классами, тогда как атрибуты также
применимы для методов, функций, параметров, свойств и констант классов. Таким образом, они представляют собой гораздо
более гибкий механизм, чем интерфейсы.

Разберём пример из официальной документации. Допустим, у нас есть интерфейс, в котором описано некоторое действие. Для
выполнения этого действия каким-то реализациям требуется выполнить подготовительные методы, а остальным - нет. Если мы
включим эти необязательные методы в интерфейс, всем реализациям придётся их имплементировать, но для некоторых они будут
пустыми и смысла в этом не будет. Вот как можно решить проблему, реализовав опциональные методы через атрибуты:

```injectablephp
<?php
interface ActionHandler
{
    public function execute();
}

//Объявление атрибута - в простом случае это пустой класс и нужен он чтобы пометить нужные нам методы
//Специальный системный атрибут используется чтобы пометить класс как атрибут
#[Attribute]
class SetUp {}

class CopyFile implements ActionHandler
{
    public string $fileName;
    public string $targetDirectory;

    //Используем объявленный выше атрибут для первого опционального метода
    #[SetUp]
    public function fileExists()
    {
        if (!file_exists($this->fileName)) {
            throw new RuntimeException("File does not exist");
        }
    }

    //Один атрибут можно использовать многократно. В данном примере нам это нужно чтобы отметить, что все опциональные
    // методы должны присутствовать одновременно
    #[SetUp]
    public function targetDirectoryExists()
    {
        if (!file_exists($this->targetDirectory)) {
            mkdir($this->targetDirectory);
        } elseif (!is_dir($this->targetDirectory)) {
            throw new RuntimeException("Target directory $this->targetDirectory is not a directory");
        }
    }

    //Единственный обязательный метод из интерфейса
    public function execute()
    {
        copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
    }
}

//Простая обёрточная функция, которая выполняет обязательное действие, а перед ним, при нобходимости - опциональные
// подготовительные
function executeAction(ActionHandler $actionHandler)
{
    //При работе а стрибутами активно используется рефлексия
    $reflection = new ReflectionObject($actionHandler);


    //Нужно проверить все методы объекта, если у них есть нужный атрибут - выполнить
    foreach ($reflection->getMethods() as $method) {
        //К вышеописанным методаи рефлексии, PHP8 добавляет метод получения списка атрибутов. Ну и отражение атрибута 
        $attributes = $method->getAttributes(SetUp::class);

        //Атрибутов с одинаковым именем может быть много для одного метода, поэтому массив, хотя в данном случае это
        //нам не нужно, главное что хотя бы 1 атрибут SetUp у метода есть - значит надо его выполнить
        if (count($attributes) > 0) {
            $methodName = $method->getName();

            //Используем мягкую ссылку - для простоты, можно было и через рефлексию выполнить метод
            $actionHandler->$methodName();
        }
    }

    $actionHandler->execute();
}

$copyAction = new CopyFile();
$copyAction->fileName = "/tmp/foo.jpg";
$copyAction->targetDirectory = "/home/user";

executeAction($copyAction);
```

## Синтаксис атрибутов

Атрибут всегда начинается на #[ и заканчивается на ]. Внутри скобок 1 или более атрибутов, разделённых запятыми. Т.к.
атрибут это по сути класс, имена атрибутов могут включать пространства имён - как обычно, полные или относительные. У
атрибутов могут быть аргументы, соответствующие аргументам конструктора соответствующего класса, если аргументов нет,
то () писать необязательно.

Объявление атрибута:

```injectablephp
<?php
namespace MyExample;

use Attribute;

#[Attribute]
class MyAttribute
{
    const VALUE = 'value';

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }
}
```

Использование атрибута:

```injectablephp
<?php

namespace Another;

use MyExample\MyAttribute;

//короткое имя
#[MyAttribute]

//полное имя
#[\MyExample\MyAttribute]
//атрибут с аргументом
#[MyAttribute(1234)]
//атрибут с именованным аргументом
#[MyAttribute(value: 1234)]
//атрибут с константой из самого же класса атрибута
#[MyAttribute(MyAttribute::VALUE)]
//атрибут с массивом в качестве аргумента
#[MyAttribute(array("key" => "value"))]
//атрибут с константным выражением в качестве аргумента
#[MyAttribute(100 + 200)]
class Thing
{
}

//Несколько атрибутов в одних скобках
#[MyAttribute(1234), MyAttribute(5678)]
class AnotherThing
{
}
```

## Получение атрибутов с помощью рефлексии

У каждого из объектов рефлексии появился метод getAttributes(), возвращающий массив атрибутов в виде объектов класса
ReflectionAttribute. Это отражение позволяет получить название атрибута, аргументы и инстанцировать класс атрибута:

* getArguments — Возвращает аргументы, переданные атрибуту
* getName — Возвращает имя атрибута
* isRepeated — Проверяет, может ли атрибут указываться многократно в элементе кода
* newInstance — Создаёт экземпляр класса атрибута, представленного этим классом ReflectionAttribute и аргументами

## Создание классов атрибутов

Класс для атрибута можно и не создавать, но рекомендуется создавать хотя бы пустой класс с атрибутом #[Attribute].
Поведение атрибута можно дополнительно настроить.

Можно ограничить применимость атрибута:

```injectablephp
 #[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
 class MyAttribute
 {
 }
```

Можно указать следующие цели:

* Attribute::TARGET_CLASS
* Attribute::TARGET_FUNCTION
* Attribute::TARGET_METHOD
* Attribute::TARGET_PROPERTY
* Attribute::TARGET_CLASS_CONSTANT
* Attribute::TARGET_PARAMETER
* Attribute::TARGET_ALL

По умолчанию, атрибут можно использовать только один раз для каждой сущности. Если нужна возможность указывать несколько
одинаковых атрибутов для одной сущности - можно выставить соответствующий флаг в битовой маске для декларации

# [Attribute].

```injectablephp
#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class MyAttribute
{
}
```





