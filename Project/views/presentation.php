<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
    <meta charset="UTF-8">
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
            margin: 0 auto;
        }

        form input,
        form textarea {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        form input[type="submit"] {
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
            <li><a href="/about">О нас</a></li>
            <li><a href="#services">Услуги</a></li>
            <li><a href="#contact">Контакты</a></li>
        </ul>
    </nav>
</header>
<section>
    <h2>Регистрация на сайте</h2>
    <form>
        <input type="text" placeholder="Имя">
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Пароль">
        <input type="password" placeholder="Повторите пароль">
        <input type="submit" value="Зарегистрироваться">
    </form>
</section>
<footer>
    <p>&copy;FoodTube, 2021</p>
</footer>
</body>
</html>