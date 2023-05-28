<html lang="ru">
<head>
    <title>Регистрация</title>
    <link rel="icon" href="pics/Hydro_Mimic_Icon.webp">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background: url(pics/ps_janet-kemp_50669_paper-texture-template-080_pu.jpg);
            background-size: 100%
        }
    </style>
</head>
<body>
<div class="bodyBorders">
    <img src="pics/ps_janet-kemp_50669_paper-texture-template-080_pu.jpg" width="1200px"
         style="position: static; z-index: -10; opacity: 42%; background-size: 100%">
    <div class="header" style="margin-top: -930px; position: fixed">"Паровая птица"</div>
    <div class="LoginWindow" style="position: fixed; height: 448px; visibility: visible">
        <form action="register" method="post" style="flex-direction: column; margin-top: 20px">
            <div class="close"><img src="pics/close-button.png" style="margin-top: 20px"></div>
            <div style="flex-direction: row; margin-left: 100px;">
                <div class="inputPhrase">
                    Логин
                </div>
                <input class="login" name="login" id="login" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Почта
                </div>
                <input class="login" name="email" id="email" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Пароль
                </div>
                <input class="login" name="password" id="password1" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Повторите пароль
                </div>
                <input class="login" name="password_confirm" id="password2" style="margin-top: 10px; margin-bottom: 10px">
            </div>
            <button class="buttonRight" id="butLog" name="verify" value="Verify" type="submit"
                    style="margin-left: 70px; margin-top: 20px">Зарегистрироваться</button>
        </form>
    </div>
</div>
</body>
<script src="indexReg.js">
</script>
</html>
