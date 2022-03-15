<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Authors</title>
</head>
<body>
<h1>
    <?php
    echo 'Информация об авторах курса';
    ?>
</h1>
<p>
    REQUEST:
    <?php var_dump($_REQUEST); ?>
</p>

<p>
    POST:
    <?php var_dump($_POST); ?>
</p>
<p>
    GET:
    <?php var_dump($_GET); ?>
</p>
<p>
    FILES:
    <?php
    var_dump($_FILES);

    if (
        isset($_FILES["firstFile"]["tmp_name"], $_FILES["firstFile"]["name"])
        && $_FILES['firstFile']['error'] === UPLOAD_ERR_OK
        && !move_uploaded_file(
            $_FILES["firstFile"]["tmp_name"],
            __DIR__ . '/assets/' . $_FILES["firstFile"]["name"]
        )
    ) {
        var_dump('Не удалось загрузить файл');
    }
    ?>
</p>
</body>
</html>
