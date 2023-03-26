<html lang="ru">
<head>
    <title>Форма</title>
    <script src="./index.js"></script>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main">
    <form method="post" action="result.php" class="cool-form">
        <h2>Событие</h2>

        <label for="event">Введите название события:</label><br>
        <input name="event" type="text" id="event" placeholder="Событие"><br>

        <label for="name">Введите имя организатора:</label><br>
        <input name="name" type="text" id="name" placeholder="Имя"><br>

<!--        Пользователь не может ввести конкретное значение в поле, он может только добавлять по секунде с помощью кнопок-->
        <label for="date">Дата события в секундах с полуночи 1 января 1970 года:</label>
        <div id="date">
            <button type="button" class="change-time-button minus">-</button>
            <input readonly class="date-in-seconds" value="0" name="date" id="date">
            <button type="button" class="change-time-button plus">+</button>
        </div>

<!--        Здесь также нельзя ввести значение в поле, увеличивать счетчик можно только через нажатия на ячейки таблицы-->
<!--        Если нажать на ячейку второй раз, то ничего не произойдет-->
        <label for="age">Возраст организатора (отметьте столько ячеек, сколько ему лет):</label><br>
        <input readonly class="age-field" value="0" name="age" id="age">
        <table class="age">
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
            <tr>
                <td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td><td>+1</td>
            </tr>
        </table>

        <button type="submit" class="send-button">Отправить</button>
    </form>
</div>
</body>
</html>
