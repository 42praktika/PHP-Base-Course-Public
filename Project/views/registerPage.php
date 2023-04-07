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
                <label>Username</label>
                <input class="form-styling" type="text" name="username" placeholder=""/>
                <label>Password</label>
                <input class="form-styling" type="password" name="password" placeholder=""/>
                <div class="btn-animate">
                    <a class="btn-signin">Sign in</a>
                </div>
            </form>

            <form class="form-signup" action="" method="post" name="form">
                <label>Full name</label>
                <input class="form-styling" type="text" name="fullname" placeholder=""/>
                <label>Email</label>
                <input class="form-styling" type="text" name="email" placeholder=""/>
                <label>Password</label>
                <input class="form-styling" type="password" name="password" placeholder=""/>
                <label>Confirm password</label>
                <input class="form-styling" type="password" name="confirmpassword" placeholder=""/>
                <a ng-click="checked = !checked" class="btn-signup">Sign Up</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>