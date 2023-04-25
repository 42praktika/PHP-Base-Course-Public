<html lang="ru">
<head>
    <title>Success</title>
    <meta charset="UTF-8">
</head>
<body>
Success!

Users:
<?php foreach ($users as $user): ?>
<div><?=$user->first_name?></div>

<?php endforeach; ?>
<a href="/">На главное</a>
</body>
</html>