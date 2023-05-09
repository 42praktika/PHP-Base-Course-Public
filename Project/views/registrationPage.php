<html lang="ru">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/assets/css/registration.css">
    <meta charset="UTF-8">
</head>
<body>
<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
    <a class="p-3 border bg-light me-4 py-2 link-body-emphasis text-decoration-none" href="/">На главную</a>
</nav>
<form action="http://127.0.0.1:8042/catalog" method="post" style="border:1px solid #ccc">
    <div class="container">
        <h1>Регистрация</h1>
        <p>Пожалуйста, заполните эту форму, чтобы создать учетную запись.</p>
        <hr>
        <label for="first_name"><b>Имя</b></label>
        <input type="text" placeholder="Введите ваше имя" name="first_name" required>

        <label for="second_name"><b>Фамилия</b></label>
        <input type="text" placeholder="Введите вашу фамилию" name="second_name" required>

        <label for="third_name"><b>Отчество</b></label>
        <input type="text" placeholder="Введите ваше отчество" name="third_name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите вашу почту" name="email" required>

        <label for="phone"><b>Телефон</b></label>
        <input type="text" placeholder="Введите ваш телефон" name="phone" required>

        <label for="series"><b>Серия паспорта</b></label>
        <input type="text" placeholder="Пример: 9216" name="series" required>

        <label for="number"><b>Номер паспорта</b></label>
        <input type="text" placeholder="Пример: 179255" name="number" required>

        <label for="number_driver"><b>Номер водительского удостоверения</b></label>
        <input type="text" placeholder="Пример: 7777123456" name="number_driver" required>

        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="psw" required>

        <label for="psw-repeat"><b>Повторить пароль</b></label>
        <input type="password" placeholder="Повторите пароль" name="psw-repeat" required>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Очистить</button>
            <button type="submit" class="signupbtn">Регистрация</button>
        </div>
    </div>
</form>
<script src="../web/assets/js/registration.js"></script>
</body>
</html>