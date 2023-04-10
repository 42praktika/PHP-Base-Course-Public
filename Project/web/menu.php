<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grape menu</title>
    <link rel = "stylesheet" href="assets/menu.css">

</head>

<body>
<header>
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href=""><img src="assets/logo1.jpg" width="100" height="100" alt=""/></a>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li class="active"><a href="#">Меню</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div>
<h1 style="margin: 16px;
    font-size: 50px;
    color: #484848;
    text-transform: uppercase;
    font-weight: 600;"> МЕНЮ </h1>
<button class="collapsible">Барная карта</button>
<div class="content">
    <div class="features-block">
        <div class="image">
    <span>
        <img src="assets/wine1.jpg" width="100" height="100" alt="">
        <p>вино домашнее красное</p>
        <p>300мл/750мл 250р/900р</p>
    </span>
            <span>
        <img src="https://picsum.photos/50/50" alt="">
        <p>text</p>
    </span>
            <span>
        <img src="https://picsum.photos/50/50" alt="">
        <p>text text</p>
    </span>
        </div>
    </div>
</div>
    <button class="collapsible">Салаты и закуски</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="collapsible">Супы</button>
<div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button class="collapsible">Горячее</button>
<div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
    <button class="collapsible">Десерты</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="collapsible">Безалкогольные напитки</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>


</div>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
</script>

<footer>

    <div class="footer-copyright text-center"> г. Казань, ул. разведчика Сабитова телефон: +79179092384
    </div>

</footer>

</body>
</html>