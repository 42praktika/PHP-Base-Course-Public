<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>User details</title>
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            font-family: "Lato", sans-serif;
            font-size: 30px;
            background: #ff8473;
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
    <?php echo "Name: ", $_REQUEST["userName"], "<br>";
    echo "Surname: ", $_REQUEST["userSurname"], "<br>";
    echo "Email: ", $_REQUEST["userEmail"], "<br>";
    echo "Age: ", $_REQUEST["userAge"], "<br>";
    ?>
</p>

</body>
</html>
