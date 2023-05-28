<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> Личный кабинет </title>
    <link rel="icon" href="pics/Hydro_Mimic_Icon.webp">
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<html>
<body>
<div class="bodyBorders">
    <img src="pics/ps_janet-kemp_50669_paper-texture-template-080_pu.jpg" width="1200px"
         style="position: absolute; z-index: -10; opacity: 42%;">
    <div class="border"></div>
    <div class="links">
        <button class="buttonRight" id="butArchive">Архив</button>
        <button class="buttonRight" id="butJokes">Анекдоты</button>
    </div>
    <div class="content">
        <div class="header" style="margin-top: -390px;">"Добро пожаловать, <?php echo $login ?>"</div>
        <div style="flex-direction: row; display: flex; margin: auto; justify-content: center">
            <img class="round" src="pics/pngfind.com-comment-icon-png-2474217%20(1).png">
            <form class="information" action="login" method="post">
                <div class="inputPhrase">
                    Логин
                </div>
                <input class="login" name="login" id="login" value="<?php echo $login ?>" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Почта
                </div>
                <input class="login" name="email" id="email" value="<?php echo $email ?>" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Пароль
                </div>
                <input class="login" name="password" id="password1" value="<?php echo $password ?>" style="margin-top: 10px; margin-bottom: 10px">
                <button class="buttonRight" id="butLog" name="verify" value="Verify" type="submit"
                        style="margin-left: 30px; margin-top: 20px">Изменить</button>
            </form>
        </div>
    </div>
    <div class="border"></div>
    <div class="bottomContainer">
        <div class="titleMinor">@тут ссылки на соцсети и пр</div>
    </div>

    <div class="CommentSection" style="visibility: visible">
        <div class=""></div>
    </div>

</div>
</body>
<script src="indexProfile.js">
</script>
</html>

</body>
</html>



