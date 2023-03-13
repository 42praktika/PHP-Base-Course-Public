<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>User details</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        body {
            font-size: 30px;
            background: bisque;
            display: flex;
            align-items: center;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            color: white;
        }
    </style>
</head>
<body>
<h1>
    <?php
    echo 'Information about your account'
    ?>
</h1>
<p>
    <?php echo "Исем: ", $_REQUEST["Name"], "<br>";
    echo "Surname: ", $_REQUEST["Surname"], "<br>";
    echo "姓: ", $_REQUEST["Patronymic"], "<br>";
    ?>
</p>

</body>
</html>