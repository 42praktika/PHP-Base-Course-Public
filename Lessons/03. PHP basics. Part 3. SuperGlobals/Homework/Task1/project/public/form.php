<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заполнить форму</title>
    <link rel="icon" href="../assets/favicons/def.png">
    <link rel="stylesheet" href="../css/form.css"/>
</head>
<body>
<div class="form-login">
    <form action="/result" method="post" enctype="multipart/form-data">
        <div class="form-username">
            <label>Имя пользователя:</label>
            <input type="text" class="input-username" name="username" readonly>
        </div>
        <div class="form-password">
            <label>Пароль: </label>
            <input type="password" name="password" class="input-password" readonly>
        </div>
        <div style="margin-top: 15px">
            <label style="margin-right: 0">Показать пароль</label>
            <input type="checkbox" id="checker">
        </div>
        <button type="submit" class="btn-submit">Отправить</button>
    </form>
</div>
<script type="text/javascript" src="../js/index.js"></script>
</body>
</html>
