<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Рофлан UI</title>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../public/styles/style.css">
    <link rel="stylesheet" href="../public/libs/modal/modal.css">
</head>
<body>
<div class="main-container">
    <h2 class="page-name">Заполните как-нибудь:</h2>
    <form action="/result" method="post" enctype="multipart/form-data">
        <label>
            Твоё имя: <span id="name">ТЫК СЮДА!</span>
        </label>
        <input type="hidden" name="name" id="name-input"/>
        <label>
            Номер телефона: <input type="number" name="phoneNumber" onkeypress="return false"/>
        </label>
        <label>
            Дата рождения: <input type="date" name="dateOfBirth"/>
        </label>
        <button type="submit" class="btn btn-success main-form-btn">Отправить</button>
    </form>
</div>
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script defer src="../public/libs/modal/modal.js"></script>
<script defer type="text/javascript" charset="utf-8" src="../public/js/main.js"></script>
</body>
</html>
