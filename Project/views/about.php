<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FoodTube - ваш гид в мире кулинарии</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #eee;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #333;
        }

        section {
            max-width: 800px;
            margin: 0 auto 30px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        section h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        section h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        section img {
            max-width: 100%;
            margin-top: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
        }

        form input,
        form textarea {
            padding: 10px;
            margin-bottom: 20px;
        }

        form button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <h1>FoodTube</h1>
    <nav>
        <ul>
            <li><a href="#about">О нас</a></li>
            <li><a href="#services">Услуги</a></li>
            <li><a href="#contact">Контакты</a></li>
        </ul>
    </nav>
</header>
<section id="about">
    <h2>О нас</h2>
    <p>FoodTube - это сервис, который поможет вам насладиться блюдами от лучших поваров мира. Наша команда старается сделать вашу жизнь простой и вкусной, предлагая самые разнообразные рецепты и возможность приобретения рецептов от знаменитостей кулинарии. </p>
    <img src="https://images.unsplash.com/photo-1562854205-8bdd138f2a2b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cGxhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80" alt="Кулинарные рецепты">
</section>
<section id="services">
    <h2>Услуги</h2>
    <h3>Покупка рецептов от знаменитых поваров</h3>
    <p>На FoodTube вы можете купить рецепты от лучших поваров мира. Мы работаем со звездами мировой кулинарии, чтобы вы могли повторить все рецепты в домашних условиях и порадовать своих близких вкусной и изысканной едой.</p>
    <h3>Бесплатные рецепты и кулинарные статьи</h3>
    <p>FoodTube предоставляет огромное количество бесплатных рецептов и кулинарных статей, которые помогут вам сделать самые вкусные и изысканные блюда.</p>
</section>
<section id="contact">
    <h2>Контакты</h2>
    <form>
        <input type="text" placeholder="Ваше имя">
        <input type="email" placeholder="Ваш email">
        <textarea placeholder="Введите ваше сообщение"></textarea>
        <button>Отправить</button>
    </form>
</section>
<footer>
    <p>&copy;FoodTube, 2021</p>
</footer>
</body>
</html>