<?php
use app\core\Application;
$pdo = Application::$database->pdo;
$query = $pdo->prepare("SELECT * FROM articles");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

{% extends layout.html %}

{% block title %} Главная страница {% endblock %}

{% block content %}
<body>
<div class="bodyBorders">
    <img src="pics/ps_janet-kemp_50669_paper-texture-template-080_pu.jpg" width="1200px"
         style="position: absolute; z-index: -10; opacity: 42%;">
    <div class="border"></div>
    <div class="links">
        <button class="buttonRight" id="but1">Войти</button>
        <button class="buttonRight" id="but2">Архив</button>
    </div>
    <div class="content">
        <div class="header" style="margin-top: -150px">"Паровая птица"</div>
        <div class="articleTopContainer">
            <div class="articleTop"  style="margin-right: 35px">
                <img class="articleImg" id="top1" src="<?php echo $result[count($result)-1]['header_picture']; ?>">
                <span class="title"><?php echo $result[count($result)-1]['header']; ?></span>
            </div>
            <div class="articleTop" >
                <img class="articleImg" id="top2" src="<?php echo $result[count($result)-2]['header_picture']; ?>">
                <span class="title"><?php echo $result[count($result)-2]['header']; ?></span>
            </div>
        </div>
        <?php for ($i = 0; $i < count($result)-2; $i++):?>
            <div class="article">
                <img class="articleImgMinor" src="<?php echo $result[$i]['header_picture']; ?>">
                <span class="titleMinor"><?php echo $result[$i]['header']; ?></span>
                <img class="comment" src="pics/pngfind.com-comment-icon-png-2474217%20(1).png" >
            </div>
        <?php endfor; ?>
    </div>
    <div class="border"></div>
    <div class="bottomContainer">
        <div class="titleMinor">@тут ссылки на соцсети и пр</div>
    </div>

    <div class="CommentSection" style="visibility: visible">
        <div class=""></div>
    </div>

    <div class="LoginWindow">
        <form action="main" method="post">
            <div class="close"><img src="pics/close-button.png" style="margin-top: 20px"></div>
            <div style="flex-direction: row; margin-left: 100px;">
                <div class="inputPhrase">
                    Логин
                </div>
                <input class="login" name="login" id="login" style="margin-top: 10px; margin-bottom: 10px">
                <div class="inputPhrase">
                    Пароль
                </div>
                <input class="login" name="password" id="password" type="password" style="margin-top: 10px; margin-bottom: 10px">

            </div>
            <div style="flex-direction: row">
                <button class="buttonRight" id="butLog" name="verify" value="Verify" type="submit" style="margin-left: 135px; margin-top: 20px; margin-bottom: 20px">Войти</button>
            </div>
            <a class="newbieReg" style="margin-left: 147px;">Новенькие?</a>
        </form>
    </div>
</div>

</body>
<script src="index.js">
</script>
{% endblock %}