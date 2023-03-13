<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: mediumslateblue;
        }

        body{
            height: 100vh;
            display: flex;
            algin-items: center;
            justify-content: center;
            font-family: "Brush Script MT", "Brush Script std", cursive;
        }
        #content{
            height: 90vh;
            display: flex;
            algin-items: center;
            justify-content: center;
            font-family: "Brush Script MT", "Brush Script std", cursive;

        }
        #sidebar {
            display:inline-block;
            position: fixed;
            left: 0;
            width: 210px;
            margin: 50px;
            padding:0;
            justify-content:space-around;
            align-items:center;
            flex-wrap:wrap;
            height: 500px;
        }
        #sidebar a{
            display:inline-block;
            padding:10px;

        }
        p{
            color: crimson;
        }
        p:hover{
            color: fuchsia;
        }
        .pop-outin {
            animation: 2s anim ease infinite;
        }

        @keyframes anim {
            0% {
                color: black;
                transform: scale(0);
                opacity: 0;
                text-shadow: 0 0 0 rgba(0, 0, 0, 0);
            }
            25% {
                color: red;
                transform: scale(2);
                opacity: 1;
                text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
            }
            50% {
                color: black;
                transform: scale(1);
                opacity: 1;
                text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
            }
            100% {
                /* animate nothing to add pause at the end of animation */
                transform: scale(1);
                opacity: 1;
                text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
            }
        }

        p{
            margin: 10px 0;
        }


        form{
            display: flex;
            flex-direction: column;
            width: 400px;
        }
        input{
            margin: 10px 0;
            padding: 10px;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }

        button{
            padding: 10px;
            background: #e3e3e3;
            border: unset;
            cursor: pointer;



        }

        /* Стили всплывающего окна по-умолчанию */
        .modal {
            position: fixed; /* фиксированное положение */
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.5); /* фон */
            z-index: 1050;
            opacity: 0; /* по умолчанию модальное окно прозрачно */
            -webkit-transition: opacity 200ms ease-in;
            -moz-transition: opacity 200ms ease-in;
            transition: opacity 5s ease-in; /* анимация перехода */
            pointer-events: none; /* элемент невидим для событий мыши */
            margin: 0;
            padding: 0;
        }
        /* При отображении модального окно */
        .modal:target {
            opacity: 1; /* делаем окно видимым */
            pointer-events: auto; /* элемент видим для событий мыши */
            overflow-y: auto; /* добавляем прокрутку по y, когда элемент не помещается на страницу */
        }
        /* ширина модального окна и его отступы от экрана */
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
        }
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px;
                margin: 30px auto; /* отображение окна по центру */
            }
        }
        /* Стили для блока с контентом окна */
        .modal-content {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            background-color: darkmagenta;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: .3rem;
            outline: 0;
        }
        @media (min-width: 768px) {
            .modal-content {
                -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
                box-shadow: 0 5px 15px rgba(0,0,0,.5);
            }
        }
        /* Стили заголовка окна */
        .modal-header {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #eceeef;
        }
        .modal-title {
            margin-top: 0;
            margin-bottom: 0;
            line-height: 1.5;
            font-size: 1.25rem;
            font-weight: 500;
        }
        /* Стили кнопки "х" ("Закрыть")  */
        .close {
            float: right;
            font-family: sans-serif;
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            color: mediumslateblue;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
            text-decoration: none;
        }
        /* Стили для закрывающей кнопки в фокусе или наведении */
        .close:focus, .close:hover {
            color: mediumslateblue;
            text-decoration: none;
            cursor: pointer;
            opacity: .75;
        }
        /* Стили блока основного содержимого окна */
        .modal-body {
            position: relative;
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 30px;
            overflow: auto;
        }
        /* ----- Animated button ----- */

        .Animated_button {

            -moz-animation: cycle 5ms linear infinite;
            -webkit-animation: cycle 5ms linear infinite;

        }

        @-moz-keyframes cycle {
            35% {transform: rotate(0) translate(0, 0);}
            40% {transform: rotate(10deg) translate(0, -2px);}
            45% {transform: rotate(-7deg) translate(0, -2px);}
            50% {transform: rotate(10deg) translate(0, -2px);}
            55% {transform: rotate(-7deg) translate(0, -2px);}
            60% {transform: rotate(10deg) translate(0, -2px);}
            65% {transform: rotate(-7deg) translate(0, -2px);}
            70% {transform: rotate(0) translate(0, 0);}
        }

        @-webkit-keyframes cycle {
            35% {transform: rotate(0) translate(0, 0);}
            40% {transform: rotate(10deg) translate(0, -2px);}
            45% {transform: rotate(-7deg) translate(0, -2px);}
            50% {transform: rotate(10deg) translate(0, -2px);}
            55% {transform: rotate(-7deg) translate(0, -2px);}
            60% {transform: rotate(10deg) translate(0, -2px);}
            65% {transform: rotate(-7deg) translate(0, -2px);}
            70% {transform: rotate(0) translate(0, 0);}
        }

        /* ----- Animated button END ----- */

    </style>
</head>
<body>

<div id="sidebar">
    <div>
    <a href="https://market.yandex.ru/product--pled-ikea-ingrun-60492735/1777155483?clid=1601&utm_source=yandex&utm_medium=search&utm_campaign=ymp_offer_dp_dom_model_3_dyb_search_rus&utm_content=cid%3A80492187%7Cgid%3A5073211318%7Caid%3A13051877710%7Cph%3A3093371%7Cpt%3Apremium%7Cpn%3A2%7Csrc%3Anone%7Cst%3Asearch%7Crid%3A3093371%7Ccgcid%3A0&cpa=1" style="color: crimson; font-size: large">
        <b> Купить плед недорого </b>
    </a>
        </div>
    <div>
        <a href="https://www.avito.ru/cherepovets/garazhi_i_mashinomesta/prodam/garazh-ASgBAgICAkSYA~QQqAjsVQ" style="color: orange; font-size: large">
            <b> Гаражи Череповец </b>
        </a>
    </div>
    <div>
        <a href="" style="color: darkkhaki; font-size: large">
            <b> Ольга 400 метров от вас </b>
        </a>
    </div>
    <div>
        <a href="" style="color: chartreuse; font-size: large">
            <b> Скидки до 20% </b>
        </a>
    </div>
    <div>  <a href="" style="color: mediumblue; font-size: 15px">
            <b> Крест "Торетто" Оригинал! </b>
        </a>
    </div>
    <div>  <a href="" style="color: magenta; font-size: 17px">
            <b> Причина смерти Олега Яковлева, которую не хотели разглашать... </b>
        </a>
    </div>




</div>

<!-- Форма -->
<form id="content" action="/profile" method="post" enctype="multipart/form-data">
    <label>Имя пользователя</label>
    <input type="text" placeholder="Введите имя пользователя" name="name">
    <label>Почта</label>
    <input type="email" placeholder="Введите email" name="email">
    <label>Пароль</label>
    <input type="password" placeholder="Введите пароль">
    <label>
        Возраст: <input type="text" name="age"/>
    </label>

    <!-- HTML модального окна -->
    <div id="openModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Вам помочь?</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body">
                    <ul>
                        <p style="font-size: large"> Для входа введите свои данные в поля </p>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- HTML кнопки -->

    <a href="#openModal" style="color: black; text-decoration: none; font-size: 40px"> Помощь </a>
    <div style="position: relative; top: 20px" class='line'> <h2 class='pop-outin'>Добро пожаловать!</h2> </div>
    <div style="position: relative; top: 50px">
        <button type="submit" onclick="location.href='/profile.php';" name="submit"
                style="background: orangered; height:50px; width:300px""
        class="Animated_button" > Войти </button>
    </div>
</form>



</body>
</html>