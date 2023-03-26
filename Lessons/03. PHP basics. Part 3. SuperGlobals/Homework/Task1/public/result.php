<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
</head>
<body>
<h1>Мой герой</h1>
<p>
    Твоё имя:
    <?php echo $_POST['name']; ?>
    <br>
    Номер телефона:
    <?php echo $_POST['phoneNumber']; ?>
    <br>
    Дата рождения:
    <?php echo $_POST['dateOfBirth']; ?>
</p>
</body>
</html>
