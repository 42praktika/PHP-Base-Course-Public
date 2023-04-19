<html lang="ru">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="../web/assets/css/registration.css">
    <meta charset="UTF-8">
</head>
<body>
<form action="registrationPage" method="post" style="border:1px solid #ccc">
    <div class="container">
        <h1>Регистрация</h1>
        <p>Пожалуйста, заполните эту форму, чтобы создать учетную запись.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите вашу почту" name="email" required>

        <label for="psw"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="psw" required>

        <label for="psw-repeat"><b>Повторить пароль</b></label>
        <input type="password" placeholder="Повторите пароль" name="psw-repeat" required>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Очистить</button>
            <button type="submit" class="signupbtn">Регистрация</button>
        </div>
    </div>
    <script src="../web/assets/js/registration.js"></script>
</form>
</body>
</html>