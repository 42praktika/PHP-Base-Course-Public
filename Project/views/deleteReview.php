<html lang="ru">
<head>
    <title>Catalog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<form action="http://127.0.0.1:8042/deleteReview" method="post" target="dummyframe">
    <div class="container">
        <h1>Удаление плохого отзыва :(</h1>
        <hr>
        <label for="id"><b>Введите id плохого отзыва</b></label>
        <input type="number" name="id"  required>
        <div class="clearfix">
            <button type="submit" class="cancelbtn">Удалить</button>
        </div>
    </div>
</form>
<script src="../web/assets/js/deleteReview.js"></script>
</body>
</html>