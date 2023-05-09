<html lang="ru">
<head>
    <title>Auth</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../web/assets/css/auth.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
    <a class="p-3 border bg-light me-4 py-2 link-body-emphasis text-decoration-none" href="/">На главную</a>
</nav>
<form action="http://127.0.0.1:8042/adminPage" method="post">
    <div class="imgcontainer">
        <img src="../web/assets/img/auth.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Введите почту" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Введите пароль" name="psw" required>

        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>