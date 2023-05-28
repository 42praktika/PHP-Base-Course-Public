<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Информация </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/profile.css">

</head>
<body>
   
<div class="container">
    <h1>Добро пожаловать!</h1>
    <p class="about">Дневник расходов и доходов - это инструмент для анализа ваших денежных средств.
        С его помощью вы сможете легко отслеживать, как много у вас сбережений,
        куда ушли деньги и сколько составила выручка за месяц или любой другой период.
    </p>
    <a class="back" href="<?php echo $main_action ?>">Назад</a>
</div>

</body>
</html>






