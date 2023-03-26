<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous">
    </script>
    <script src="js/jquery.js"></script>
</html>
<body>
    <?php require "Header.php"?>
    <div class="page">
        <div class="main__register">
            <p class="main__register-txt" style="text-align: center">
                Чтобы зарегистрироваться на сайте, предлагаем пройти вам верификацию.
                Для этого вы должны прослушать аудио-файл и ввести текст, о котором говорят дикторы.
            </p>
            <div class="main__register-controls">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Почта</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="audio">
                    <audio src="http://audiorazgovornik.ru/images/mp3/dialogi-na-anglijskom/971-english-teaching.mp3"
                           controls>
                    </audio>
                </div>
                <div class="form-floating">
                    <textarea class="form-control txtar" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Текст аудио</label>
                </div>
            </div>
            <div class="button-area">
                <button class="btnar">Отправить!</button>
            </div>
            <div class="timer-area">
                <div class="timer"></div>
                <button class="timer-btn">Я активен!</button>
            </div>
        </div>
    </div>
    <script src="js/register.js" type="text/javascript"></script>
</body>