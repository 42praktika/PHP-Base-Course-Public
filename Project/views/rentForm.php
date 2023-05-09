<html lang="ru">
<head>
    <title>rentForm</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../web/assets/css/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<h2>Заполните форму, чтобы арендовать автомобиль</h2>
<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<form action="http://127.0.0.1:8042/rentForm" method="post" target="dummyframe">
    <div class="container">
        <hr>
        <label for="renter_email"><b>Укажите email для отправки чека</b></label>
        <input type="text" name="renter_email" required>

        <label for="number_of_days"><b>Укажите кол-во дней аренды</b></label>
        <input type="text" placeholder="от 1 до 7" name="number_of_days" required>

        <label for="car_id"><b>Номер машины</b></label>
        <input type="text" name="car_id" placeholder="По порядку" required>

        <label for="rental_date"><b>Дата аренды</b></label>
        <input type="text" name="rental_date" readonly>

        <label for="end_date_of_rental"><b>Конец аренды</b></label>
        <input type="text" name="end_date_of_rental" readonly>

        <label for="sum"><b>Стоимость</b></label>
        <input type="text" name="sum" required>

        <div class="clearfix">
            <button type="submit" class="signupbtn">Забронировать</button>
        </div>
    </div>
    <script src="../web/assets/js/rentForm.js"></script>
</form>
</body>