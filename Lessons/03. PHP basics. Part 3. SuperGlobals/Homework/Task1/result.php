<html lang="ru">
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<div class="main">
    <p class="message">
        Событие <?php echo htmlspecialchars($_POST['event']); ?>
        состоится <?php echo date('d.m.y H:i', (int)$_POST['date']); ?>.
        Организатор <?php echo htmlspecialchars($_POST['name']); ?>
        (полных лет: <?php echo (int)$_POST['age']; ?>).
    </p>
</div>
</body>
</html>


