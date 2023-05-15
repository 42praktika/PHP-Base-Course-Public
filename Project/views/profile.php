<html lang="ru">
<head>
    <title>Профиль</title>
</head>
<body>
<div class="main">
    <p class="message">
        Почта: <?php echo $_SESSION['user']->getEmail(); ?> <br>
        Имя: <?php echo $_SESSION['user']->getName(); ?>
    </p>
Расходы за месяц:  <!--<a href="money">Посмотреть</a> TODO НОРМ???-->
    <form action="expenses" method="post">
        <input type="submit" value="Посмотреть">
    </form>

    <br>
    Доходы за месяц:
<!--    <a href="money?income=true">Посмотреть</a>-->
    <br>
    Сбережения:
<!--    <a href="savings">Посмотреть</a>-->
    <br>
    Добавить расход:
    <br>
    Добавить доход:
    <br>
    Добавить сбережение:
</div>
</body>
</html>
