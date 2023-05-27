<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Профиль </title>
</head>
<body>
   

<h1>Дневник расходов и доходов</h1>

<div class="sidebar">
    <p class="greetings">Добрый день, <?php echo $username ?>!</p>

    <div class="cash-savings">
        <?php if ($savings)
            echo "<h2>Сбережения</h2>";
            echo "<br>";
                foreach ($savings as $saving) {
                    $n = $saving->getName();
                    $s = $saving->getSum();
                    echo "<div class='cash-saving'><h3>$n</h3><p>$s</p></div>";
                } ?>
    </div>
</div>

<div class="main">

    <div class="month-data">
        <a class="main-widget" href="">Мои расходы с начала месяца: <?php echo $expenses ?></a>
        <a class="main-widget" href="">Мои доходы с начала месяца: <?php echo $income ?></a>
    </div>

    <div class="control-buttons">
        <a class="control-button" href="<?php echo $add_money_operation_action ?>">Добавить расход или доход</a>
        <a class="control-button" href="<?php echo $add_cash_savings_action ?>">Добавить сбережение</a>
    </div>

</div>


</body>
</html>




