<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script defer src="/js/register.js"></script>
    <link
        rel="stylesheet"
        type="text/css"
        href="/css/register.css"
    >
</head>
<body>
<?php
readfile('header.html');
?>
<div class="background">
</div>
<div class="container">
    <div class="frame">
        <div class="nav">
            <ul class="links">
                <li class="signin-active"><a class="btn">Sign in</a></li>
                <li class="signup-inactive"><a class="btn">Sign up </a></li>
            </ul>
        </div>
        <div ng-app ng-init="checked = false">
            <form class="form-signin" action="" method="post" name="form">
                <label>Email</label>
                <input class="form-styling" type="text" name="email" placeholder="email"/>
                <label>Пароль</label>
                <input class="form-styling" type="password" name="password" placeholder="password"/>
                <div class="btn-animate">
                    <input type="submit" class="btn-signin" value="Войти"/>
                </div>
            </form>

            <form class="form-signup" action="http://localhost:8080/register" method="post" name="form">
                <label>Username</label>
                <input class="form-styling" type="text" name="username" placeholder="username"/>
                <label>Email</label>
                <input class="form-styling" type="text" name="email" placeholder="email"/>
                <label>Пароль</label>
                <input class="form-styling" type="password" name="password" placeholder="password"/>
                <label>Повторите пароль</label>
                <input class="form-styling" type="password" name="confirmpassword" placeholder="confirm password"/>
                <input type="submit" class="btn-signup" value="Зарегистрироваться"/>
            </form>
        </div>
    </div>
</div>
<?php
readfile('footer.html');
?>
</body>
</html>