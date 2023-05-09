<html lang="ru">
<head>
    <title>Add car</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../web/assets/css/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<form action="http://127.0.0.1:8042/addCar" method="post" target="dummyframe">
    <div class="container">
        <h1>Добавление новой машины</h1>
        <hr>
        <label for="state_number"><b>Номер</b></label>
        <input type="text" name="state_number" required>

        <label for="mark"><b>Марка</b></label>
        <input type="text" name="mark" required>

        <label for="model"><b>Модель</b></label>
        <input type="text" name="model" required>

        <label for="typeid"><b>Тип</b></label>
        <input type="text" placeholder="от 1 до 5" name="typeid" required>

        <label for="cost"><b>Стоимость за сутки</b></label>
        <input type="text" name="cost" required>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Добавить</button>
        </div>
    </div>
    <script src="../web/assets/js/addCar.js"></script>
</form>
</body>
</html>
