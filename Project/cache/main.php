<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Дневник расходов и доходов </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/optionSelection.css">

</head>
<body>
   
<div class="option-selection">
    <h1 class="hello">Добро пожаловать!</h1>
    <a href="<?php echo $registration_action ?>">Регистрация</a>
    <a href="<?php echo $info_action ?>">Информация</a>
    <a href="<?php echo $login_action ?>">Вход</a>
</div>

</body>
</html>







