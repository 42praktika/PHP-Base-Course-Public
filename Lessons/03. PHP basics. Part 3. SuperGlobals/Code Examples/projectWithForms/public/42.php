<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>42 lab</title>
</head>
<body>
<h1>
    <?php
    echo  '42 лаборатория';
    ?>
</h1>
<h2>Автор курса:</h2>
<form action="/author?company=42Lab" method="post" enctype="multipart/form-data">
    <label>
        Имя автора курса: <input type="text" name="authorName"/>
    </label>
    <br>
    <label>
        Название организации: <input type="text" name="authorOrganization"/>
    </label>
    <br>
    <label>
        Дата рождения: <input type="date" name="dateOfBirth"/>
    </label>
    <br>
    <label>
        Дополнительные файлы:
        <input type="file" name="firstFile">
        <input type="file" name="secondFileList[]">
        <input type="file" name="secondFileList[]">
    </label>
    <br>
    <button>Отправить</button>
</form>
</body>
</html>
