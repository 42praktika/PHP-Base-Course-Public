<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
</head>
<body>
<h1>
    <p>
        Имя пользователя:
        <?php printf($_POST["username"]); ?>
    </p>

    <p>
        Пароль:
        <?php  printf($_POST["password"]); ?>
    </p>
</h1>
</body>
</html>
