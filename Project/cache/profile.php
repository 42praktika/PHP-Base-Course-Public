<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Профиль </title>
</head>
<body>
   
<div class="main">
    <p class="message">
        Добрый день, <?php echo $username ?>!
    </p>
    Расходы за месяц: <?php echo $expenses ?>
    <br>
    Доходы за месяц:  <?php echo $income ?>
    <br>
    Сбережения: <?php echo $savings ?>
    <br>
    <a href="<?php echo $add_money_operation_action ?>">Добавить доход / расход</a>
    <br>
    <a href="<?php echo $add_cash_savings_action ?>">Добавить сбережение</a>
    </div>

</body>
</html>




